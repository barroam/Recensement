<?php
//inclusion du fichier du connexion
require_once "config.php";
require_once "Habitant.php";
//verifier si le formulaire a été soumis

if(isset($_POST['submit'])){
 var_dump(   $nom = $_POST['nom'],
 $prenom = $_POST['$nom,$prenom,$numero,$xalatprenom'],
 $matricule = $_POST['matricule'],
 $age = $_POST['age'],
 $sexe = $_POST['sexe'],
 $status = $_POST['status'],
 $situation_matrimonial = $_POST['situation_matrimonial']);


     if($nom != "" && $prenom != "" &&  $matricule != "" && 
     $age != "" && $sexe != "" && $status != "" && $situation_matrimonial != "" ){
        // appel de la méthodde
        $habitant=new Habitant($connexion,"","","","","","","","","");
        $habitant->enregiste($nom,$prenom,$matricule,$age,$sexe,$status, $situation_matrimonial);
     }

}





?>
