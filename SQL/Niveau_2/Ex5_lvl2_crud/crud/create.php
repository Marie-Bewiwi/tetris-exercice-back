<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
session_start();

if (isset($_SESSION['email'])) {
    if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['email']) && empty($_POST['mdp']) && empty($_POST["id_choix"])) {
        header("Location:http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex5_lvl2_crud/homeex5.php");
    } else {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['email']);
        $mdphash = password_hash(($_POST['mdp']), PASSWORD_BCRYPT);
        $idchoix = $_POST['id_choix'];

        $insertion = $database->insert("utilisateurs", [
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $mail,
            "mdp" => $mdphash,
            "id_choix" => $idchoix,
        ]);
        header('location:http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex5_lvl2_crud/homeex5.php');
    }
}
