<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');


    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM maj WHERE id = :id;';

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
        header("Location: affichage.php");
    }
}else{
    $_SESSION['erreur'] ="Cet id n'existe pas";
    header('Location: affichage.php');
    die();
}


    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'DELETE  FROM maj WHERE id = :id;';

    // On prepare la requete
    $query = $db->prepare($sql);

    // On "accroche" les parametre (id)
    $query->bindValue(':id',$id, PDO::PARAM_INT);

    // On execute la requete
    $query->execute();
    $_SESSION['message'] = "inscrit supprimé";
    header('Location: affichage.php');
?>
