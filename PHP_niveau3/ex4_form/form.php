<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte rendu du formulaire</title>
</head>
<body>
    <table>
        <tr>
        <th>Nom</th>
        <td><?php echo htmlspecialchars($_POST['name']) ?></td>
        <tr>
        <th>Mail</th>
        <td><?php echo htmlspecialchars(verifemail($_POST['email'])) ?></td>
        <tr>
        <th>Numéro de téléphone</th>
        <td><?php echo htmlspecialchars(veriftel($_POST['tel'])) ?></td>
        <tr>
        <th>Adresse</th>
        <td><?php echo htmlspecialchars($_POST['adress']) ?></td>
        <tr>
        <th>Code Postal </th>
        <td><?php echo htmlspecialchars(verifpostal($_POST['postcode'])) ?></td>
    </table>
</body>
</html>

<?php

function verifemail($mail)
{
    if (empty($_POST['email'])) {
        echo 'Ce champ est obligatoire <button><a href="index.php">Retour au formulaire</a></button>';
    } else {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return $mail;
        } else {
            echo 'Votre adresse mail est invalide <button><a href="index.php">Retour au formulaire</a></button>';
        }
    }
}

function veriftel($numtel)
{
    if (empty($_POST['tel'])) {
        echo 'Ce champ est obligatoire <button><a href="index.php">Retour au formulaire</a></button>';
    } else {
        if (preg_match('/^(06|05) [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}$/', $numtel)) {
            return $numtel;
        } else {
            echo 'Votre numéro est invalide <button><a href="index.php">Retour au formulaire</a></button>';
        }
    }
}

function verifpostal($codepostal)
{
    if (empty($_POST['postcode'])) {
        echo 'Ce champ est obligatoire <button><a href="index.php>Retour au formulaire</a></button>';
    } else {
        if (strlen($codepostal) == 5 && (preg_match('/[0-9]{5}/', $codepostal))) {
            echo $codepostal;
        } else {
            echo 'Votre code postal est invalide. <button><a href="index.php">Retour au formulaire</a></button>';
        }

    }
}

?>