<?php

namespace app\core;

class Router
{
  public $request;
  public $response;

  protected array $routes = [];

  public function __construct( $request, $response )
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  public function resolve()
  {
    $path = $this->request->get_path();

    $method = $this->request->get_method();

    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);
      return $this->render_view('_404');
    }
    
    if (is_string($callback)) {
      return $this->render_view($callback);
    }

    return call_user_func($callback);
   
  }

  public function render_view($view, $params=[])
  {
    
    $layoutContent = $this->layoutContent();
    $viewContent = $this->renderOnlyView($view, $params);

    return str_replace('{{content}}', $viewContent, $layoutContent);  
  }

  protected function layoutContent(){
    $layout_file = Application::$rootDir . "/views/layouts/main.php";

    if (file_exists($layout_file)) {
      ob_start();   
      include_once $layout_file;
      return ob_get_clean();
    } else {
      echo "Error: You might have been forgot to create a layout file!";
    }
  }

  protected function renderOnlyView($view, $params)
  {

    foreach ($params as $key => $value) {
      $$key = $value;
    }

    $view_file = Application::$rootDir . "/views/{$view}.php";

    if (file_exists($view_file)) {
      ob_start();   
      include_once $view_file;
      return ob_get_clean();
    } else {
      echo "Error: You might have been forgot to create the $view view file!";
    }
  }
}
