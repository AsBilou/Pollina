<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function() {
    return $app['twig']->render('template/home.twig', array(
    );
});

$app->get('/admin', function() {
    return $app['twig']->render('template/admin.twig', array(
        );
});

$app->get('/article', function() {
    return $app['twig']->render('template/article.twig', array(
    );
});

$app->get('/article/{id}', function($id) {

    return $app['twig']->render('template/article_detail.twig', array(
        'id_article'=>$id,
    );
});

$app->get('/contact', function() {
    return $app['twig']->render('template/contact.twig', array(
    );
});

$app->run();
