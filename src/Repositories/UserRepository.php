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



    public function login($email): array
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE Email_User = :Email_User";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":Email_User" => $email
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    





    // public function saveUser(User $user)
    // {
    //     $sql = "INSERT INTO " . PREFIXE . "user (lastName, firstName, password, address, telephone, User_Role, mail) VALUES (:lastName, :firstName, :password, :address, :telephone, :User_Role, :mail)";

    //     $statement = $this->DB->prepare($sql);

    //     $statement->execute([
    //         ':lastName' => $user->getLastName(),
    //         ':firstName' => $user->getFirstName(),
    //         ':password' => $user->getPassword(),
    //         ':address' => $user->getAddress(),
    //         ':telephone' => $user->getTelephone(),
    //         ':User_Role' => $user->isUserRole(),
    //         ':mail' => $user->getMail()
    //     ]);
    //     return $statement;
    // }

    // public function userExist(User $user)
    // {
    //     $sql = "SELECT * FROM " . PREFIXE . "user WHERE Email_User = :Email_User";
    //     $email = $user->getEmailUser();
    //     $statement = $this->DB->prepare($sql);
    //     $statement->execute([':Email_User' => $email]);

    //     if ($statement->rowCount() > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }



   

    // public function getThisUserById($id): User|bool
    // {
    //     $sql = "SELECT * FROM " . PREFIXE . "user WHERE Id = :Id";

    //     $statement = $this->DB->prepare($sql);
    //     $statement->bindParam(':Id', $id);
    //     $statement->execute();
    //     $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
    //     $retour = $statement->fetch();

    //     return $retour;
    // }

    // public function updateThisUser(User $user): bool
    // {
    //     $sql = "UPDATE " . PREFIXE .
    //         "user 

    //     SET
    //         lastName = :lastName,
    //         firstName = :firstName, 
    //         password = :password,
    //         address = :address,
    //         telephone = :telephone, 
    //         User_Role = :User_Role,
    //         mail = :mail
    //         WHERE Id_User = :Id_User;";

    //     $statement = $this->DB->prepare($sql);

    //     $retour = $statement->execute([
    //         ':Id_User' => $user->getIdUser(),
    //         ':lastName' => $user->getLastName(),
    //         ':firstName' => $user->getFirstName(),
    //         ':password' => $user->getPassword(),
    //         ':address' => $user->getAddress(),
    //         ':telephone' => $user->getTelephone(),
    //         ':User_Role' => $user->isUserRole(),
    //         ':mail' => $user->getMail()
    //     ]);

    //     return $retour;
    // }


    // public function deleteThisUser(int $ID): bool
    // {
    //     try {
    //         $sql = "DELETE FROM " . PREFIXE . "user WHERE Id_User = :Id_User;";

    //         $statement = $this->DB->prepare($sql);

    //         return $statement->execute([':ID' => $ID]);
    //     } catch (PDOException $error) {
    //         echo "Erreur de suppression : " . $error->getMessage();
    //         return FALSE;
    //     }
    // }
}
