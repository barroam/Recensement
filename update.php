<?php
// Inclusion du fichier de connexion à la base de données
require_once "config.php";
require_once "Habitant.php";

// Vérification si les données du formulaire ont été envoyées
if(isset($_POST["modifier"])){
    // Récupération des données du formulaire
    $id = $_GET["id"]; // Récupérer l'ID à partir de la requête GET
    $nom = $_POST["nom"];
    $age = $_POST["age"];
    $sexe = $_POST["sexe"];
    $matricule = $_POST["matricule"];
    $status = $_POST["status"];
    $prenom = $_POST["prenom"];
    $situation_matrimonial = $_POST["situation_matrimonial"];
    // Appel de la méthode updateStudent pour mettre à jour les données
        $habitant = new Habitant($connexion,"","","","","","","");
        $habitant = $habitant->modifier($id,$matricule,$nom,$prenom,$age,$sexe,$situation_matrimonial,$status);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Redirection vers la page index.php après la mise à jour réussie
    header("Location: index.php");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recensement</title>
     <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    



<br>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col_md-7"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <div class="card shadow">
                <div class="card-header">
                    <h1>Modifier un habitant</h1>
                </div>
                <div class="card-body">
                <?php  
            // Requête pour sélectionner les données à partir de l'ID fourni dans la requête GET
            $sql_query = "SELECT * FROM Habitant WHERE id = :id";
            
            // Préparation de la requête
            $stmt = $connexion->prepare($sql_query);
            
            // Liaison des valeurs aux paramètres
            $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            
            // Exécution de la requête
            if ($stmt->execute()) {
                // Récupération des résultats de la requête
                $habitant = $stmt->fetch(PDO::FETCH_ASSOC);
                // Récupération des données 
                $Id = $habitant['id'];
                $nom = $habitant['nom'];
                $matricule = $habitant['matricule'];
                $prenom = $habitant['prenom'];
                $age = $habitant['age'];
                $sexe = $habitant['sexe'];
                $status = $habitant['status'];
                $situation_matrimonial = $habitant['situation_matrimonial'];
            } else {
                // Gestion de l'erreur en cas d'échec de l'exécution de la requête
                echo "Erreur lors de la récupération des données.";
            }
            ?>
                    <form  method="POST" action="update.php?id=<?php echo $Id; ?>" enctype="multipart/form-data">

                    <label for="">Matricule</label>
                        <input type="text" id="matricule" name="matricule" value="<?php echo $matricule ?>" placeholder="entrer votre nom" class="form-control">


                        <label for="">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $nom ?>" placeholder="entrer votre nom" class="form-control">

                        <label for="">Prenom</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom ?>" placeholder="entrer votre email" class="form-control">

                        <label for="">Age</label>
                        <input type="number" id="age" name="age" value="<?php echo $age ?>" placeholder="entrer l'age" class="form-control">

                        
                        <label for="">Sexe</label>
                        <input type="text" id="sexe" name="sexe" value="<?php echo $sexe ?>" placeholder="entrer le sexe" class="form-control">

                        <label for="">Situation Matrimonial</label>
                        <input type="text" name="situation_matrimonial" id="situation_matrimonial" value="<?php echo $situation_matrimonial ?>" placeholder="entrer votre email" class="form-control">

                        <label for="">Status</label>
                        <input type="text" name="status" id="status" value="<?php echo $status ?>" placeholder="entrer votre email" class="form-control">

                        <button type="modifier" id="modifier" name="modifier" value="modifier" class="btn btn-success form-control">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

















<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>