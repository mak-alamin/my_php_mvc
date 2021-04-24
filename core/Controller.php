<?php

namespace app\core;

class Controller{
 
  public $layout = 'main';

  public function render($view, $params)
  {
    return Application::$app->router->render_view( $view, $params);
  }
  
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
}