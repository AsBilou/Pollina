<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Bilou
 * Date: 05/03/13
 * Time: 16:13
 * To change this template use File | Settings | File Templates.
 */


use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

$app = require __DIR__.'/bootstrap.php';

$app->boot();


$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('template/admin/login.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
});

$app->get('/admin', function() use ($app){
    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //Récupere le nombre d'article sur le site
    $nbArticle = ArticlesQuery::create()
        ->count();

    return $app['twig']->render('template/admin/home.twig', array(
        'conf'=>$conf,
        'nbArticle'=>$nbArticle,
    ));
})->bind('index_admin');

$app->match('/admin/accueil', function(Request $request) use ($app){

    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

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

    return $app['twig']->render('template/admin/accueil.twig', array(
        'formFr'=>$formFr->createView(),
        'formEn'=>$formEn->createView(),
        'formDe'=>$formDe->createView(),
        'conf'=>$conf,
    ));
})->bind('form_accueil');

$app->get('/admin/news', function() use ($app){

    //Récuperation de tous les artciles présent dans la base de données
    $article = ArticlesQuery::create()
        ->find();

    //Affichage de tous les articles
    return $app['twig']->render('template/admin/article.twig', array(
        'articles'=>$article,
    ));
});

$app->match('/admin/news/create', function(Request $request) use ($app){

    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('title','text',array(
        'label'=>'Titre',
        'required'=>true,
        'attr' => array('class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
            )
        ))
        ->add('content_fr','textarea',array(
        'label'=>'Article en Français.',
        'required'=>true,
        'attr' => array('class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
            )
        ))
        ->add('content_en','textarea',array(
        'label'=>'Article en Anglais.',
        'required'=>true,
        'attr' => array('class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
            )
        ))
        ->add('content_de','textarea',array(
        'label'=>'Article en Allemand.',
        'required'=>true,
        'attr' => array('class'=>'span10'),
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

            //Récuperation du dernier index
            $articlePager = ArticlesQuery::create()->paginate();
            $lastIndex = $articlePager->getLastIndex();

            //Création d'un nouvel objet article
            $articleFr = new Articles();
            $articleFr->setContenu($data['content_fr']);
            $articleFr->setTitle($data['title']);
            $articleFr->setId($lastIndex+1);
            $articleFr->setLang('fr');
            $articleFr->save();

            $articleEn = new Articles();
            $articleEn->setContenu($data['content_en']);
            $articleEn->setTitle($data['title']);
            $articleEn->setId($lastIndex+1);
            $articleEn->setLang('en');
            $articleEn->save();

            $articleDe = new Articles();
            $articleDe->setContenu($data['content_de']);
            $articleDe->setTitle($data['title']);
            $articleDe->setId($lastIndex+1);
            $articleDe->setLang('de');
            $articleDe->save();

            return $app->redirect($app['url_generator']->generate('admin_ok'));

        }

    }

    return $app['twig']->render('template/admin/article_create.twig', array(
        'form'=>$form->createView(),
    ));
})->bind('form_news_create');

