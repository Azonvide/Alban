<?php
// On démarre une session
session_start();

// On inclut la connexion a la base

require_once('connect.php');
$sql = 'SELECT * FROM major';

//  On prepare la requete
$query = $db->prepare($sql);

// On execute la requete
$query->execute();

// On stocke le resultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('close.php');


// var_dump($result);

// var_dump($result) permet d'afficher les  resultats en ecrit
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main class="container">
            <div class="row">
                <section class="col-12">
                    <?php
                    if(!empty($_SESSION['erreur'])){
                        echo'<div class="alert alter-danger" role="alert">
                        '. $_SESSION['erreur'].'
                        </div>';
                    $_SESSION['erreur'] ="";
                    }
                    ?>
                    <?php
                    if(!empty($_SESSION['erreur'])){
                        echo'<div class="alert alter-succes" role="alert">
                        '. $_SESSION['message'].'
                        </div>';
                    $_SESSION['erreur'] ="";
                     }
                    ?>
                    <h1>Listes des Produits</h1>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Nombre</th> 
                            <th>Actif</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                            <?php
                            foreach($result as $produit){
                            ?>
                            <tr>
                                <td><?= $produit['id'] ?></td> 
                                <td><?= $produit['produit'] ?></td>
                                <td><?= $produit['prix'] ?></td> 
                                <td><?= $produit['nombre'] ?></td>
                                <td><?= $produit['actif'] ?></td>
                                <td><a href="disable.php?id=<?= $produit['id'] ?>">A/D</a>
                                <a href="details.php?id=<?= $produit
                                ['id'] ?>">Voir</a> <a href="edit.php?id=<?=
                                $produit['id'] ?>">Modifier</a> <a href="delete.php?id=<? 
                                $produit['id'] ?>">Supprimer</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                           
                        </tbody>

                    </table>
                            <a href="add.php" class="btn btn-primary">Ajouter un produit</a>
                </section>

            </div>



    </main>
</body>

<style>
.table{
   
    border-collapse: collapse;
    min-width: 500px;
    width: auto;
    box-shadow: 0 5px 50px rgba(0, 0, 0, 0.15);
    cusor:pointer;
    margin: 100px auto;
    border: 2px solid black;
}
thead tr{
    background-color:green;
    color:#fff;
    text-align: left;
}
th,td{
    padding: 15px 20px;
}
tbody tr,td,th{
    border: 1px solid #ddd;
}
tbody tr:nth-child(even){
    background-color: #f3f3f3;
}




</style>
</html>