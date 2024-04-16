<?php

namespace src\Controllers;

use src\Models\Grade;
use src\Repositories\GradeRepository;
use src\Services\Reponse;


class GradeController
{

    private $GradeRepo;
    private $Grade;



    use Reponse;

    public function __construct()
    {
        $this->GradeRepo = new GradeRepository();
    }


    // public function getAllGrades() {
    //     $data = file_get_contents("php://input");
    //     $grades = json_decode($data, true);

    //     $gradeRepo = new GradeRepository();
    //     $gradesBD = $gradeRepo->getAllGrades();

    //     if ($gradesBD) {
    //         http_response_code(200);
    //         $_SESSION['grades'] = serialize($gradesBD);
    //         $this->render("dashboardStaff", ["infos_grades" => $gradesBD]);
    //         //    ob_clean();
    //         echo json_encode(["status" => "succes", "message" => "Connexion réussie"]);
    //     } else {
    //         http_response_code(401);
    //         echo json_encode(["status" => "erreur", "message" => "Aucune promotion récupérée"]);
    //     }
    // }

    public function createGrade()
    {
        $dataGrade = file_get_contents("php://input");
        $grade = json_decode($dataGrade, true);
        $dataGrade = new Grade($grade);
        var_dump($dataGrade);
        $gradeRepo = new GradeRepository();
        $gradesBD = $gradeRepo->createGrade($dataGrade);

        if ($gradesBD) {
            http_response_code(200);
            $_SESSION['grades'] = $gradesBD;
            $this->render("dashboard", ["infos_grades" => $_SESSION['grades']]);
            //    ob_clean();
            echo json_encode(["status" => "succes", "message" => "Promotion créée"]);
        } else {
            http_response_code(401);
            echo json_encode(["status" => "erreur", "message" => "Impossible de créer la promotion"]);
        }
    }
}
