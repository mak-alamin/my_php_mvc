<?php

namespace app\core\form;

class Fields{
  public function input_field(object $model, string $name, string $type, $label)
  {
    echo sprintf('
      <div class="mb-3">
        <label for="%s" class="form-label">%s</label>
        <input type="%s" name="%s" value="%s" class="form-control %s" id="%s">
        <div class="invalid-feedback"> %s </div>
      </div>',
      $name,
      $label,
      $type,
      $name,
      $model->{$name},
      $model->hasError($name) ? 'is-invalid' : '',
      $name,
      $model->hasError($name) ? $model->getFirstError($name) : ''
    );
  }

  public function submit_button($name='submit', $value='Submit')
  {
    echo sprintf('
      <input type="submit" name="%s" value="%s" class="btn btn-primary" id="%s">
    ', $name, $value, $name);
  }
}