<?php 
//inclure le fichier contenant la class Habitant 
require_once "config.php" ;
$habitant = new Habitant($connexion, null, null, null, null, null, null, null, null);


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
                    <h1>Enregistrement d'un habitant</h1>
                </div>
                <div class="card-body">
                    <form  method="POST" action="ajout.php" enctype="multipart/form-data">

                    <label for="">Matricule</label>
                        <input type="text" id="matricule" name="matricule" placeholder="entrer votre Matricule" class="form-control">


                        <label for="">Nom</label>
                        <input type="text" id="nom" name="nom" placeholder="entrer votre Nom" class="form-control">

                        <label for="">Prenom</label>
                        <input type="text" id="prenom"  name="prenom" placeholder="entrer votre Prenom" class="form-control">

                        <label for="">Age</label>
                        <input type="number" id="age" name="age" placeholder="entrer votre Age" class="form-control">

                        
                        <label for="">Sexe</label>
                        <input type="text" id="sexe" name="sexe" placeholder="entrer votre Sexe" class="form-control">

                        <label for="">Situation Matrimonial</label>
                        <input type="text" id="situation_matrimonial" name="situation_matrimonial" placeholder="entrer votre Situation matrimonial " class="form-control">

                        <label for="">Status</label>
                        <input type="text" name="status" placeholder="entrer votre email" class="form-control">
                      
                        <!-- <input type="submit" id="submit_ajout" name="submit_ajout" value="Enregistrement" class="btn btn-success form-control"> -->
                        <button type="submit" id="submit" name="submit" class="btn btn-success form-control">ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section style="margin: 50px 0;">
    <!-- Conteneur principal -->
    <div class="container">
        <!-- Tableau pour afficher les données -->
        <table class="table table-light-green">
            <thead>
                <!-- En-têtes de colonne -->
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Situation matrimonial</th>
                    <th scope="col">status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Appelez la méthode afficher pour récupérer les données des habitants
                            $resultats = $habitant->afficher();
                
                foreach ($resultats as $row) { ?>
                <!-- Affichage des données dans les lignes du tableau -->
                <tr class="trow">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['sexe']; ?></td>
                    <td><?php echo $row['situation_matrimonial']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                  
                    
                    <!-- Bouton pour éditer les données avec un lien vers updatedata.php -->
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <!-- Bouton pour supprimer les données avec un lien vers deletedata.php -->
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>















<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>