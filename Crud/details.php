<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');


    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM major WHERE id = :id;';

    // On prepare la requete
    $query = $db->prepare($sql);

    // On "accroche" les parametre (id)
    $query->bindValue(':id',$id, PDO::PARAM_INT);

    // On execute la requete
    $query->execute();

    // On recupere le  produit
    $produit = $query->fetch();

    // On verifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header("Location: index.php");
    }
}else{
    $_SESSION['erreur'] ="Cet id n'existe pas";
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <main class="container">
<div class="row">
    <section class="col-12">
        <h1>Détails du produit <?=$produit['produit']?></h1>
        <p>ID: <?= $produit['id'] ?></p>
        <p>Produit: <?= $produit['produit'] ?></p>
        <p>Prix: <?= $produit['prix'] ?></p>
        <p>Nombre: <?= $produit['nombre'] ?></p>
        <p><a href="index.php">Retour</a> <a href="edit.php?id=<?=$produit['id']?>">Modifier</a></p>
    </section>

</div>

    </main>
</body>
</html>