<?php
session_start();
$bduser = 'root';
$bdpass = '';
$bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);

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

    if (true) {
        if (!empty($_POST['email']) and !empty($_POST['password'])) {

            $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            $requser->execute([$mail]);
            $userexist = $requser->rowcount();

            if ($userexist == 1) {

                $reqmdp = $bdd->prepare('SELECT mdp FROM utilisateurs WHERE email = ?');
                $reqmdp->execute([$mail]);
                $rowmdp = $reqmdp->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $rowmdp['mdp'])) {

                    $_SESSION['email'] = $mail;
                    $essai = 1;
                    /*header('Location:home.php');*/

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
        $tentative = $bdd->prepare("INSERT INTO connexions (login,password,tentative) VALUES (?,?,?)");
        $tentative->execute(array($mail, $password, $essai));
    }
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

<input type="submit" value="SignIn" name='Signin'>
</form>
<?php
if (isset($erreur)) {
    echo $erreur;
}
?>
</body>
</html>
