<?php
session_start();
echo $_SESSION['email'];
if (isset($_POST['deconnexion'])) {
    session_destroy();
    echo '<br>Vous avez été déco';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<form action="" method="post">
 <input type="submit" value="Deconnexion" name="deconnexion">
 </form>
</body>
</html>
