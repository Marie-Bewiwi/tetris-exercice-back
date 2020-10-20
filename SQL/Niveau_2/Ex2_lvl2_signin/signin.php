<?php
/*Mes variables*/

$erreur = 'Une erreur de saisie a été détectée';

/*Mes tests*/

if (isset($_POST['Signin'])) {
    /*Vérification champs remplis*/
    if (isset($_POST['consent'])) {
        if (!empty($_POST['name']) and !empty($_POST['surname']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['password2']) and isset($_POST['choix'])) {
            $mdp = $_POST['password'];
            $maj = preg_match('@[A-Z]@', $mdp);
            $min = preg_match('@[a-z]@', $mdp);
            $nomb = preg_match('@[0-9]@', $mdp);
            if ($maj && $min && $nomb && strlen($mdp) < 8) {
                if ($_POST['password'] === $_POST['password2']) {
                    $bduser = 'root';
                    $bdpass = '';
                    $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
                    $nom = htmlspecialchars($_POST['name']);
                    $prenom = htmlspecialchars($_POST['surname']);
                    $mail = $_POST['mail'];
                    $mdp2 = $_POST['password2'];
                    $choix = $_POST['choix'];
                    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $query = $bdd->query("SELECT email FROM utilisateurs WHERE email = '$mail'");
                    $count = $query->rowCount();
                    if ($count) {
                        // Mail déjà utilisé déjà utilisé
                        echo 'Ce mail est déjà utilisé';
                    } else {
                        // Mail libre
                        $sqlquery = "INSERT INTO utilisateurs (nom,prenom,email,mdp, id_choix) VALUES ('$nom','$prenom','$mail','$mdp','$choix');";
                        echo $sqlquery;
                        $logmembre = $bdd->prepare($sqlquery);
                        $logmembre->execute();
                        $bdd = null;
                    }

                } else {
                    echo 'Les mots de passe ne correspondent pas!';
                }

            } else {
                echo 'Votre mdp doit faire moins 8 caractères, contenir une majuscule et un chiffre';
            }

        } else {
            echo "Tous les champs doivent être complétés";
        }
    } else {
        echo "Veuillez donner votre consentement";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>
<body>
    <form method="POST" action=''>
    <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="name">Prénom:</label>
        <input type="text" id="surname" name="surname">
    </div>

<div>
    <label for="mail">Mail:</label>
    <input type="email" id="mail" name="mail">
</div>

<div>
    <label for="password">Mot de passe: Attention, il doit contenir au moins 8 caractères, une majuscule et un chiffre.</label>
    <input type="password" id="password" name="password">
</div>

<div>
    <label for="password2">Confirmez votre mot de passe</label>
    <input type="password" id="password2" name="password2">
</div>
<div>
    <input type="radio" id="1"
     name="choix" value="1">
    <label for="pro">Professionnel</label>

    <input type="radio" id="2"
     name="choix" value="2">
    <label for="part">Particulier</label>

  </div>

<div>
    <label for="consent">Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement</label>
    <input type="checkbox" name="consent" id="consent">
</div>

<input type="submit" value="Je m'inscris" name='Signin'>
</form>

</body>
</html>
