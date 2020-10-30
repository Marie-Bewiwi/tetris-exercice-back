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
$users = $tableaubdd->fetchAll(PDO::FETCH_ASSOC);

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
            <td> <form action='update.php' method='post'><input type='submit' value='modif' name='mofif' id='modif'></form></td>
        </tr>
    <?php }
;?>
    </tbody>
</table>

<form action="" method="post">
 <input type="submit" value="Deconnexion" name="deconnexion">
 </form>
</body>
</html>
