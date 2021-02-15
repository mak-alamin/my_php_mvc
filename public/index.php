<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \app\core\Application;
use app\controllers\SiteController;

$app = new Application(dirname(__DIR__));
$siteController = new SiteController();

$app->router->get('/', [$siteController, 'home']);

$app->router->get('/users', function()
{
   return "Users"; 
});

$app->router->get('/about', 'about');
$app->router->get('/services', 'services');
$app->router->get('/contact', 'contact');

$app->router->post('/contact', function()
{
   return "Handling Submitted data.";
});

$app->run();