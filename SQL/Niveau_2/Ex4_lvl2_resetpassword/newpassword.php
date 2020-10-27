<?php
if (isset($_POST['btnmdp'])) {
    $mdp = $_POST['newpassword'];
    $mdpconfirm = $_POST['passwordconfirm'];
    if ($mdp === $mdpconfirm) {
        $mdp = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $id = $_GET['id'];
        $token = $_GET['token'];
        $bduser = 'root';
        $bdpass = '';
        $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
        $update = $bdd->prepare("UPDATE utilisateurs SET mdp=? where id = ? AND token = ?");
        $update->execute(array($mdp, $id, $token));
        echo '<script> alert ("Votre mot de passe a bien été réinitialisé.")</script>';
    } else {
        echo '<script> alert ("vos mdp ne correspondent pas !") </script>';
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password recovery</title>
</head>
<body>
<form method="post" action="">

    <p>
        <label for="newpassword">Rentrez ici votre nouveau mot de passe : </label>
        <input type="password" name="newpassword" id="newpassword">
    </p>
    <p>
        <label for="passwordconfirm">Retapez votre nouveau mot de passe : </label>
        <input type="password" name="passwordconfirm" id="passwordconfirm">

        <input type="submit" value="Envoyer" name="btnmdp" id="btnmdp">
    </p>
</form>
</body>
</html>
