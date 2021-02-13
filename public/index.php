<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \app\core\Application;

$app = new Application();

$app->router->get('/','home');
$app->router->get('/service',function()
{
   return "Our Services";
});

$app->router->get('/users', function()
{
   return "Users"; 
});

$app->router->get('/about', 'about');
$app->router->get('/contact', 'contact');

$app->run();