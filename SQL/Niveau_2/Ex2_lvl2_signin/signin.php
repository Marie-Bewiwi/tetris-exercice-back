<?php
$bduser = 'root';
$bdpass = '';
$bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
$nom = htmlspecialchars($_POST['name']);
$prenom = htmlspecialchars($_POST['surname']);
$mail = $_POST['']
$mdp = 
/*function ameliorationverif($mdp) {
    $maj = preg_match('@[A-Z]@', $mdp);
    $min = preg_match('@[a-z]@', $mdp);
    $nomb = preg_match('@[0-9]@', $mdp);
    
    if($maj && $min && $nomb && strlen($mdp) < 8) {
      return true;
    }
      else {
          return false;
      }
    }*/
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
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password">
</div>

<div>
    <label for="password2">Confirmez votre mot de passe</label>
    <input type="password" id="password2" name="password2">
</div>
<div>
    <input type="radio" id="pro"
     name="choix" value="pro">
    <label for="pro">Professionnel</label>

    <input type="radio" id="part"
     name="choix" value="part">
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
