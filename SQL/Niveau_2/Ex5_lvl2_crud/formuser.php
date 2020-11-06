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

    }

    // $updateuser = $bdd->prepare('SELECT nom,prenom,email,id_choix FROM utilisateurs WHERE id=?');
    // $updateuser->execute([$iduser]);
    // $user = $updateuser->fetch(PDO::FETCH_ASSOC);

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

        <form action='<?php echo $action ?>' method='post'>
            <input type="hidden" name="id" value='<?php echo $iduser ?>'>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?php echo $nom ?>">
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $prenom ?>">
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $email ?>">
            <label for="mdp">Mot de passe : </label>
            <input type="password" name="mdp" id="mdp" value="">
            <label for="id_choix">ID du statut : </label>
            <input type="text" name="id_choix" id="id_choix" value="<?php echo $idchoix ?>">

            <input type="submit" value='<?php echo $value ?>'>
        </form>
</body>
</html>