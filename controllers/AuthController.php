<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\User;

class AuthController extends Controller{
  
  public function login($request)
  {
    $this->setLayout('auth');

    $params = [];

    if ($request->isPost()) {
      echo 'Handling Login data...';
      die();
    }

    return $this->render('login', $params);
  }

  public function register($request)
  {
    $this->setLayout('auth');

    $User = new User();

    if ($request->isPost()) {
      
      $User->loadData($request->getBody());

      if ($User->validate() && $User->register()) {
       
        Application::$app->session->setFlash('success', 'Thank you for registering!');
       
        Application::$app->response->redirect('/users');
        exit;
    
      }

    }

    return $this->render('register',[
      'User' => $User,
    ]);
  }
}