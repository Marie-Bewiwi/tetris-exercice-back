<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul d'impôt</title>
</head>
<body>
    <form action="resultatImpot.php" method="get">
        <fieldset>
            <legend> Calcul d'impôt </legend>
            <label for="name">Votre nom:</label>
            <input type="text" name="name"></input>
            <label for="revenus">Vos revenus</label>
            <input type="text" name="revenus">
            <input type="submit" value="Envoyer">
        </fieldset>
    </form>

</body>
</html>
