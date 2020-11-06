<?php
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;
session_start();

if (isset($_POST['Signin'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = ($_POST['password']);

    if (true) {
        if (!empty($_POST['email']) and !empty($_POST['password'])) {

            $countuser = $database->count('utilisateurs', [
                'email' => $mail,
            ]);
            // $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
            //$requser->execute([$mail]);
            //$userexist = $requser->rowcount();

            if ($countuser == 1) {
                $reqmdp = $database->get('utilisateurs', 'mdp', ['email' => $mail]);
                // $reqmdp = $bdd->prepare('SELECT mdp FROM utilisateurs WHERE email = ?');
                // $reqmdp->execute([$mail]);
                //  $rowmdp = $reqmdp->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $reqmdp)) {

                    $_SESSION['email'] = $mail;
                    $essai = 1;
                    header('Location:homeex5.php');

                } else {
                    $erreur = 'Mail ou mot de passe incorrect';
                    $essai = 0;

                }
            } else {
                $essai = 0;
                $erreur = "Mail ou mot de passe incorrect";
            }
        } else {
            $essai = 0;
            $erreur = "Tous les champs doivent être complétés";
        }

        /*Insertion du log en bdd table connexion*/
        $database->insert('connexions', [
            'login' => $mail,
            'password' => $password,
            'tentative' => $essai,
        ]);
        // $tentative = $bdd->prepare("INSERT INTO connexions (login,password,tentative) VALUES (?,?,?)");
        // $tentative->execute(array($mail, $password, $essai));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <link rel="stylesheet" href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

</head>
<body>


<section class="hero is-info is-fullheight">
  <!-- Hero head: will stick at the top -->
<div class="hero-head">
    <header class="navbar">
        <div class="container">
            <div class="columns is-centered is-mobile">
                <div class="navbar-brand column is-col-1">
                    <a class="navbar-item">
                        <img src="fried-egg.svg" alt="Logo" width="112px" height="28px"> Sunnyside
                    </a>
                </div>
                <div class='navbar-item column is-three-quarters-mobile is-half-desktop is-half-fullhd is-align-self-center mr-2'>
                The cute tool to manage your users
                </div>
            </div>
        </div>
    </header>
</div>


<!-- Fin du header -->

  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Connect to the database
      </h1>

      <div class="container" id="custom_form">

        <form method='post' action="">

            <div class="field">
                <label class="label">Email:</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Your email here" value="" id='email' name='email'>
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Password:</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="password" placeholder="Your password here" value="" id='password' name="password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-link" name='Signin'>
                </div>
            </div>

        </form>
       <?php if (isset($erreur)) {
    echo "<div class='notification my-2 py-0 is-light is-danger'>$erreur</div>";
}
?>
</div>
<a class='button is-small mt-3' href="password/resetpassword.php"> Mot de passe oublié ? </a>
</div>
</div>

<!-- Fin du body -->
<!-- Début du footer -->
<div class="hero-foot">
      <div class="container has-text-centered">
        <p class='is-size-7'> Made with love by Marie-Bewiwi</p>
      </div>
    </nav>
  </div>
</section>


 <?php
/* if (isset($erreur)) {
echo "<div class='notification is-danger'>$erreur</div>";
}

/* Bonus à finir
$requeteban = $bdd->prepare("SELECT tentative FROM connexions WHERE login = ? ORDER BY heure DESC");
$requeteban->execute([$mail]);
$result = $requeteban->fetchAll();
$comptage = 0;
foreach ($result as $row) {
if ($comptage >= 5) {

}
if ($row['tentative'] == 0) {
$comptage++;
} else {
break;
}
} */
?>

</body>
</html>