$app->match('/admin/news/edit/{id}/{lang}', function(Request $request,$id,$lang) use ($app){
    //On récupere l'article
    $article = ArticlesQuery::create()->filterById($id)->filterByLang($lang)->find();
    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('title','text',array(
        'label'=>'Sujet',
        'required'=>true,
        'attr' => array('placeholder' => 'Sujet de l\'article','value'=>$article->get(0)->getTitle(),'class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->add('contenu','textarea',array(
        'label'=>'Version '.strtoupper($lang),
        'required'=>true,
        'data' => $article->get(0)->getContenu(),
        'attr' => array('class'=>'span10'),
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

            //Création d'un nouvel objet administrateur
            $article->get(0)->setTitle($data['title']);
            $article->get(0)->setContenu($data['contenu']);
            $article->save();
            return $app->redirect($app['url_generator']->generate('admin_ok'));

        }

    }

    return $app['twig']->render('template/admin/article_edit.twig', array(
        'form'=>$form->createView(),
        'id'=>$id,
        'lang'=>$lang,
    ));
});

$app->match('/admin/news/delete/{id}', function($id) use ($app){

    $article = ArticlesQuery::create()->filterById($id)->find();
    $article->delete();

    return $app->redirect($app['url_generator']->generate('admin_ok'));

    //return $app['twig']->render('template/admin/article_delete.twig', array(
    //));
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

    return $app['twig']->render('template/admin/info.twig', array(
        'form'=>$form->createView(),
    ));
})->bind('form_conf');

$app->match('/admin/carousel/select', function(Request $request) use ($app){
    //Recupere le contenu du dossier contenant les images du carousel
    $MyDirectory = opendir('img/carousel/') or die('Erreur');
    $arrayPictures = array();
    while($Entry = readdir($MyDirectory)) {
        if($Entry != '.' && $Entry != '..' && $Entry != '.DS_Store' && !is_dir($MyDirectory.$Entry)){
            array_push($arrayPictures,$Entry);
        }
    }
    //Récupere tout le contenu de la table configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //On recupere les mimage deja présent dans le carousel
    $arrayCarousel = array();
    $arrayCarousel = $conf->get(9)->getValue();
    $arrayCarousel = explode(',',$arrayCarousel);

    if('POST'==$request->getMethod()){
        //recuperation des images selectionnées et envoyées en POST
        $selectedPicture = $_POST['selected'];
        //Si le formulaire contient bien des images a inclure
        if(!empty($selectedPicture)){
            $conf->get(9)->setValue($selectedPicture);
            $conf->save();

            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }
        else{
            return $app->redirect($app['url_generator']->generate('admin_ko'));
        }
    }

    return $app['twig']->render('template/admin/carousel_select.twig', array(
        'pictures'=>$arrayPictures,
        'carousel'=>$arrayCarousel,
        'conf'=>$conf,
    ));
})->bind('form_car');

$app->get('/admin/carousel', function() use ($app){

    //récuperation des infos de configuration
    $conf = ConfigurationQuery::create()
        ->find();

    //Récuperation des image du carousel
    $carousel = $conf->get(9)->getValue();

    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/admin/carousel.twig', array(
        'carousel'=>$carousel,
    ));
});

$app->match('/admin/carousel/upload', function (Request $request) use ($app){

    $form = $app['form.factory']->createBuilder('form')
        ->add('FileUpload', 'file',array(
        'label'=>' ',
    ))
        ->getForm();

    $request = $app['request'];

    if ($request->getMethod() == 'POST')
    {
        $form->bindRequest($request);
        if ($form->isValid())
        {
            $files = $request->files->get($form->getName());
            /* Make sure that Upload Directory is properly configured and writable */
            $path = __DIR__.'/../web/img/carousel/';
            $filename = $files['FileUpload']->getClientOriginalName();
            $files['FileUpload']->move($path,$filename);

            return $app->redirect($app['url_generator']->generate('admin_ok'));
        }

    }
    return $app['twig']->render('template/admin/carousel_upload.twig', array(
        'form'=>$form->createView(),
    ));
}, 'GET|POST');

$app->get('/admin/user', function() use ($app){

    $users = AdminQuery::create()
        ->find();

    return $app['twig']->render('template/admin/user.twig', array(
        'users'=>$users,
    ));
});

