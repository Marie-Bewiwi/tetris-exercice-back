<?php
session_start();
$iduser = $_POST['id'];
var_dump($_POST);
if (isset($_SESSION['email'])) {
    $bduser = 'root';
    $bdpass = '';
    $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
    if (!empty($_POST['mdp'])) {
        $mdphash = password_hash(($_POST['mdp']), PASSWORD_BCRYPT);
        $update = $bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, mdp=?, id_choix=? WHERE id=?");
        $update->execute(array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $mdphash,
            $_POST['id_choix'],
            $iduser,
        ));
        var_dump($update);
        // header('Location:homeex5.php');
    } else {
        $updatenomdp = $bdd->prepare("UPDATE utilisateurs SET nom=?, prenom=?, email=?, id_choix=? WHERE id=$iduser");
        $updatenomdp->execute([
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['id_choix'],
        ]);
        var_dump($updatenomdp);
        //header('Location:homeex5.php');
    }

}
