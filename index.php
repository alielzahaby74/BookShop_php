<?php
session_start();
ob_flush();
ob_clean();
require_once 'conn.php';
require_once 'app/helpers.php';
$request = $_SERVER['REQUEST_URI'];
$method  = $_SERVER['REQUEST_METHOD'];

switch ([$request,$method]) {
    case ['', "GET"]:
    case ['/',"GET"] :
        require __DIR__ . '/views/index.php';
        break;
    case ['/login','GET']:
    case ['/login','POST']:
        is_Guest();
        require __DIR__.'/views/login.php';
        break;
    case ['/logout',"GET"]:
        require_once __DIR__.'/app/Auth.php';
        logout();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}