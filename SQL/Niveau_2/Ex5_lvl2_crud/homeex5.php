<?php
session_start();
echo 'Bienvenue sur le panneau d\'admin de ' . $_SESSION['email'];

if (isset($_POST['deconnexion'])) {
    session_destroy();
    echo '<script>alert("Vous avez été déco")</script>';
    header('Location:login_exo5.php');
}

/*Connexion à la base de données*/
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
/* $bduser = 'root';
$bdpass = '';
$bdd = new PDO('mysql:host=localhost;dbname=niveau2', $bduser, $bdpass); */

$users = $database->select('utilisateurs', [
    "id",
    "prenom",
    "nom",
    "email",
    "id_choix",
])
/* $tableaubdd = $bdd->prepare("SELECT id,prenom,nom,email,id_choix FROM utilisateurs");
$tableaubdd->execute();
$users = $tableaubdd->fetchAll(PDO::FETCH_ASSOC);
 */
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
    <thead>
        <tr>
            <th>id</th>
            <th>prenom</th>
            <th>nom</th>
            <th>Email</th>
            <th>ID choix</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) {?>
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td> <?php echo $user['prenom'] ?></td>
            <td><?php echo $user['nom'] ?> </td>
            <td> <?php echo $user['email'] ?></td>
            <td><?php echo $user['id_choix'] ?></td>
            <td>
                <form action='delete.php' method='post'>
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                    <input type='submit' value='supp' name='supp' id='supp'>
                </form>
            </td>
            <td>
                <form action='formuser.php' method='post'>
                    <input type='hidden' value='<?php echo $user['id'] ?>' name='id'>
                    <input type='submit' value='modif' name='mofif' id='modif'>
                </form>
            </td>
        </tr>
    <?php }
;?>
    </tbody>
</table>
<a href=formuser.php> Ajouter un nouvel utilisateur </a>

<form action="" method="post">
 <input type="submit" value="Deconnexion" name="deconnexion">
 </form>
</body>
</html>
