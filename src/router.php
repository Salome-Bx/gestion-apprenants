<?php


use src\Controllers\UserController;

$UserController = new UserController;

use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
    case HOME_URL:
        if ($methode === 'POST') {
            $UserController->login();
        } else {
            include __DIR__ . '/Views/connexion.php';
            break;
        }
        
    case HOME_URL . 'dashboard':


        break;


    default:

        var_dump($route);
        var_dump("fontionne pas");
        break;
}
