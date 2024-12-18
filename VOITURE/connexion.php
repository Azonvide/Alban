<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=dbb;charset=utf8", 'root','');
if(isset($_POST['connexion'])){
    if(!empty($_POST['Numéro']) AND !empty($_POST[Mot_de_passe]));
    $Mot_de_passe = htmlspecialchars($_POST['Mot_de_passe']);
    $Mot_de_passe = sha1($_POST['Mot_de_passe']);

    $recupUser = $pdo -> prepare('SELECT ALL FROM vehicule WHERE Numéro = ? AND Mot_de_passe = ?');
    $recupUser -> execute(array(Numéro,Mot_de_passe));
    if($recupUser -> rowCount() > 0){
        $_SESSION['Numero'] = $Numero;
        $_SESSION['Mot_de_passe'] = $Mot_de_passe;
        $_SESSION['id'] = $recupUser->fetch(['id']);
        header("location: style.html");
        
    }else{
            echo "votre mot de passe est incorrect";
        }
    
}else{

    echo "veilllez completer tous les champs..";
}










?>
