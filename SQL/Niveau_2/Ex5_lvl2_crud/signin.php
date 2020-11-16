<?php
/*Mes variables*/
include_once 'C:/laragon/www/tetris-exercice-back/SQL/Niveau_2/database.php';
use Medoo\Medoo;

/*Mes tests*/

if (isset($_POST['Signin'])) {
    /*Vérification champs remplis*/
    if (isset($_POST['consent'])) {
        if (!empty($_POST['name']) and !empty($_POST['surname']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['password2']) and isset($_POST['choix'])) {
            $mdp = $_POST['password'];
            $maj = preg_match('@[A-Z]@', $mdp);
            $min = preg_match('@[a-z]@', $mdp);
            $nomb = preg_match('@[0-9]@', $mdp);
            if ($maj && $min && $nomb && strlen($mdp) < 8) {
                if ($_POST['password'] === $_POST['password2']) {
                    $nom = htmlspecialchars($_POST['name']);
                    $prenom = htmlspecialchars($_POST['surname']);
                    $mail = $_POST['mail'];
                    $mdp2 = $_POST['password2'];
                    $choix = $_POST['choix'];
                    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $count = $database->count('utilisateurs', [
                        'email' => $mail,
                    ]);
                    /*   $query = $bdd->query("SELECT email FROM utilisateurs WHERE email = '$mail'");
                    $count = $query->rowCount(); */
                    if ($count >= 1) {
                        // Mail déjà utilisé déjà utilisé
                        $erreur = 'Mail déjà utilisé';
                    } else {
                        // Mail libre
                        $database->insert('utilisateurs', [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'email' => $mail,
                            'mdp' => $mdp,
                            'id_choix' => $choix,
                        ]);
                        header("Location:login_exo5.php");
                        /*   $sqlquery = "INSERT INTO utilisateurs (nom,prenom,email,mdp, id_choix) VALUES ('$nom','$prenom','$mail','$mdp','$choix');";
                    echo $sqlquery;
                    $logmembre = $bdd->prepare($sqlquery);
                    $logmembre->execute();
                    $bdd = null; */
                    }

                } else {
                    $erreur = 'Les mots de passe ne correspondent pas!';
                }

            } else {
                $erreur = 'Votre mdp doit faire moins 8 caractères, contenir une majuscule et un chiffre';
            }

        } else {
            $erreur = "Tous les champs doivent être complétés";
        }
    } else {
        $erreur = "Veuillez donner votre consentement";
    }
}

?>
<?php $title = "Inscription";
include 'templates/header.php';?>
<div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Inscription
      </h1>

      <div class="container" id="custom_form">

           <form action='' method='post'>

           <div class="field">
           <label class="label" for="name">Nom :</label>
            <input class="input" type="text" name="name" id="name">
            </div>

           <div class="field">
            <label class="label" for="surname">Prénom :</label>
            <input class='input' type="text" name="surname" id="surname">
            </div>

            <div class="field">
                <label class="label">Email:</label>
                <div class="control has-icons-left has-icons-right">
                <input class='input'type="text" name="mail" id="mail">
                    <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label" for="password">Mot de passe (moins de 8 caractères, chiffre et majuscule) </label>
                <div class="control has-icons-left has-icons-right">
                <input class='input' type="password" name="password" id="password" value="">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label" for="password2">Retapez votre mot de passe:</label>
                <div class="control has-icons-left has-icons-right">
                <input class='input' type="password" name="password2" id="password2" value="">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control is-expanded">
                    <label class="radio">
                    <input type="radio" name="choix" id='1' value="1">
                    Professionel
                    </label>
                    <label class="radio">
                    <input type="radio" name="choix" id="2" value="2">
                    Particulier
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox label">
                    <input type="checkbox" name="consent" id='consent'>
                    Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement
                    </label>
                </div>
            </div>


            <div class="field">
                <div class="control">
                    <input type="submit" class="button is-primary" name='Signin' value="Je m'inscris">
                </div>
            </div>
        </form>
        <?php if (isset($erreur)) {
    echo "<div class='notification my-2 py-0 is-light is-danger'>$erreur</div>";
}
?>
</div>
</div>
</div>






<!-- <body>
    <form method="POST" action=''>
    <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="name">Prénom:</label>
        <input type="text" id="surname" name="surname">
    </div>

<div>
    <label for="mail">Mail:</label>
    <input type="email" id="mail" name="mail">
</div>

<div>
    <label for="password">Mot de passe: Attention, il doit contenir moins de 8 caractères, une majuscule et un chiffre.</label>
    <input type="password" id="password" name="password">
</div>

<div>
    <label for="password2">Confirmez votre mot de passe</label>
    <input type="password" id="password2" name="password2">
</div>
<div>
    <input type="radio" id="1"
     name="choix" value="1">
    <label for="pro">Professionnel</label>

    <input type="radio" id="2"
     name="choix" value="2">
    <label for="part">Particulier</label>

  </div>

<div>
    <label for="consent">Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement</label>
    <input type="checkbox" name="consent" id="consent">
</div>

<input type="submit" value="Je m'inscris" name='Signin'>
</form> -->

<?php include 'templates/footer.php';?>