<?php
require 'Controller.php';
require '../Auth/AuthController.php';
require '../Auth/registerController.php';

$current_url = $_SERVER['REQUEST_URI'];
$route = basename($current_url);

$routes = [
    'home' => ['index','Controller'],
    'show' => ['show','Controller'],
    'login' => ['login','AuthController'],
    'create_login_session' => ['create_login_session','AuthController'],
    'welcome' => ['welcome','AuthController'],
    'register' => ['register','registerController'],
    'create_user' => ['create_user','registerController']
];

if (array_key_exists($route, $routes)) {
    $functionName = $routes[$route][0];
    $ClassName = $routes[$route][1];
    if (method_exists($ClassName, $functionName)) { 
        $new_requset  = new $ClassName;
        $new_requset->$functionName();
    } else {
        echo "Method Not Found !";
    }
} else {
    echo "Route Dont found !";
}
