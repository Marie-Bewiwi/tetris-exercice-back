<?php
$bduser = 'root';
$bdpass = '';

if (isset($_POST['Signin'])) {
    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);
        $pseudo = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $sqlquery = "INSERT INTO connexions (login,password,heure) VALUES ('$pseudo','$password','" . date('Y-m-d H:i:s') . "')";
        $logmembre = $bdd->prepare($sqlquery);
        $logmembre->execute();
        $bdd = null;
    } else {
        $erreur = "Tous les champs doivent être complétés";
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
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
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
