<?php

namespace src\Models;
use PDO;
use PDOException;

final class Database
{
   
    private $DB;
    private $config;

    

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        
        $this->connexionDB();
    }



    
    private function connexionDB(): void
    {
        
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->DB = new PDO($dsn, DB_USER, DB_PWD);
        } catch (PDOException $error) {
            echo "Quelque chose s'est mal passé : " . $error->getMessage();
        }
    }


    
    public function getDB()
    {
        return $this->DB;
    }


    
    public function initializeDB(): string
    {
        if ($this->testIfTableUserExists()) {
            return "La base de données semble déjà remplie.";
            die();

            
        } else {
            try {
                $i = 0;
                $migrationExistante = TRUE;
                while ($migrationExistante === TRUE) {
                    $migration = __DIR__ . "/../Migrations/migration$i.sql";
                    if (file_exists($migration)) {
                        $sql = file_get_contents($migration);
                        $this->DB->query($sql);
                        $i++;
                    } else {
                        $migrationExistante = FALSE;
                    }
                }
                $this->DB->query($sql);
                $this->UpdateConfig();
            } catch (PDOException $e) {
                echo "Une erreur est survenue lors de l'installation de la Base de données" . $e->getMessage();
            }
        }
    }



    //Vérifie si la table Films existe déjà dans la BDD
    // Écrire la méthode privée testIfTableFilmsExists()
    // Elle devra renvoyer un booléen.
    private function testIfTableUserExists(): bool
    {
        // La requête sql commencera avec SHOW TABLES ...
        $existant = $this->DB->query('SHOW TABLES FROM ' . DB_NAME . ' like \'' . PREFIXE . 'gestion_apprenants\'')->fetch();
        // On regardera dans le tableau obtenu si on trouve films.

        if ($existant !== false && $existant[0] == PREFIXE . "gestion_apprenants") {

            // Pour comprendre comment traiter le résultat, faire un var_dump du retour de votre requête sql.
            return true;
        } else {

            return false;
        }
    }





    // Construire la méthode privée UpdateConfig()
    // Elle devra réécrire le fichier config, en gardant les bonnes variables pour la base de données, mais modifier la valeur de DB_INITIALIZED à TRUE.
    // Elle renverra true si l'écriture s'est bien passée, false sinon.
    private function UpdateConfig(): bool
    {

        $fconfig = fopen($this->config, 'w');

        $contenu = "<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', '" . DB_HOST . "');
    define('DB_NAME', '" . DB_NAME . "');
    define('DB_USER', '" . DB_USER . "');
    define('DB_PWD', '" . DB_PWD . "');
    define('PREFIXE', '" . PREFIXE . "');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);";


        if (fwrite($fconfig, $contenu)) {
            fclose($fconfig);
            return true;
        } else {
            fclose($fconfig);
            return false;
        }
    }
}
