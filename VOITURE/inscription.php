<?php
// connexion à la base de donnée
$pdo = new PDO("mysql:host=localhost;dbname=dbb;charset=utf8", 'root',
'');

// verifier si les données du formulaires sont envoyéss
if($_SERVER['REQUEST_METHOD'] === "POST") {
$NOM = $_POST['Nom'];
$PRENOM = $_POST['Prenom'];
$Date = $_POST['Date'];
$Numero = $_POST['Numero'];
$MOT_DE_PASSE = $_POST['Mot_de_passe'];

// Preparer la requete
$stnt = $pdo->prepare("INSERT INTO vehicule (Nom, Prenom, Date, Numero, Mot_de_passe) VALUES(?, ?, ?, ?, ?)");
$stnt -> execute([$NOM, $PRENOM, $Date ,$Numero, $MOT_DE_PASSE]);
header("location: style.html");
exit();

}

?>