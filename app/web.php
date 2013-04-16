<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Bilou
 * Date: 27/02/13
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


$app->get('/',function() use ($app){
    return $app->redirect('fr/');
});

$app->get('/{lang}/', function($lang) use ($app){
    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();

    //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    
    $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );

    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();

    //Récuperation des articles pour la langue choisie
    $articles = ArticlesQuery::create()
        ->filterByLang($lang)
        ->find();

    //Récuperation du nombre d'article
    $nbArticle = ArticlesQuery::create()
        ->filterByLang($lang)
        ->count();

    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/home.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
        'articles'=>$articles,
        'nbArticel'=>$nbArticle,
    ));
});

$app->get('/{lang}/contact', function($lang) use ($app){

    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();
    
<<<<<<< HEAD
=======
        //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }

>>>>>>> modifiaction front page contact + début espace client
    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
<<<<<<< HEAD
    $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );
    
        //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    
=======
>>>>>>> modifiaction front page contact + début espace client
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/contact.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
    ));
})->bind('nous_contactez');

$app->get('/{lang}/item_01', function($lang) use ($app){

        //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    
    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();
   

    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);
    
        $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );

    return $app['twig']->render('template/site/item_01.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
    ));
})->bind('item_01');


$app->get('/{lang}/metiers', function($lang) use ($app){
    
    
    //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }

    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();

    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
    $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );

    
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/metiers.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
    ));
})->bind('metiers');

$app->match('/{lang}/espace_client', function(Request $request,$lang) use ($app){

 //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();
    
            //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    

    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
    $sheet = SheetQuery::create()
        ->find();
    for($i=0;$i<$sheet->count();$i++ )
    {
        $key=$sheet->get($i)->getId();
        $datasheet [$key] = utf8_encode( $sheet->get($i)->getName());
    }
    


        $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );
        
    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('number_pages','text',array(
        'label'=>'Le nombre de page',
        'required'=>true,
        'attr' => array('placeholder' => 'XX'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
            )
        ))
        ->add('type', 'choice', array(
          'choices' => $datasheet,
          'required'=>true,
          'label'=>'Type de papier',
        ))
        ->add('email','email',array(
        'label'=>'Votre email',
        'required'=>true,
        'attr' => array('placeholder' => 'pierre@pollina.fr','class'=>'span7'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
        ))

     ->getForm();
    
    
     $flagCreateDevis = 0; 
     if('POST'==$request->getMethod()){
        $form->bind($request);
        if($form->isValid()){
            $data = $form->getData();
            $type = $data['type'];
            $number_pages = $data['number_pages'];
            
            $devis = new Devis();
            $name = date("Y-m-d")."_".rand(0000, 9999);
            $devis->setName($name);
            $devis->setIdSheet($type);
            $devis->setNumber($number_pages);
            $devis->setStatus("en attente de paiement");
            $devis->save();
            $flagCreateDevis = 1;
        }
    } 
    
    $statusDevis="";
    if(isset($_POST['seach'])){
    if($_POST['seach'] == "1"){
        
            $findDevis = DevisQuery::create()
                ->filterByName($_POST['key'])
                ->find();
            $statusDevis = $findDevis->get(0)->getStatus();
    }}
        
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/espace_client.twig', array(
        'flagCreateDevis'=> $flagCreateDevis,
        'statusDevis'=> $statusDevis,
        'form'=>$form->createView(),
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
    ));
})->bind('espace_client');


<<<<<<< HEAD
$app->get('/{lang}/plan_site', function($lang) use ($app){

    
    //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    
    //Récuperation des information
=======
 //Récuperation des information
>>>>>>> modifiaction front page contact + début espace client
    $conf = ConfigurationQuery::create()
        ->find();
    
            //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }
    

    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
<<<<<<< HEAD
        $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );
        
=======
>>>>>>> modifiaction front page contact + début espace client
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/plan_site.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
<<<<<<< HEAD
=======

>>>>>>> modifiaction front page contact + début espace client
    ));
})->bind('plan_site');


$app->get('/404', function() use ($app){
    return $app['twig']->render('template/site/404.twig', array(
    ));
});

$app->get('/{lang}/mention/legal', function($lang) use ($app){
    
    
    
    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();

    //Recuperation du menu
    $menus = MenuQuery::create()
        ->find();
    
        $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );
        
    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);

    return $app['twig']->render('template/site/mention.twig', array(
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
    ));
})->bind('mention_legal');


$app->match('/{lang}/newsletter/unsubscribe', function(Request $request,$lang) use ($app){

    $menus = array(
        'menu_1'=>array(
            'id'=>1,
            'name'=>'Nos Metiers',
            'sub_menus'=>array(
                'sub_menu_1'=>array(
                    'id'=>11,
                    'name'=>'Metier 01',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>111,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_2'=>array(
                    'id'=>12,
                    'name'=>'Metier 02',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>121,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
                'sub_menu_3'=>array(
                    'id'=>13,
                    'name'=>'Metier 03',
                    'link'=>'Metier 01',
                    'sub_sub_menu'=>array(
                        'sub_sub_menu_1'=>array(
                            'id'=>131,
                            'name'=>'Sous Metier 01',
                            'link'=>'Metier 01'
                        )
                    )
                ),
            ),
        )
    );

    //Recuperation de la langue a afficher
    switch($lang){
        case 'fr':
            $langDescription=10;
            break;
        case 'en':
            $langDescription=11;
            break;
        case 'de':
            $langDescription=12;
            break;
        default:
            $langDescription=10;
            $lang='fr';
            break;
    }

    //Récuperation des information
    $conf = ConfigurationQuery::create()
        ->find();


    //Explode du contenu du carousel
    $carousel = $conf->get(9)->getValue();
    $carousel = explode(',',$carousel);


    //Création du formulaire
    $form = $app['form.factory']->createBuilder('form')
        ->add('email','email',array(
        'label'=>'Votre email',
        'required'=>true,
        'attr' => array('placeholder' => 'pierre@pollina.fr','class'=>'span10'),
        'constraints'=>array(
            new Assert\NotBlank(array('message' => 'Don\'t leave blank')),
        )
    ))
        ->getForm();

    if('POST'==$request->getMethod()){
        $form->bind($request);
        if($form->isValid()){
            $data = $form->getData();
            $mail = $data['email'];
            $user = NewsletterQuery::create()
                ->filterByEmail($mail)
                ->find();
            $user->get(0)->setState('inactif');
            $user->save();
        }
    }
    return $app['twig']->render('template/site/newsletter_unsubscribe.twig', array(
        'form'=>$form->createView(),
        'menus'=>$menus,
        'lang'=>$lang,
        'adresse'=>$conf->get(0)->getValue(),
        'CP'=>$conf->get(1)->getValue(),
        'city'=>$conf->get(2)->getValue(),
        'phone'=>$conf->get(3)->getValue(),
        'fax'=>$conf->get(4)->getValue(),
        'facebook'=>$conf->get(5)->getValue(),
        'twitter'=>$conf->get(6)->getValue(),
        'gplus'=>$conf->get(7)->getValue(),
        'rss'=>$conf->get(8)->getValue(),
        'carousel'=>$carousel,
        'description'=>$conf->get($langDescription)->getValue(),
    ));
})->bind('form_newsletter_unsubscribe');

$app->error(function (\Exception $e, $code) use ($app) {
    if($app['debug']) {
        return;
    }
    switch ($code) {
        case 404:
            return new Response( $app['twig']->render('template/404.twig'), 404);
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message);
});


return $app;

?>