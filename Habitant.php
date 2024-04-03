<?php

require_once "CRUD.php";

 class Habitant implements ICRUD{

   private $nom;
   private $prenom;
   private $matricule;
   private $age ;
   private $sexe ;
   private $situation_matrimonial ;
   private $status ;
   private $connexion;

   //Constructeur de la classe habitant

   public function __construct($connexion,$nom,$prenom,$matricule,$age,$sexe,$status, $situation_matrimonial){
  $this->connexion=$connexion;

  $this->nom =$nom; 
  $this->prenom= $prenom;
  $this->matricule= $matricule;
  $this->age= $age;
  $this->sexe=$sexe;
  $this->situation_matrimonial=$situation_matrimonial;
  $this->status=$status;
    }

   // les methodes getters et setters Nom
   public function getNom() {
     return $this->nom; }
     public function setNom($nom){
        $this->nom = $nom; }

  // les methodes getters et setters Prenom
  public function getPrenom(){
    return $this->prenom;
  }
  public function setPrenom($prenom) {
    $this->prenom = $prenom ;
  }

  // les methodes getters et setters matricule
  public function getMatricule(){
    return $this->matricule;
  }
  public function setMatricule($matricule) {
    $this->matricule=$matricule ;
  }

   // les methodes getters et setters age
   public function  getAge() {
       return $this->age;
   }
   public function setAge($age) {
    $this->age= $age;
   }
   
   
   // les methodes getters et setters sexe
    public function getSexe(){
        return $this->sexe ;
    }
    public function setSexe($sexe){
      $this->sexe = $sexe;
    }
    
   // les methodes getters et setters situation matrimonial 
   public  function getSM(){
       return $this->situation_matrimonial;
   }
   public function setSM($situation_matrimonial){
    $this->situation_matrimonial = $situation_matrimonial;
   }
 
    // les methodes getters et setters status 
    public function getStatus (){
     return $this->status;
    }
    public function setStatus ($status ) {
        $this->status=$status;
    }


    public function enregiste($nom, $prenom, $matricule, $age, $sexe, $status, $situation_matrimoniale)
    {
        try {
            $sql = "INSERT INTO Habitant (matricule, nom, prenom, age, sexe, situation_matrimonial, status) VALUES (:matricule, :nom, :prenom, :age, :sexe, :situation_matrimonial, :status)";
            $stmt = $this->connexion->prepare($sql);
    
            $stmt->bindParam(':matricule', $matricule, PDO::PARAM_STR);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':age', $age, PDO::PARAM_INT);
            $stmt->bindParam(':sexe', $sexe, PDO::PARAM_STR);
            $stmt->bindParam(':situation_matrimonial', $situation_matrimoniale, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    
            //execute la requette
            $stmt->execute();
    
            //rediriger la page
            header("Location:index.php");
            exit();
    
        } catch (PDOException $e) {
            die("erreur: impossible d'inserer des données ". $e->getMessage());
        }
    }

    //afficher les données de la bases de données 
    public function afficher(){

        try {
             //requete sql pour sélectonner tout les habitants
        $sql="SELECT * FROM Habitant";

        //preparation de la requete 
        $stmt=$this->connexion->prepare( $sql );

        //exécution de la requete//}else{
   // echo"erreur";
        $stmt->execute() ;

        //récuparation des resultats 
        $resultats= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;

        } catch (PDOException $e) {
         die ("erreur: Impossible d'afficher les enregistrement des habitants".$e->getMessage()) ;
        }

    }

    public function modifier($id,$matricule,$nom,$prenom,$age,$sexe,$situation_matrimonial,$status){
      try {
        // Requête SQL de mise à jour avec des paramètres
        $sql = "UPDATE Habitant SET matricule = :matricule, nom = :nom, prenom = :prenom, age = :age, sexe = :sexe, situation_matrimonial = :situation_matrimonial, status = :status WHERE id = :id";
        
        // Préparation de la requête
        $stmt = $this->connexion->prepare($sql);
        
        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':sexe', $sexe, PDO::PARAM_STR);
        $stmt->bindParam(':situation_matrimonial', $situation_matrimonial, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':matricule', $matricule, PDO::PARAM_STR);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourne true si la mise à jour a réussi
        return true;
         // Redirection vers la page index.php après une insertion réussie
         header("Location: index.php");
         exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    } catch(PDOException $e) {
        // Gestion de l'erreur en la lançant à l'extérieur de la méthode
        throw new Exception("ERREUR: Impossible de mettre à jour les données. " . $e->getMessage());
    }
    }
    public function supprimer($id){
      try {
        // Requête SQL de suppression avec des paramètres
        $sql = "DELETE FROM Habitant WHERE id = :id";
        
        // Préparation de la requête
        $stmt = $this->connexion->prepare($sql);
        
        // Liaison de la valeur de l'ID au paramètre
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourne true si la suppression a réussi
        return true;
    } catch(PDOException $e) {
        // Gestion de l'erreur en la lançant à l'extérieur de la méthode
        throw new Exception("ERREUR: Impossible de supprimer. " . $e->getMessage());
    }
    } 
 }
?>