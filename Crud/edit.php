<?php
// On demarre une session
session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['produit']) && !empty($_POST['produit'])
    && isset($_POST['prix']) && !empty($_POST['prix'])
    && isset($_POST['nombre']) && !empty($_POST['nombre'])){
 
             // On inclut la connexion a la base
         require_once('connect.php');
 
         // On nettoie les données envoyées
     $id = strip_tags($_POST['id']);
     $produit = strip_tags($_POST['produit']);
     $prix = strip_tags($_POST['prix']);
     $nombre = strip_tags($_POST['nombre']);
 
     $sql = 'UPDATE major SET produit =:produit, prix =:prix, 
     nombre =:nombre WHERE id =:id;';
 
     $query = $db->prepare($sql);
 
     $query->bindValue(':id', $id, PDO::PARAM_INT);
     $query->bindValue(':produit', $produit, PDO::PARAM_STR);
     $query->bindValue(':prix', $prix, PDO::PARAM_STR);
     $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);
 
     $query->execute();
 
     $_SESSION['message'] ="Produit ajouté";
     require_once('close.php');
 
 
     header('Location: index.php');
    }else{
     $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
    
 }

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



// On inclut la connexion a la base

require_once('connect.php');

require_once('close.php');

// var_dump($result);

// var_dump($result) permet d'afficher les  resultats en ecrit
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
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
                    <h1>Modifier un produit</h1>
                    <form method="post">
                        <div class="form-group">
                         <label for="produit">Produit</label>
                            <input type="text" id="produit" name="produit" 
                            class="form-control" value="<?= $produit['produit']?>">
                        </div>
                        <div class="form-group">
                        <label for="prix">Prix</label>
                                <input type="text" id="prix" name="prix"
                                class="form-control" value="<?= $produit['prix']?>">
                        </div>
                        <div class="form-group">
                        <label for="nombre">Nombre</label>
                                <input type="nomber" id="nombre" name="nombre" 
                                class="form-control" value="<?= $produit['nombre']?>">
                        </div>
                        <input type="hidden" value="<?= $produit['id']?>"
                        name="id">
                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                   
                </section>

            </div>



    </main>
</body>
</html>