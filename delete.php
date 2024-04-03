<?php

require_once "config.php";
require_once "Habitant.php";
// Vérification si l'ID à supprimer est passé dans la requête GET
if(isset($_GET['id'])) {
    // Récupération de l'ID à supprimer
    $id = $_GET['id'];
    $habitant = new Habitant($connexion,"","","","","","","");
    
    // Appel de la méthode deleteStudent pour supprimer 
   $habitant -> supprimer($id);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Redirection vers la page index.php après la suppression réussie
    header("Location: index.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
} else {
    // Gérer le cas où l'ID n'est pas disponible dans la requête GET
    echo "ID de l'habitant non spécifié.";
}
