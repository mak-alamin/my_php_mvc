<h1>Register Now</h1>

<form action="" method="post">
  <?php

    $fields = app\core\Application::$app->fields;

    $fields->input_field($User, 'name', 'text', 'Your Name');
    
    $fields->input_field($User, 'email', 'email', 'Your Email');
    
    $fields->input_field($User, 'password', 'password', 'Password');
    
    $fields->input_field($User, 'confirmPassword', 'password', 'Confirm Password');

    $fields->submit_button();
  ?>
</form>