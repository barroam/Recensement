<?php
// interface pour crud pour la classe habitant

interface ICRUD{
    public function enregiste();
    public function afficher();
    public function modifier($id,$matricule,$nom,$prenom,$age,$sexe,$situation_matrimonial,$status);
    public function supprimer($id);
    
}
?>
