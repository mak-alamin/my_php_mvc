<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\registerModel;

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

    $registerModel = new registerModel();
  
    if ($request->isPost()) {
      $registerModel->loadData($request->getBody());

      if ($registerModel->validate() && $registerModel->register()) {
        echo "Success!";
      }
    }

    return $this->render('register',[
      'registerModel' => $registerModel,
    ]);
  }
}