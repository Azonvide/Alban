<?php
// connexion à la base de donnée
$pdo = new PDO("mysql:host=localhost;dbname=db;charset=utf8", 'root',
'');

// verifier si les données du formulaires sont envoyéss

if($_SERVER['REQUEST_METHOD'] === 'POST') {
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prénom'];
$email = $_POST['email'];
$password = $_POST['Mot_de_passe'];

// Hachage du mot de passe
$Password = $_POST['Mot_de_passe'];
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);


// Preparer la requete

$stnt = $pdo -> prepare(" INSERT INTO habits (Nom, Prénom, email, Mot_de_passe) VALUES ( ?, ?, ?, ? )");

$stnt-> execute([$Nom, $Prenom, $email, $hashedPassword]);

header("location: index.html");
exit();

}

?>