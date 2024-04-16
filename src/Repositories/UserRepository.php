<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    // sert à vérifier si l'email existe déjà en DB
    public function findByMail(string $mail): User|bool
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE Email_User = :Email_User";
        

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":Email_User" => $mail
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    
    
}
