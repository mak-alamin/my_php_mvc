<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class SiteController extends Controller
{
  public function home()
  {
    $params = [
      'name' => 'My Cooool Site!',
      'owner' => 'Mak Alamin'
    ];

    return $this->render('home', $params);
  }

  public function about()
  {
    $params = [];

    return $this->render('about', $params);
  }

  public function services()
  {
    $params = [];

    return $this->render('services', $params);
  }

  
  public function users()
  {
    $params = [];

    return $this->render('users', $params);
  }

  public function contact()
  {
    $params = [];

    return $this->render('contact', $params);
  }

  public function handleContact( $request )
  {
    $body = $request->getBody();
    dprintr($body);
  }
}
