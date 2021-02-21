<?php

namespace app\models;

use app\core\Model;

class registerModel extends Model{

  public $your_name;
  public $your_email;
  public $password;
  public $confirmPassword;
  
  public function register()
  {
    echo "Creating new User...";
    return true;
  }

  public function rules() : array
  {
    return [
      'your_name' => [self::RULE_REQUIRED],
      'your_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED],
      'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password' ] ]
    ];
  }
}