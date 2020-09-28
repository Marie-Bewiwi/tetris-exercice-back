<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss lvl3</title>
</head>
<body>
    <form method = "POST" action="bosslvl3.php" enctype="multipart/form-data">

        <label for="joueur1">Identifiant joueur 1</label>
        <input type="text" id="joueur1" name="joueur1" >
        <label for="joueur1">Identifiant joueur 2</label>
        <input type="text" id="joueur2" name="joueur2" >
        <label for="idmatch">Numéro du match (1 à 64) </label>
        <input type="text" id="idmatch" name="idmatch">
        <p> Quel est le gagnant </p>
        <label for="vainqueur1">Joueur 1</label>
        <input type="radio" id="vainqueur1" name="vainqueur" checked value ="W1">
        <label for="vainqueur2">Joueur 2</label>
        <input type="radio" id="vainqueur2" name="vainqueur" value ="W2">
        <input type="file" name="uploadfile" id="uploadfile">
        <input type="submit" value="Envoyer" id="submit">

    </form>
    <?php
if (!empty($_POST)) {
    $erreur = false;
    $msgerreur = "";
    //check joueurs
    if (empty($_POST["joueur1"])) { //check required field for p1
        $erreur = true;
        $msgerreur .= 'La champ Joueur1 est obligatoire <br/>';
    }
    if (empty($_POST["joueur2"])) { //check required field for p1
        $erreur = true;
        $msgerreur .= 'La champ Joueur2 est obligatoire <br/>';
    }
    //check match
    if (empty($_POST["idmatch"])) { //check required field for p1
        $erreur = true;
        $msgerreur .= 'La champ idmatch est obligatoire <br/>';
    } else {
        $idmatch = intval($_POST['idmatch']);
        if ($idmatch < 1 || $idmatch > 64) {
            $msgerreur .= "Les id de match ne sont comprises qu'entre 1 et 64 ! <br/>";
        }
    }
    //check file
    if (empty($_FILES['uploadfile'])) {
        $msgerreur .= "Le screenshot est obligatoire <br/>";
    } else {
        if ($_FILES['uploadfile']['type'] != 'image/jpeg' && $_FILES['uploadfile']['type'] != 'image/png') {
            $msgerreur .= 'Le format du fichier doit être Jpeg ou PNG <br/>';
        }
        if ($_FILES['uploadfile']['size'] > 1024 * 1024 * 2) {
            $msgerreur .= 'Votre fichier est trop lourd, il doit être inférieur à 2Mo <br/>';
        }
    }
    if ($erreur) {
        echo $msgerreur;
        return;
    }
    //upload du fichier
    $targetfile = "uploads/" . $_POST["idmatch"] . "_" . $_POST["joueur1"] . "_" . $_POST["joueur2"] . "_" . $_POST["vainqueur"] . "." . pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['uploadfile']['tmp_name'], $targetfile);
}
?>
</body>
</html>
