<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Bilou
 * Date: 27/02/13
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */

use Symfony\Component\HttpFoundation\Response;


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

    return $app['twig']->render('template/home.twig', array(
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

$app->get('/{lang}/article', function($lang) use ($app){

    return $app['twig']->render('template/article.twig', array(
        'lang'=>$lang,
    ));
});

$app->get('/{lang}/article/{id}', function($id,$lang) use ($app){

    return $app['twig']->render('template/article_detail.twig', array(
        'id_article'=>$id,
        'lang'=>$lang,
    ));
});

$app->get('/{lang}/contact', function($lang) use ($app){
    return $app['twig']->render('template/contact.twig', array(
        'lang'=>$lang,
    ));
});

$app->get('/404', function() use ($app){
    return $app['twig']->render('template/404.twig', array(
    ));
});

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