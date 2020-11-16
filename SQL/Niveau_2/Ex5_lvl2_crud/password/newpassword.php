<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
if (isset($_POST['btnmdp'])) {
    $mdp = $_POST['newpassword'];
    $mdpconfirm = $_POST['passwordconfirm'];
    if ($mdp === $mdpconfirm) {
        $mdp = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        $id = $_GET['id'];
        $token = $_GET['token'];
        $database->update('utilisateurs', [
            'mdp' => $mdp], [
            'id' => $id,
            'token' => $token,
        ]);
        //$update = $bdd->prepare("UPDATE utilisateurs SET mdp=? where id = ? AND token = ?");
        //$update->execute(array($mdp, $id, $token));
        echo '<script> alert ("Votre mot de passe a bien été réinitialisé.")</script>';
    } else {
        echo '<script> alert ("vos mdp ne correspondent pas !") </script>';
    }
}

?>


<?php $title = "Nouveau mot de passe";
include "../templates/header.php";?>

<div class="hero-body">
    <div class="container has-text-centered">
    <h1 class="title"> Définissez votre nouveau mot de passe</h1>
    <div class="container" id="custom_form">

    <form action="" method="post">
    <div class="field">
                  <label class='label'for="newpassword">Rentrez ici votre nouveau mot de passe : </label>
                <div class="control has-icons-left has-icons-right">
                <input class="input" type="password" name="newpassword" id="newpassword">
                    <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                  <label class='label'for="passwordconfirm">Retapez votre nouveau mot de passe : </label>
                <div class="control has-icons-left has-icons-right">
                <input class="input" type="password" name="passwordconfirm" id="passwordconfirm">
                    <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>


        <button type="submit" id='btnmdp' name='btnmdp' value="Envoyer" class='button is-success'>
            Mofifier mon mot de passe </button>
    </form>
</div>
</div>
</div>
<?php include "../templates/footer.php";?>

