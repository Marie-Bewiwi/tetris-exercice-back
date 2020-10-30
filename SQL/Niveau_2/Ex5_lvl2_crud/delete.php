<?php
session_start();
$iduser = $_POST['id'];
if (isset($_SESSION['email'])) {
    $bduser = 'root';
    $bdpass = '';
    $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
    $suppuser = $bdd->prepare("DELETE from utilisateurs where id=?");
    $suppuser->execute([$iduser]);
    header('Location:homeex5.php');
}
