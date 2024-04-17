<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Grade;
use PDO;
use PDOException;

class GradeRepository
{

    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    // récupère toutes les promos
    public function getAllGrades(): array|bool
    {
        $sql = "SELECT * FROM " . PREFIXE . "grade";

        $statement = $this->DB->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        $retour = $statement->fetch();
        return $retour;
    }


    // ajoute un promo en BD
    public function createGrade(Grade $dataGrade)
    {
        $sql = "INSERT INTO " . PREFIXE . "grade (Name_Grade, Student_Number_Grade, DateStart_Grade, DateEnd_Grade) VALUES (:Name_Grade, :Student_Number_Grade, :DateStart_Grade, :DateEnd_Grade)";

        $statement = $this->DB->prepare($sql);

        $statement->execute([
            ':Name_Grade' => $dataGrade->getNameGrade(),
            ':Student_Number_Grade' => $dataGrade->getStudentNumberGrade(),
            ':DateStart_Grade' => $dataGrade->getDateStartGrade(),
            ':DateEnd_Grade' => $dataGrade->getDateEndGrade()
        ]);
        return $statement;
    }
}
