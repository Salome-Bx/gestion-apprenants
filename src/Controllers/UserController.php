<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserController
{
    private $UserRepo; 
    private $User;


    use Reponse;

    public function __construct()
    {
        $this->UserRepo = new UserRepository();
        $this->User = new User();
    }



    public function login()   
    {
        $data = file_get_contents("php://input");
        $user = json_decode($data, true);

        $email = $user["email"];
        $password = $user["password"];
        
        $userRepo = new UserRepository();
        
        $userBD = $userRepo->findByMail($email);
            
        if ($userBD) {
            http_response_code(200);
                
                if (password_verify($password, $userBD->getPasswordUser())) {
                    $_SESSION['connecté'] = TRUE;
                    $userBD = $userBD->getObjectToArray();
                    
                    
                    $_SESSION['user'] = $userBD;

                $this->render("dashboard");
                //    ob_clean();
                echo json_encode(["status" => "succes", "message" => "Connexion réussie", "infos_user" => $_SESSION['user']]);
                } else {
                    http_response_code(401);
                    echo json_encode(["status" => "erreur", "message" => "Mot de passe erroné"]);
                }
        } else {
            http_response_code(401);
            echo json_encode(["status" => "erreur", "message" => "Vous n'êtes pas enregistré"]);
        }
    }

}