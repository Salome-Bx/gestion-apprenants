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


    public function getAllGrades() {
        
        
        $gradeRepo = new GradeRepository();
        $allGradesBD = $gradeRepo->getAllGrades();
        

        if ($allGradesBD) {
            http_response_code(200);
            $_SESSION['grades'] = $allGradesBD;
            
            //    ob_clean();
            echo json_encode(["status" => "succes", "message" => "Connexion réussie", "all_grades" => $_SESSION['grades']]);
        } else {
            http_response_code(401);
            echo json_encode(["status" => "erreur", "message" => "Aucune promotion récupérée"]);
        }
    }

    public function createGrade()
    {
        $dataGrade = file_get_contents("php://input");
        $grade = json_decode($dataGrade, true);
        $dataGrade = new Grade($grade);
        
        $gradeRepo = new GradeRepository();
        $gradesBD = $gradeRepo->createGrade($dataGrade);

        if ($gradesBD) {
            http_response_code(200);
            $_SESSION['grades'] = $gradesBD;
            $this->render("dashboard/addPromotions", ["infos_grades" => $_SESSION['grades']]);
            //    ob_clean();
            echo json_encode(["status" => "succes", "message" => "Promotion créée"]);
        } else {
            http_response_code(401);
            echo json_encode(["status" => "erreur", "message" => "Impossible de créer la promotion"]);
        }
    }
}
