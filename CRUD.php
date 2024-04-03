<?php
// interface pour crud pour la classe habitant

interface ICRUD{
    public function enregiste($nom,$prenom,$matricule,$age,$sexe,$status, $situation_matrimonial);
    public function afficher();
    public function modifier($id,$matricule,$nom,$prenom,$age,$sexe,$situation_matrimonial,$status);
    public function supprimer($id);
    
}
?>
