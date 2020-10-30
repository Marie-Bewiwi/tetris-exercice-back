<?php
session_start();
$iduser = $_POST['id'];
if (isset($_SESSION['email'])) {
    $bduser = 'root';
    $bdpass = '';
    $bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);

    $updateuser = $bdd->prepare('SELECT nom,prenom,email,id_choix FROM utilisateurs WHERE id=?');
    $updateuser->execute([$iduser]);
    $user = $updateuser->fetch(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>

        <form action='update.php' method='post'>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $user['nom'] ?>">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom'] ?>">
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
            <label for="mdp">Mot de passe : </label>
            <input type="text" name="mdp" id="mdp" value="">
            <label for="id_choix">ID du statut : </label>
            <input type="text" name="id_choix" id="id_choix" value="<?php echo $user['id_choix'] ?>">

            <input type="submit" value="Update">
        </form>
</body>
</html>