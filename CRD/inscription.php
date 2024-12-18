
<?php
// connexion à la base de donnée
$pdo = new PDO("mysql:host=localhost;dbname=major;charset=utf8", 'root',
'');

// verifier si les données du formulaires sont envoyéss

if($_SERVER['REQUEST_METHOD'] === 'POST') {
$Nom = $_POST['nom'];
$Prenom = $_POST['prenom'];


$stnt = $pdo -> prepare(" INSERT INTO maj (nom, prenom) VALUES (?, ? )");

$stnt-> execute([$Nom, $Prenom]);

header("location: affichage.php");
exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <center>
    <h1>Inscription</h1>
    <fieldset class="hold">
     <form action="inscription.php" method="POST" >
        <input type="text" placeholder="Nom" name="nom"> <br><br>
        <input type="text" placeholder="Prenoms" name="prenom"> <br><br>
        <br><br>
        
        <button type="submit" >s'inscrire</button>
     </form>
    </fieldset>
    </center>
   
</body>
<style>
    h1{
        color:green;
        font-size: 50px;
    }
    fieldset{
        width: 50%;
        height: 300px;
    }
    .hold input{
        padding: 20px;
        width: 600px;
        border-raduis:10px;

    }
    .hold button{
        width: 600px;
        border-raduis:10px;
        height: 50px;
        background-color: blue;
    }
    .hold a{
        color: white;
        text-decoration: none;
    }



</style>
</html>