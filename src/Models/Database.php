<?php

namespace src\Models;
// Définir une classe Database inhéritable.
use PDO;
use PDOException;

final class Database
{
    // Définir deux propriétés :
    //  - $DB, qui contiendra la connexion à la base de données
    //  - $config, qui contiendra le chemin vers le fichier de configuration.
    private $DB;
    private $config;

    // Dans le constructeur, définir $this->config, puis le requérir.

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        // Appeler également la méthode connexionDB()
        $this->connexionDB();
    }



    //Créer la méthode connexionDB()
    private function connexionDB(): void
    {
        // Elle aura pour but de mettre dans $this->DB l'objet PDO avec les infos définies dans le fichier config.php.
        // On utilisera try catch.
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->DB = new PDO($dsn, DB_USER, DB_PWD);
        } catch (PDOException $error) {
            echo "Quelque chose s'est mal passé : " . $error->getMessage();
        }
    }


    // faire un getter pour récupérer $this->DB depuis ailleurs.
    public function getDB()
    {
        return $this->DB;
    }


    // EXERCICE 3
    // Faire la méthode initializeDB()
    // Elle devra avant tout faire appel à la méthode testIfTableFilmsExists()
    // Dans le cas ou cette méthode renvoie true, on arrête là.
    public function initializeDB(): string
    {
        if ($this->testIfTableFilmsExists()) {
            return "La base de données semble déjà remplie.";
            die();

            // Sinon, on charge les fichiers sql du dossier migrations, puis on exécute la requête sql. Comme il peut y avoir plusieurs migrations, on fait ça dans une boucle.
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
    private function testIfTableFilmsExists(): bool
    {
        // La requête sql commencera avec SHOW TABLES ...
        $existant = $this->DB->query('SHOW TABLES FROM ' . DB_NAME . ' like \'' . PREFIXE . 'films\'')->fetch();
        // On regardera dans le tableau obtenu si on trouve films.

        if ($existant !== false && $existant[0] == PREFIXE . "films") {

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
