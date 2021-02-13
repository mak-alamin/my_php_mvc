<?php

namespace app\core;

class Router
{
  public $request;

  protected array $routes = [];

  public function __construct( $request )
  {
    $this->request = $request;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function render_view($view)
  {
    $view_file = __DIR__ . "/../views/{$view}.php";
    
    if (file_exists( $view_file )) {
      include_once $view_file;
    }
  }

  public function resolve()
  {
    $path = $this->request->get_path();

    $method = $this->request->get_method();

    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      echo 'Page Not Found!';
      exit;
    }
    
    if (is_string($callback)) {
      return $this->render_view($callback);
    }

    return call_user_func($callback);
   
  }
}
