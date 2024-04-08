<?php


spl_autoload_register("chargerClasses");


function chargerClasses($classe)
{
    // Cette fonction cherchera s'il existe un fichier de ce nom.
    $classe = str_replace('src', '', $classe);
    $classe = str_replace('\\', '/', $classe);
    // Pensez à ajouter ".php" à la fin.
    $fichier = $classe . '.php';

 
    try {
        if (file_exists(__DIR__ . $fichier)) {
            require_once __DIR__ . $fichier;
        }
    } catch (Error $error) {
        echo "Une erreur est survenue : " . $error->getMessage();
    }
}







// EXERCICE 4
// On garde toujours la méthode spl_autoload_register.
// On va juste changer la manière dont chargerClasse() trouve les fichiers classes à requérir.

// Lorsqu'un use appelle spl_autoload_register, il lui donne tout le chemin renseigné, par exemple src\Models\Database.

// Il va falloir modifier ce chemin, pour le faire correspondre à notre arborescence :
// - Nous somme déjà dans src. Enlevez src.
// - Ensuite il faut changer de sens les \ (mettre / à la place)
// - Enfin il faut ajouter ".php" à la fin

// C'est tout, plus besoin de faire des else if pour tous nos dossiers !