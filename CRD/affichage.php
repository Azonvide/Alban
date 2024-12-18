<?php
// On démarre une session
session_start();

// On inclut la connexion a la base

require_once('connect.php');
$sql = 'SELECT * FROM maj';

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
                
                    
                    <h1>LISTES DES INSCRITS</h1>
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Actions</th>
                        </thead>
                            

                        <tbody>
                            <?php
                            foreach($result as $maj){
                            ?>
                            <tr>
                                <td><?= $maj['id'] ?></td> 
                                <td><?= $maj['nom'] ?></td>
                                <td><?= $maj['prenom'] ?></td>

                                <td>
                                
                                <a href="delete.php?id=<?= $maj['id'] ?>">Supprimer</a>
                                <a href="edit.php?id=<?= $maj['id'] ?>">Modifier</a>
                               </td>
                            </tr>
                            <?php
                            }
                            ?>
                           
                        </tbody>

                    </table>
                            <a href="add.php" class="btn btn-primary">Ajouter une inscription</a>
                </section>

            </div>



    </main>
</body>

<style>
.table{
   
    border-cllapse: collapse;
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

a{
    text-decoration: none;
    font-size: 17px;
    
}



</style>
</html>