$app->match('/admin/user/create', function(Request $request) use ($app){

    //Création du token de l'utilisateur
    $token = $app['security']->getToken();
    if (null !== $token) {
        $user = $token->getUser();
    }

    $form = $app['form.factory']->createBuilder('form')
        ->add('login','text',array(
        'label'=>'Identifiant',
        'required'=>true,
        'attr' => array('placeholder' => 'pierre'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->add('email','email',array(
        'label'=>'Email',
        'required'=>true,
        'attr' => array('placeholder' => 'pierredupond@pollina.fr'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->add('password','password',array(
        'label'=>'Mot de passe',
        'required'=>true,
        'attr' => array('placeholder' => 'Mot de passe'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->add('verif_pass','password',array(
        'label'=>'Verification',
        'required'=>true,
        'attr' => array('placeholder' => 'Vérification'),
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
            if($data['password']==$data['verif_pass']){
                // find the encoder for a UserInterface instance
                $encoder = $app['security.encoder_factory']->getEncoder($user);
                // compute the encoded password for foo
                $password = $encoder->encodePassword($data['password'], $user->getSalt());

                //Création d'un nouvel objet administrateur
                $admin = new Admin();
                $admin->setLogin($data['login']);
                $admin->setEmail($data['email']);
                $admin->setPassword($password);
                $role = array();
                array_push($role,"ROLE_ADMIN");
                $serializeData = serialize($role);
                $admin->setRole($serializeData);
                $admin->save();
                return $app->redirect($app['url_generator']->generate('admin_ok'));

            }
            return $app->redirect($app['url_generator']->generate('admin_ko'));

        }

    }

    return $app['twig']->render('template/admin/user_create.twig', array(
        'form'=>$form->createView(),
    ));
})->bind('form_user_create');

$app->match('/admin/user/delete/{id}', function($id) use ($app){

    $user = AdminQuery::create()->filterById($id)->find();
    $user->delete();

    return $app->redirect($app['url_generator']->generate('admin_ok'));

});

$app->get('/admin/newsletter', function() use ($app){

    $user_news = NewsletterQuery::create()
        ->find();

    return $app['twig']->render('template/admin/newsletter.twig', array(
        'user_news'=>$user_news,
    ));
});

$app->match('/admin/newsletter/create', function(Request $request) use ($app){
    //Récuperation de tous les inscrit a la newsletter
    $user_news = NewsletterQuery::create()
        ->filterByState('actif')
        ->find();
    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('subject','text',array(
        'label'=>'Sujet',
        'required'=>true,
        'attr' => array('placeholder' => 'Sujet de la newsletter','class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->add('content','textarea',array(
        'label'=>'Contenu',
        'required'=>true,
        'data' => 'Votre news',
        'attr' => array('class'=>'span10'),
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
            //Création d'un nouvel objet administrateur
            $admin = new Admin();
            $admin->setEmail($data['email']);
            $admin->setPassword($data['password']);
            $admin->setLogin($data['login']);
            $admin->save();
            return $app->redirect($app['url_generator']->generate('newsletter_ok'));

        }

    }

    return $app['twig']->render('template/admin/newsletter_create.twig', array(
        'user_news'=>$user_news,
        'form'=>$form->createView(),
    ));
})->bind('form_newsletter_create');

$app->get('/admin/devis/pages', function() use ($app){
    return $app['twig']->render('template/admin/ok.twig', array(
    ));
})->bind('devis_pages');

$app->get('/admin/devis/liste', function() use ($app){

    $devis = DevisQuery::create()
        ->find();

    return $app['twig']->render('template/admin/devis_liste.twig', array(
        'devis'=>$devis,
    ));
})->bind('devis_liste');

$app->get('/admin/devis/detail/{id}', function($id) use ($app){

    $devis = DevisQuery::create()
        ->filterById($id)
        ->find();
    $devis=$devis->get(0);

    return $app['twig']->render('template/admin/devis_detail.twig', array(
        'dev'=>$devis,
    ));
})->bind('devis_detail');

$app->get('/admin/menu', function() use ($app){
    return $app['twig']->render('template/admin/menu.twig', array(
    ));
});

$app->get('/admin/ok', function() use ($app){
    return $app['twig']->render('template/admin/ok.twig', array(
    ));
})->bind('admin_ok');

$app->get('/admin/ko', function() use ($app){
    return $app['twig']->render('template/admin/ko.twig', array(
    ));
})->bind('admin_ko');

$app->get('/newsletter/ok', function() use ($app){
    return $app['twig']->render('template/admin/newsletter_ok.twig', array(
    ));
})->bind('newsletter_ok');

$app->get('/404', function() use ($app){
    return $app['twig']->render('template/404.twig', array(
    ));
});


return $app;

?>