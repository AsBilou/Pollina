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

$app->get('/', function() use ($app){
    $menus = MenuQuery::create()
        ->find();
    //print_r($menus);
    return $app['twig']->render('template/home.twig', array(
        'menus'=>$menus,
    ));
});

$app->get('/admin', function() use ($app){
    return $app['twig']->render('template/admin.home.twig', array(
    ));
});

$app->get('/admin/article', function() use ($app){
    return $app['twig']->render('template/admin.article.twig', array(
    ));
});

$app->match('/admin/article/create', function() use ($app){
    return $app['twig']->render('template/admin.article_create.twig', array(
    ));
});

$app->get('/admin/article/edit', function() use ($app){
    return $app['twig']->render('template/admin.article_edit.twig', array(
    ));
});

$app->match('/admin/article/edit/{id}', function($id) use ($app){
    return $app['twig']->render('template/admin.article_edit_detail.twig', array(
    ));
});

$app->get('/admin/menu', function() use ($app){
    return $app['twig']->render('template/admin.menu.twig', array(
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

$app->get('/admin/login', function() use ($app){
    return $app['twig']->render('template/admin.login.twig', array(
    ));
});

$app->get('/admin/logout', function() use ($app){
    return $app['twig']->render('template/admin.logout.twig', array(
    ));
});

$app->get('/404', function() use ($app){
    return $app['twig']->render('template/404.twig', array(
    ));
});

return $app;

?>