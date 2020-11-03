<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
session_start();

/*Bonus*/

/*Fin du bonus*/
if (isset($_POST['Signin'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = ($_POST['password']); /*Normalement, on l'envoie hashé !*/
    /*$requeteban = $bdd->prepare("SELECT tentative FROM connexions WHERE login = ? ORDER BY heure DESC");
    $requeteban->execute([$mail]);
    $result = $requeteban->fetchAll();
    $comptage = 0;
    foreach ($result as $row) {
    if ($comptage >= 5) {

    }
    if ($row['tentative'] == 0) {
    $comptage++;
    } else {
    break;
    }
    }*/

    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $countuser = $database->count('utilisateurs', [
            'email' => $mail,
        ]);

        if ($countuser == 1) {

            $reqmdp = $database->get('utilisateurs', 'mdp', ['email' => $mail]);
            if (password_verify($password, $reqmdp)) {

                $_SESSION['email'] = $mail;
                $essai = 1;
                header('Location:home.php');

            } else {
                $erreur = 'mdp incorrect';
                $essai = 0;

            }
        } else {
            $erreur = "Adresse incorrecte ! ";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés";
    }
    /*Insertion du log en bdd table connexion*/
    $database->insert('connexions', [
        'login' => $mail,
        'password' => $password,
        'tentative' => $essai,
    ]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
</head>
<body>
<form method="POST" action=''>
<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
</div>

<div>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
</div>
<div>
<a href=resetpassword.php> Mot de passe oublié ? </a>
</div>

<input type="submit" value="SignIn" name='Signin'>
</form>
<?php
if (isset($erreur)) {
    echo $erreur;
}
?>
</body>
</html>
