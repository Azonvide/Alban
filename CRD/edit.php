
<?php
session_start();


// connexion à la base de donnée
$pdo = new PDO("mysql:host=localhost;dbname=major;charset=utf8", 'root',
'');



if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom'])){

        // <!-- on inclut la connexion à la base de donnée -->

        // on nettoie l'id  envoyé
       $id = strip_tags($_POST['id']);
       $nom = strip_tags($_POST['nom']);
       $prenom = strip_tags($_POST['prenom']);

       $sql ='UPDATE maj SET nom = :nom, prenom = :prenom WHERE id = :id;';

       $query = $pdo->prepare($sql);

       $query->bindValue(':id', $id, PDO::PARAM_INT);
       $query->bindValue(':nom', $nom, PDO::PARAM_STR);
       $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
       $query->execute();

       $_SESSION['message'] = "Inscrit modifié";
       header('location: affichage.php');

       require_once('close.php');
 
        
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

//  est-ce que l'id existe et n'est pas vide dans l'url

if(isset($_GET['id']) && !empty($_GET['id'])){

    // on nettoie l'id  envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM maj WHERE id = :id';

    // on prepare la requete

    $query = $pdo->prepare($sql);

    // on accroche les parametre (id)

    $query->bindvalue(':id', $id, PDO::PARAM_INT);

    // on execute la requete

    $query->execute();

    // on recupere le produit

    $produit = $query->fetch();

    // on verifie si le produit existe

    if(!$produit){
         
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('location: affichage.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les infos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">

            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert-danger" role="alerte">
                                '.$_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                    
                ?>
                <div class="titre">
                    <h1>Modifier les informations</h1>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="produit">Nom</label>
                        <input type="text"  name="nom" class="form-control"
                         value="<?= $produit['nom']?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prenom</label>
                        <input type="text" name="prenom" class="form-control"  value="<?= $produit['prenom']?>">
                    </div>
                  
                   <div class="group">
                     <input type="hidden"  value="<?= $produit['id']?>" name="id">
                      <button class="btn_btn-primary">Envoyer</button>
                   </div>
                </form>
                
            </section>
        </div>
    </main>


    <style>

.titre{
    align-items: center;
    text-align: center;
    font-size: 30px;
    padding: 15px;
}

.form-group{
    display: grid;
    flex-direction: column;
    width: 50%;
    margin: auto;
    padding: 5px;
}

.form-group label{
    font-size: 20px;
    padding: 3px;
}

.form-group input{
    padding: 7px;
    border-radius: 5px;
    border: 2px solid midnightblue;
    text-align: center;
    align-items: center;
}

form .group input{
    padding: 7px;
    border-radius: 10px;
    border: 2px solid midnightblue;
    text-align: center;
    align-items: center;
}

form .group button{
    padding: 10px;
    width: 100px;
    background-color: blue;
    color: #fff;
    text-align: center;
    margin: 30px;
    align-items: center;
    cursor: pointer;
    border-radius: 10px;
    float: right;
}

form .group :hover{
    color: aquamarine;
    background-color: black;
}


    </style>
</body>
</html>

                    