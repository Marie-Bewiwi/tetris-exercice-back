<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex4</title>
</head>
<body>
    <form method="POST" action="form.php">
        <label for="name"> Votre nom : </label>
            <input type="text" placeholder="Votre nom complet" id="name" name="name" >
            <br/>
            <br/>
        <label for="email"> Votre email : </label>
            <input type="mail" placeholder="Votre mail" id="email" name="email" >
        <br/>
        <br/>
        <label for="tel"> Votre numéro : </label>
            <input type = "text" placeholder="Numéro de téléphone" name="tel"  id="tel" >
        <br/>
        <br/>
        <label for="adress"> Votre adresse :</label>
            <input type = "text" placeholder="votre adresse" id="adress" name="adress" >
        <br/>
        <br/>
        <label for="postcode">Votre code postal :</label>
            <input type="text" placeholder="code postal" id='postcode' name="postcode">
            <br/>
            <br/>
            <button type= "submit" value="envoyer">Envoyer</button>
    </form>
</body>
</html>
