<?php
session_start();
$bienvenue = 'Bienvenue sur le panneau d\'admin de ' . $_SESSION['email'];

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
<?php $title = "Home";
include "templates/header.php";?>
<div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
          <?php echo $bienvenue ?>
      </h1>
<div class='container' id='custom_table'>
<table class="table">
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
                <form action='crud/delete.php' method='post'>
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                    <input type='submit' value='supp' name='supp' id='supp' class='button is-danger'>
                </form>
            </td>
            <td>
                <form action='formuser.php' method='post'>
                    <input type='hidden' value='<?php echo $user['id'] ?>' name='id'>
                    <input type='submit' value='modif' name='mofif' id='modif' class="button is-primary">
                </form>
            </td>
        </tr>
    <?php }
;?>
    </tbody>
</table>

</div>

    </div>
</div>

<div class="container has-text-centered">
<form action="" method="post">
<a href=formuser.php class='button is-success'> Ajouter un nouvel utilisateur </a>
<button type="submit" name="deconnexion" class="button is-warning">
    <span class="icon is-small">
    <i class="fas fa-sign-out-alt"></i>
    </span>
    <span>Déconnexion</span>
  </button>
</form>
</div>
<?php include 'templates/footer.php';?>