<?php

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

//Affiche les bugs
$app['debug']=true;

//Mise en route de twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function() use ($app){
    $test = 'test';
    return $app['twig']->render('template/home.twig', array(
    ));
});

$app->get('/admin', function() use ($app){
    return $app['twig']->render('template/admin.twig', array(
        ));
});

$app->get('/article', function() use ($app){
    return $app['twig']->render('template/article.twig', array(
        ));
});

$app->get('/article/{id}', function($id) use ($app){

    return $app['twig']->render('template/article_detail.twig', array(
        'id_article'=>$id,
        ));
});

$app->get('/contact', function() use ($app){
    return $app['twig']->render('template/contact.twig', array(
    ));
});

$app->run();
