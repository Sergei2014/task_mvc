<?php
require 'application/lib/Dev.php';
use \application\core\Router;


spl_autoload_register(function ($class_name) {
    $path = str_replace('\\', '/', $class_name . '.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

$router = new Router();
$router->run();