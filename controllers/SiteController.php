<?php

namespace app\controllers;

use app\core\Application;

class SiteController
{
  public function home()
  {
    $params = [
      'name' => 'My Cooool Site!',
      'owner' => 'Mak Alamin'
    ];

    return Application::$app->router->render_view('home', $params);
  }
}
