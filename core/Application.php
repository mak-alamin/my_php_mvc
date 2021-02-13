<?php

namespace app\core;

class Application
{
  public $request;
  public $router;

  public function __construct()
  {

    echo '<link rel="stylesheet" href="assets/css/main.css">';

    set_error_handler([$this, 'my_error_handler'] , E_ALL);

    $this->request = new Request();
    $this->router = new Router($this->request);
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
