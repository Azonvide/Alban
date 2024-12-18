<?php
// On demarre une session
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

    $actif = ($produit['actif'] == 0) ? 1 : 0;

    $sql = 'UPDATE major SET actif =:actif WHERE id = :id;';

    // On prepare la requete
    $query = $db->prepare($sql);

    // On "accroche" les parametres 
    
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->bindValue(':actif', $actif, PDO::PARAM_INT);

    // On execute la requete
    $query->execute();

    header('Location: index.php');

}else{
    $_SESSION['erreur'] ="URL invalide";
    header('Location: index.php');
   
}



?>
