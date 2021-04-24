<?php

namespace app\core;

use app\core\form\Fields;

class Application
{
  public static $rootDir;
  public Database $db;
  public Request $request;
  public Response $response;
  public Router $router;
  public Controller $controller;
  public Session $session;
  public Fields $fields;

  public static Application $app;

  public function __construct($rootDir, $config)
  {

    self::$rootDir = $rootDir;
    self::$app = $this;
    
    set_error_handler([$this, 'my_error_handler'] , E_ALL);

    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
    $this->controller = new Controller();
    $this->session = new Session();
    $this->db = new Database($config['db']);

    $this->fields = new Fields();
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
