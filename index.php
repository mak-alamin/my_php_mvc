<?php

function my_error_handler($error_level,$error_message,
$error_file,$error_line,$error_context){
    echo '<p><b>Error:</b> ' . $error_message . '</p>';
    echo '<p><b>File: </b>' . $error_file . '</p>';
    echo '<p><b>Line No: </b>' . $error_line . '</p>';
    die();
}
set_error_handler('my_error_handler' , E_ALL);


require_once __DIR__ . '/vendor/autoload.php';


