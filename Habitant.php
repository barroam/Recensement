<?php
require_once "CRUD.php";

 class Habitant implements ICRUD{
   private $id ;
   private $nom;
   private $prenom;
   private $matricule;
   private $age ;
   private $sexe ;
   private $situation_matrimonial ;
   private $status ;
   private $connexion;

   //Constructeur de la classe habitant
   public function __construct($connexion,$id,$nom,$prenom,$matricule,$age,$sexe,$status, $situation_matrimonial,){
  $this->connexion=$connexion;
  $this->id=$id;
  $this->nom =$nom; 
  $this->prenom= $prenom;
  $this->matricule= $matricule;
  $this->age= $age;
  $this->sexe=$sexe;
  $this->situation_matrimonial=$situation_matrimonial;
  $this->status=$status;
    }

    // les methodes getters et setters id
      public function getId(){
        return $this->id;
      }
      public function setId($id){
        $this->id=$id;
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


 
    public function enregiste(){

    }
    //afficher les données de la bases de données 
    public function afficher(){

        try {
             //requete sql pour sélectonner tout les habitants
        $sql="SELECT * FROM Habitant";

        //preparation de la requete 
        $stmt=$this->connexion->prepare( $sql );

        //exécution de la requete
        $stmt->execute() ;

        //récuparation des resultats 
        $resultats= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;

        } catch (PDOException $e) {
         die ("erreur: Impossible d'afficher les enregistrement des habitants".$e->getMessage()) ;
        }

    }

    public function modifier(){

    }
    public function supprimer(){

    } 
 }
?>