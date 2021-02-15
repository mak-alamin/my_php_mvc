<?php

namespace app\core;

class Application
{
  public static $rootDir;
  public $request;
  public $response;
  public $router;
  public static $app;

  public function __construct($rootDir)
  {

    self::$rootDir = $rootDir;
    self::$app = $this;
    
    set_error_handler([$this, 'my_error_handler'] , E_ALL);

    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  public function my_error_handler($error_level,$error_message, $error_file,$error_line,$error_context){
    echo '<div class="error-div">';
    echo '<p><b>Error:</b> ' . $error_message . '</p>';
    echo '<p><b>File: </b>' . $error_file . '</p>';
    echo '<p><b>Line No: </b>' . $error_line . '</p>';
    echo '</div>';
  }



  public function run()
  {
    echo $this->router->resolve();
  }
}
