<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Bilou
 * Date: 27/02/13
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

$app = require __DIR__.'/bootstrap.php';

/*$app->get('/', function(Request $request) use ($app){
    echo '<pre>';
    print_r($request->get('_route'));
    echo '</pre>';
    //return $app->redirect($app.request.basepath.'web/fr/');
});*/

$app->get('/{lang}/', function($lang) use ($app){
    $menus = MenuQuery::create()
        ->find();
    //print_r($menus);
    return $app['twig']->render('template/home.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
    ));
});

$app->get('/admin', function() use ($app){
    return $app['twig']->render('template/admin.home.twig', array(
    ));
});

$app->match('/admin/accueil', function(Request $request) use ($app){

    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //echo $conf->get(0)->setValue('ZI de chasnais')->save();

    $form = $app['form.factory']->createBuilder('form')
        ->add('carousel','text',array(
            'label'=>'Carousel (Mettre un champ multiple selection)',
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(9)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('description_fr','textarea',array(
            'label'=>'Description Français',
            'required'=>true,
            'data'=>$conf->get(10)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('description_en','textarea',array(
            'label'=>'Description Anglais',
            'required'=>true,
            'data'=>$conf->get(11)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('description_de','textarea',array(
            'label'=>'Description Allemand',
            'required'=>true,
            'data'=>$conf->get(12)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->getForm();

    if('POST'==$request->getMethod()){
        $form->bind($request);

        if($form->isValid()){
            //Récuperation des données du formulaire
            $data = $form->getData();

            //Mise a jour des information dans la table
            $conf->get(9)->setValue($data['carousel']);
            $conf->get(10)->setValue($data['description_fr']);
            $conf->get(11)->setValue($data['description_en']);
            $conf->get(12)->setValue($data['description_de']);
            $conf->save();

            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }
    }

    return $app['twig']->render('template/admin.accueil.twig', array(
        'form'=>$form->createView(),
    ));
})->bind('form_accueil');

$app->get('/admin/article', function() use ($app){
    //Récuperation de tous les artciles présent dans la base de données
    $article = ArticlesQuery::create()
        ->orderById()
        ->find();
    //Affichage de tous les articles
    return $app['twig']->render('template/admin.article.twig', array(
        'articles'=>$article,
    ));
});

$app->match('/admin/article/create', function() use ($app){
    return $app['twig']->render('template/admin.article_create.twig', array(
    ));
});

$app->match('/admin/article/edit/{id}', function($id) use ($app){
    return $app['twig']->render('template/admin.article_edit.twig', array(
    ));
});

$app->get('/admin/menu', function() use ($app){
    return $app['twig']->render('template/admin.menu.twig', array(
    ));
});

$app->get('/{lang}/article', function() use ($app){
    return $app['twig']->render('template/article.twig', array(
        'lang'=>$lang,
    ));
});

$app->get('/{lang}/article/{id}', function($id) use ($app){

    return $app['twig']->render('template/article_detail.twig', array(
        'id_article'=>$id,
        'lang'=>$lang,
    ));
});

$app->get('/{lang}/contact', function() use ($app){
    return $app['twig']->render('template/contact.twig', array(
        'lang'=>$lang,
    ));
});

$app->get('/admin/login', function() use ($app){
    return $app['twig']->render('template/admin.login.twig', array(
    ));
});

$app->get('/admin/logout', function() use ($app){
    return $app['twig']->render('template/admin.logout.twig', array(
    ));
});

$app->match('/admin/info', function(Request $request) use ($app){
    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //echo $conf->get(0)->setValue('ZI de chasnais')->save();
    //echo $conf->get(0)->getValue();

    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('adresse','text',array(
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(0)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('zip_code','text',array(
            'label'=>'Code postal',
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(1)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('city','text',array(
            'label'=>'Ville',
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(2)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('phone','text',array(
            'label'=>'Téléphone',
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(3)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('fax','text',array(
            'label'=>'Fax',
            'required'=>true,
            'attr'=>array(
                    'value'=>$conf->get(4)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('facebook','text',array(
            'label'=>'Page facebook',
            'required'=>false,
            'attr'=>array(
                    'value'=>$conf->get(5)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('twitter','text',array(
            'label'=>'Page twitter',
            'required'=>false,
            'attr'=>array(
                'value'=>$conf->get(6)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('gplus','text',array(
            'label'=>'Page Google plus',
            'required'=>false,
            'attr'=>array(
                    'value'=>$conf->get(7)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->add('rss','text',array(
            'label'=>'Flux RSS',
            'required'=>false,
            'attr'=>array(
                    'value'=>$conf->get(8)->getValue()
                ),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->getForm();

    if('POST'==$request->getMethod()){
        $form->bind($request);

        if($form->isValid()){
            //Récuperation des données du formulaire
            $data = $form->getData();

            //Mise a jour des information dans la table
            $conf->get(0)->setValue($data['adresse']);
            $conf->get(1)->setValue($data['zip_code']);
            $conf->get(2)->setValue($data['city']);
            $conf->get(3)->setValue($data['phone']);
            $conf->get(4)->setValue($data['fax']);
            $conf->get(5)->setValue($data['facebook']);
            $conf->get(6)->setValue($data['twitter']);
            $conf->get(7)->setValue($data['gplus']);
            $conf->get(8)->setValue($data['rss']);
            $conf->save();

            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }
    }

    return $app['twig']->render('template/admin.info.twig', array(
        'form'=>$form->createView(),
    ));
})->bind('form_conf');

$app->get('/404', function() use ($app){
    return $app['twig']->render('template/404.twig', array(
    ));
});

$app->get('/admin/ok', function() use ($app){
    return $app['twig']->render('template/admin.ok.twig', array(
    ));
})->bind('admin_ok');

return $app;

?>