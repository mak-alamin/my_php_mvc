<?php

use app\core\Application;

define('MY_MVC_ASSETS', "http://" . $_SERVER['HTTP_HOST'] . "/assets"); 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Hello, My MVC!</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="/">MY MVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            <a class="nav-link" href="/services">Services</a>
            <a class="nav-link" href="/about">About Us</a>
            <a class="nav-link" href="/contact">Contact Us</a>
          </div>

          <div class="navbar-nav navbar-right">
            <a class="nav-link" href="/register">Register</a>
            <a class="nav-link" href="/login">Login</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
     
      <?php if ( Application::$app->session->getFlash('success') ) { ?>
        <div class="alert alert-success">
          <?php echo Application::$app->session->getFlash('success'); ?>
        </div>
      <?php } ?>

      {{content}}

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/vue@next"></script>
    <script src="<?php echo MY_MVC_ASSETS; ?>/js/app.js"></script>
  </body>
</html>