<?php


use src\Controllers\UserController;
use src\Controllers\GradeController;
use src\Repositories\GradeRepository;

$UserController = new UserController;
$GradeController = new GradeController;


use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

$routeComposee = ltrim($route, HOME_URL);
$routeComposee = rtrim($routeComposee, '/');
$routeComposee = explode('/', $routeComposee);

switch ($route) {
    case HOME_URL:
        if ($methode === 'POST') {
            $UserController->login();
        } else {
            include __DIR__ . '/Views/connexion.php';
            break;
        }
        
    case HOME_URL . 'dashboard':
    
        if ($methode === 'POST') {
            $GradeController->getAllGrades();
            
        } else {
            include __DIR__ . '/Views/connexion.php';
            break;
        }

        break;


    case $routeComposee[0] == "dashboard":
            switch ($route) {
                case $routeComposee[1] == "addPromotions":
                    $GradeController->createGrade(); 
                    echo("promo ajoutée");

                default:
                    break;
            }
    
    default:
        var_dump($route);
        var_dump("problème de routeur");
        break;



   
}
