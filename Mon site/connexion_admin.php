

<?php

session_start();
// identification de l'administratreur

 $admin_username = "admin";
 $admin_password = "admin123";

// Verifier si le formilaire a ete soumis
if($_SERVER['REQUEST_METHOD'] == 'POST') {

// Recuperer les valeurs saisies dans le formulaire
 $username = trim($_POST['username']);
 $password = trim($_POST['password']);

 // trim permet d'effacer les espaces lorsque par exemple on veut inserer un coordonné

 
// vérifier si les identifiants correspondent

if($username === $admin_username && $password === $admin_password) {

    // Si les identifiants sont corrects, redirige nous vers la page d'aministration
$_SESSION['admin_logged_in'] = true;
$_SESSION['username'] = $username;
header('Location: admin_dashboard.php'); // Remplacez par la page d'acceuil de l'admin
exit;

} else{

    // Si les identifiants sont incorrects , afficher un message d'erreur
    $error_message = "Identifiant incorrects. Veuillez reessayer. ";

   
}

}
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

    <style>

        /* Formuliare d'inscription */
        
        .regristration form{
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            background-color: #10cbec;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 15px rgba(7, 245, 233, 0.1);
            margin: 0 auto;
            height: 300px;
            width: 700px;
            
            
        }
        .regristration form input{
            width: 50%;
            height: 70px;
            background-color: #c9c2b8;

        }
        .regristration button {
            color: white;
        }
        .regristration button{
            background-color: #131211;
            width: 15%;
            margin-right: -500px;
            margin-top: 40px;
            height: 20%;
            
            
        }
        .regristration h2 span{
            color: #3411ce
        }
        .regristration h2{
            color: black;
        }
        .regristration select{
            width: 50%;
            height: 20%;
            border-radius: 20px;
            background-color: #c9c2b8;
            
        }


    </style>
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


    <!--Section Formulaire d'inscription-->
    <section class="regristration">
        <center>
            <h2> <span>Sing</span>-Up</h2>
        </center><br><br><br>
       
        <form action="connexion_admin.php" method="POST" >
            <input type="text"  name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            
        

            <button type="submit">Send</button>
        </form>

    </section>
    
</body>

<footer class="section-p1">
    <div class="col">
       <img class="logo" src="img/logo.png" alt=""> 
       <h3>Contact</h3>
       <p> <strong>Address:</strong> 562 Wellington Road, Street 32, San Francisco</p>
       <p> <strong>Phone:</strong> +229 94207551 / +229 66772979</p>
       <p> <strong>Hours:</strong> 12:00 - 19:00, Mon - Sat</p>

       <div class="follow">
        <h3>Follow us</h3>
       </div>

       <div class="icon">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-pinterest-p"></i>
            <i class="fab fa-youtube"></i>
       </div>
      
    </div>

    <div class="col">
        <h3>About</h3>
        <a href="#">About us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>

    </div>

    <div class="col">
        <h3>My Account</h3>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My Whishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>

    </div>
    <div class="col install">
        <h3>Install App</h3>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="pay/app.jpg" alt="">
            <img src="pay/play.jpg" alt="">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="pay/pay.png" alt="">
    </div>
    <br>

    

</footer>
<center>
    <div class="copyright">
        <p>@ 2024, Tech2 etc - HTML CSS Ecommerce Template</p>

    </div>
</center>

