<?php

namespace app\core;

abstract class Model{
  public const RULE_REQUIRED = 'required';
  public const RULE_EMAIL = 'email';
  public const RULE_MATCH = 'match';

  public function loadData($data)
  {
    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->{$key} = $value;
      }
    }
  }

  abstract public function rules() : array ;

  public array $errors = [];

  public function validate()
  {

    foreach ($this->rules() as $attribute => $rules) {
      
      $value = $this->{$attribute};

      foreach ($rules as $rule) {
        
        $ruleName = $rule;

        if ( ! is_string( $ruleName )) {
          $ruleName = $rule[0];
        }

        if ($ruleName == self::RULE_REQUIRED && !$value) {
          $this->addError($attribute, self::RULE_REQUIRED);
        }

        if ($ruleName == self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $this->addError($attribute, self::RULE_EMAIL);
        }
      }
    }

    return empty($this->errors);
  }

  private function addError($attribute, $rule)
  {
    $message = $this->errorMessages()[$rule] ?? '';
    $this->errors[$attribute][] = $message;
  }

  private function errorMessages()
  {
    return [
      self::RULE_REQUIRED => 'This field is required.',
      self::RULE_EMAIL => 'This should be a valid email address.',
      self::RULE_MATCH => 'This field must be same as {match}',
    ];
  }

  public function hasError($attribute)
  {
    return $this->errors[$attribute] ?? false;
  }

  public function getFirstError($attribute)
  {
    return $this->errors[$attribute][0] ?? false;
  }
}