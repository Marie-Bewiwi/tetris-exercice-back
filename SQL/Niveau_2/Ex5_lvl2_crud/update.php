<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
session_start();
$iduser = $_POST['id'];
var_dump($_POST);
if (isset($_SESSION['email'])) {
    if (!empty($_POST['mdp'])) {
        $mdphash = password_hash(($_POST['mdp']), PASSWORD_BCRYPT);

        $updateavmdp = $database->update('utilisateurs', [
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "mdp" => $mdphash,
            "id_choix" => $_POST["id_choix"],
        ], [
            "id" => $iduser,
        ]);
        //$update = $bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, mdp=?, id_choix=? WHERE id=?");
        /*$update->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $mdphash,
        $_POST['id_choix'],
        $iduser,
        ));*/
        header('Location:homeex5.php');
    } else {

        $updatenomdp = $database->update('utilisateurs', [
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "email" => $_POST['email'],
            "id_choix" => $_POST["id_choix"],
        ], [
            "id" => $iduser,
        ]);
        /*$bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, id_choix=? WHERE id=$iduser");
        $updatenomdp->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['id_choix'],
        ]);*/
        header('Location:homeex5.php');
    }

}
