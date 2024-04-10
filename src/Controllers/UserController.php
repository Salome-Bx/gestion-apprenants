<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\ReservationRepository;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserController
{
    private $UserRepo;
    private $ReservationRepo;

    use Reponse;

    public function __construct()
    {
        // Instanciez les 3 propriétés avec les repositories concernés.
        $this->UserRepo = new UserRepository();
        // $this->ReservationRepo = new ReservationRepository();
    }

    public function login($email, $password)
    {
        // Ce controller est très simple
        // j'instancie le UserRepostory, pour me servir
        // de sa fonction login en lui passant l'email et le password,
        // Je retourne sa réponse
        $userRepo = new UserRepository();
        $reponse = $userRepo->login($email, $password);
        echo json_encode($reponse);
    }
}
