<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
if (isset($_POST['envoiemail'])) {
    include 'sendemail.php';
    $mail = $_POST['emailrecup'];

    $countuser = $database->count('utilisateurs', [
        'email' => $mail,
    ]);
    //$sqlquery = $bdd->prepare("SELECT * FROM utilisateurs where email = ?");
    //$sqlquery->execute([$mail]);
    //$userexist = $sqlquery->rowcount();
    /*créer le token avec 2 hashage de 2 paramètres différents propre à l'utilisateur*/
    if ($countuser == 1) {
        $id = $database->get("utilisateurs", "id", [
            "email" => $mail,
        ]);
        //$idquery = $bdd->prepare("SELECT id FROM utilisateurs where email = ?");
        //$idquery->execute([$mail]);
        //$rowid = $idquery->fetch(PDO::FETCH_ASSOC);
        //$id = $rowid['id'];
        $monmail = 'marie.a.s45@gmail.com';
        $objetmail = 'Réinitialisation de votre mot de passe';
        $token = md5($mail) . md5(date("Y-m-d H:i:s"));
        $body = "<p>Vous avez oublié votre mot de passe et avez demandé une réinitialition, pour se faire, cliquez sur le lien suivant : http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex4_lvl2_resetpassword/newpassword.php?id=" . urlencode($id) . '&token=' . urlencode($token) . '';
        send_mail($monmail, $objetmail, $body);
        echo "<script> alert('Votre mail a bien été envoyé!') </script>";
    } else {
        echo '<script> alert ("Mail erronné")';
    }

} else {

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié ?</title>
</head>
<body>
    <form action="" method="post">
    <label for="emailrecup">Votre email d'inscription:</label>
    <input type="email" id='emailrecup' name='emailrecup' placeholder='toto@jojo.fr'>
    <input type="submit" id='envoiemail' name='envoiemail' value="Envoyer">







    </form>
</body>
</html>
