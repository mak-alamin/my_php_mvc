<?php

namespace app\models;

use app\core\DbModel;

class User extends DbModel{

  public $name;
  public $email;
  public $password;
  public $confirmPassword;
  
  public function tableName(): string
  {
    return 'users';
  }

  public function register()
  {
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    $registered = parent::save();

    return $registered;
  }

  public function rules() : array
  {
    return [
      'name' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED],
      'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password' ] ]
    ];
  }

  public function attributes(): array
  {
    return ['name', 'email', 'password'];
  }
}