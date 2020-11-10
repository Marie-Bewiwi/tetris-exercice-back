<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
session_start();
if (isset($_SESSION['email'])) {
    $iduser = "";
    $nom = "";
    $prenom = "";
    $email = "";
    $idchoix = "";
    $action = "http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex5_lvl2_crud/crud/create.php";
    $value = "Créer";
    $titlepage = "Créer un nouvel utilisateur";
    $title = "Créer";
    if (isset($_POST['id'])) {
        $iduser = $_POST['id'];
        $action = "http://localhost/tetris-exercice-back/SQL/Niveau_2/Ex5_lvl2_crud/crud/update.php";
        $user = $database->get('utilisateurs', [
            "nom",
            "prenom",
            "email",
            "id_choix",
        ], [
            "id" => $iduser,
        ]);
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $email = $user['email'];
        $idchoix = $user['id_choix'];
        $value = "Update";
        $titlepage = "Mettre à jour un utilisateur";
        $title = "Mettre à jour";

    }

    // $updateuser = $bdd->prepare('SELECT nom,prenom,email,id_choix FROM utilisateurs WHERE id=?');
    // $updateuser->execute([$iduser]);
    // $user = $updateuser->fetch(PDO::FETCH_ASSOC);

}
?>
<?php
include "templates/header.php"?>
<div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        <?php echo $titlepage ?>
      </h1>

      <div class="container" id="custom_form">

           <form action='<?php echo $action ?>' method='post'>
           <input type="hidden" name="id" value='<?php echo $iduser ?>'>

           <div class="field">
           <label class="label" for="nom">Nom :</label>
            <input class="input" type="text" name="nom" id="nom" value="<?php echo $nom ?>">
            </div>

           <div class="field">
            <label class="label" for="prenom">Prénom :</label>
            <input class='input' type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>">
            </div>

            <div class="field">
                <label class="label">Email:</label>
                <div class="control has-icons-left has-icons-right">
                <input class='input'type="text" name="email" id="email" value="<?php echo $email ?>">
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="mdp">Password:</label>
                <div class="control has-icons-left has-icons-right">
                <input class='input' type="password" name="mdp" id="mdp" value="">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="id_choix">ID du choix</label>
                <div class="control has-icons-left has-icons-right">
                <input class="input" type="number" min="1" max="2" name="id_choix" id="id_choix" value="<?php echo $idchoix ?>">
                    <span class="icon is-small is-left">
                    <i class="fas fa-sort-numeric-down"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-link" name='Signin' value='<?php echo $value ?>'>
                </div>
            </div>
        </form>
</div>
</div>
</div>
<?php include "templates/footer.php";?>