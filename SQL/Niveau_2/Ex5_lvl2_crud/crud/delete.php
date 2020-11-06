<?php
session_start();
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
$iduser = $_POST['id'];
if (isset($_SESSION['email'])) {
    $database->delete("utilisateurs", [
        "id" => $iduser,
    ]);
    /* $suppuser = $bdd->prepare("DELETE from utilisateurs where id=?");
    $suppuser->execute([$iduser]); */
    header("location:http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex5_lvl2_crud/homeex5.php");
}
