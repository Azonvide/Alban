<?php

try{
    // connexion a la base de donnee
    $db =  new PDO('mysql:host=localhost;dbname=major', 'root', '');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e ->getMessage();
    die();
}

?>