<?php


use src\Controllers\UserController;
use src\Controllers\GradeController;
use src\Repositories\GradeRepository;

$UserController = new UserController;
$GradeController = new GradeController;


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
    
        if ($methode === 'POST') {
            $GradeController->getAllGrades();
            
            switch ($route) {
            case HOME_URL . 'addPromotions':

                
                    $GradeController->createGrade();  
                
                break;
            default :
            break;
            }
            break;
           
        } else {
            include __DIR__ . '/Views/connexion.php';
            break;
        }

        break;


    default:

        var_dump($route);
        var_dump("fontionne pas");
        break;
}
