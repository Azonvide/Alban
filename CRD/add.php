<?php
// connexion à la base de donnée
$pdo = new PDO("mysql:host=localhost;dbname=major;charset=utf8", 'root',
'');
// vérifier si les données du formulaire sont entrées

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
   
// preparer la requete

$stnt = $pdo->prepare("INSERT INTO maj (nom, prenom) VALUES (?, ?)");
$stnt->execute([$nom, $prenom]);

header("Location: affichage.php");

exit();

}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main class="container">
            <div class="row">
                <section class="col-12">
                
                   
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                        </div>
                        
                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                   
                </section>

            </div>

    </main>
</body>
</html>