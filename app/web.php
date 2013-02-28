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
    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //Récupere le nombre d'article sur le site
    $nbArticle = ArticlesQuery::create()
        ->count();

    return $app['twig']->render('template/admin.home.twig', array(
        'conf'=>$conf,
        'nbArticle'=>$nbArticle,
    ));
});

$app->match('/admin/accueil', function(Request $request) use ($app){
    //Recupere le contenu du dossier contenant les images du carousel
    $MyDirectory = opendir('img/carousel/') or die('Erreur');
    $arrayPictures = array();
    while($Entry = readdir($MyDirectory)) {
        if($Entry != '.' && $Entry != '..' && !is_dir($MyDirectory.$Entry)){
            array_push($arrayPictures,$Entry);
        }
    }
    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //On recupere les mimage deja présent dans le carousel
    $arrayCarousel = array();
    $arrayCarousel = $conf->get(9)->getValue();
    $arrayCarousel = explode('/',$arrayCarousel);

    //Création des formulaires
    $formFr = $app['form.factory']->createBuilder('form')
        ->add('description_fr','textarea',array(
            'label'=>' ',
            'required'=>true,
            'data'=>$conf->get(10)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->getForm();
    $formEn = $app['form.factory']->createBuilder('form')
        ->add('description_en','textarea',array(
            'label'=>' ',
            'required'=>true,
            'data'=>$conf->get(11)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->getForm();
    $formDe = $app['form.factory']->createBuilder('form')
        ->add('description_de','textarea',array(
            'label'=>' ',
            'required'=>true,
            'data'=>$conf->get(12)->getValue(),
            'constraints'=>array(
                    new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
                )
            ))
        ->getForm();

    if('POST'==$request->getMethod()){

        $formFr->bind($request);
        $formEn->bind($request);
        $formDe->bind($request);

        //Si le formulaire reçu est pour la langue française
        if($formFr->isValid()){
            //Récuperation des données du formulaire
            $data = $formFr->getData();
            //Mise a jour des information dans la table
            $conf->get(10)->setValue($data['description_fr']);
            $conf->save();
            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }

        //Si le formulaire reçu est pour la langue française
        if($formEn->isValid()){
            //Récuperation des données du formulaire
            $data = $formEn->getData();
            //Mise a jour des information dans la table
            $conf->get(11)->setValue($data['description_en']);
            $conf->save();
            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }

        //Si le formulaire reçu est pour la langue française
        if($formDe->isValid()){
            //Récuperation des données du formulaire
            $data = $formDe->getData();
            //Mise a jour des information dans la table
            $conf->get(12)->setValue($data['description_de']);
            $conf->save();
            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }

        //Si le carousel est validé
    }

    return $app['twig']->render('template/admin.accueil.twig', array(
        'formFr'=>$formFr->createView(),
        'formEn'=>$formEn->createView(),
        'formDe'=>$formDe->createView(),
        'pictures'=>$arrayPictures,
        'carousel'=>$arrayCarousel,
        'conf'=>$conf,
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

$app->match('/admin/article/delete/{id}', function($id) use ($app){
    return $app['twig']->render('template/admin.article_delete.twig', array(
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