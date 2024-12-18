<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

$pdo = new PDO('mysql:host=localhost;dbname=db', "root", "");
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $stmt = $pdo ->prepare("DELETE FROM habits WHERE id = ?");
 $stmt ->execute([$id]);

 header('Location:admin_dashboard.php');
 exit;





}



?>