<?php
session_start();
// Vérifier si l'administrateur est connecté
if( !isset($_SESSION['admin_logged_in'])) {
    header('Location: connexion_admin.php');
    exit;
}

// Connexion à la base de données ( ajustez les information selon votre configuratrion)
$pdo = new PDO("mysql:host=localhost;dbname=db;charset=utf8", 'root',
'');


// Recuperer tous les clients
$query ="SELECT * FROM habits";
$stm = $pdo -> query($query);
 $habits = $stm -> fetchAll(); 

//  fetchAll permet de recuperer toute les données


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/
all.min.css">
    <link rel="stylesheet" href="index.css">

    
    
</head>
<body>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo"></a>

            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li id="lg-bag"><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                    <a href="#" id="close"><i class="fa fa-times"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>

            </div>

    </section>

<body>

    <center>
    <div class="AA">
    <h1>Vous êtes enrégistrer ✅</h1>
    </div>
    </center>
    <br>
<center>
 <div class=tab>
    <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <!-- foreach permet de parcourir un tableau -->
                <?php foreach ($habits as $habit) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($habit['Nom']);?></td>
                        <td><?php echo htmlspecialchars($habit['Prénom']);?></td>
                        <td><?php echo htmlspecialchars($habit['email']);?></td>
                        <td><?php echo htmlspecialchars($habit['Mot_de_passe']);?></td>
                    

                        <td>
                         <!--Bouton suprimer -->
                         <form action="supprimer_clients.php" method="POST" style="display:inline;">
                         <input type="hidden" name="id" value="<?php echo $habit['id']; ?>"> 
                         <button type="submit" class= "btn btn-supprimer">Supprimer</button>

                         </form>  
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

 </div>
    
</center>
    



    
    
</body>

<br><br>

<style>
h1{
    color:green;
}
.tab thead{
background-color: blue;
box-shadow: 1px solid #333;

}
td ,th{
    color:white;
    padding:20px 20px;
}

tbody{
    background-color: green;
    padding: 1px solid white;
    
}


    </style>

</html>