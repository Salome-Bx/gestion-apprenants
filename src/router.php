<?php


use src\Controllers\UserController;

$UserController = new UserController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
    case str_contains($route, "connexion"):
        var_dump($route);
        var_dump("hello");
        // if ($methode === 'POST') {
        //     $UserController->authentication($_POST['emailConnexion'], $_POST['motDePasseConnexion']);
        // } else {
        //     $HomeController->connexion();
        // }
        break;


    default:
        // $HomeController->page404();
        var_dump($route);
        var_dump("fontionne pas");
        break;
}
