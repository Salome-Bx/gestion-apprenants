<?php


use src\Controllers\UserController;

$UserController = new UserController;

use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
    case str_contains($route, "/"):
        include __DIR__ . '/Views/connexion.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = file_get_contents("php://input");
            $user = (json_decode($data, true));
            var_dump($user);
            $email = htmlspecialchars(strip_tags(trim($user["email"])));
            $password = htmlspecialchars(strip_tags(trim($user["password"])));
        }
        $reponse = $UserController->login($email, $password);
        //  Je retourne au format JSON la réponse du controller
        echo json_encode($reponse);

        break;


    default:

        var_dump($route);
        var_dump("fontionne pas");
        break;
}
