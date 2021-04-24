<?php

function dprintr($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
  die();
}