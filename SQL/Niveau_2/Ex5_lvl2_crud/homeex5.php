<?php
session_start();
echo $_SESSION['email'];

if (isset($_POST['deconnexion'])) {
    session_destroy();
    echo '<br>Vous avez été déco';
}
/*Connexion à la base de données*/
$bduser = 'root';
$bdpass = '';
$bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass);

$tableaubdd = $bdd->prepare("SELECT id,prenom,nom,email,id_choix FROM utilisateurs");
$tableaubdd->execute();
$rowuser = $tableaubdd->fetch(PDO::FETCH_ASSOC);
$id = $rowuser['id'];
$prenom = $rowuser['prenom'];
$nom = $rowuser['nom'];
$email = $rowuser['email'];
$idchoix = $rowuser['id_choix'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<table>
                <tr>
                    <th>id</th>
                    <td> <?php echo $id ?></td>
                </tr>

                <tr>
                    <th>Prénom</th>
                    <td> <?php echo $prenom ?></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><?php echo $nom ?> </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td> <?php echo $email ?></td>
                </tr>
                <tr>
                    <th>ID choix</th>
                    <td><?php echo $idchoix ?></td>
                </tr>
                <input type='submit' value='supp' name='supp' id='supp'>
</table>

<form action="" method="post">
 <input type="submit" value="Deconnexion" name="deconnexion">
 </form>
</body>
</html>
