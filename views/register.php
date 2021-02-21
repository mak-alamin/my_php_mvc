<h1>Register Now</h1>

<form action="" method="post">
  <?php

    $fields = app\core\Application::$app->fields;

    $fields->input_field($registerModel, 'your_name', 'text', 'Your Name');
    
    $fields->input_field($registerModel, 'your_email', 'email', 'Your Email');
    
    $fields->input_field($registerModel, 'password', 'password', 'Password');
    
    $fields->input_field($registerModel, 'confirmPassword', 'password', 'Confirm Password');

    $fields->submit_button();
  ?>
</form>