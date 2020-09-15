<?php 
//premiere partie
function verificationPassword($motdepasse){
    $longmdp = strlen($motdepasse);
    if($longmdp >= 8 ) {
        return true;
    }
        else {
            return false;
        }
}
$check = verificationPassword("jieo");
var_dump($check);

//seconde partie
function ameliorationverif($mdp) {
$maj = preg_match('@[A-Z]@', $mdp);
$min = preg_match('@[a-z]@', $mdp);
$nomb = preg_match('@[0-9]@', $mdp);

if($maj && $min && $nomb && strlen($mdp) < 8) {
  return true;
}
  else {
      return false;
  }
}

echo ameliorationverif("ihuz5G");

//3e partie 
function capital ($pays){
$pays=strtolower($pays);
    switch ($pays) {
        case "france":
            echo("Paris");
        break;
        case "allemagne":
            echo("Berlin");
        break;
        case "espagne":
            echo("Madrid");
        break;
        case "italie":
            echo("Rome");
        break;
        case "portugal":
            echo("Lisbonne");
        break;
        case "angleterre":
            echo("Londres");
        break;
        case "maroc":
            echo("Rabat");
        break;
        default :
        echo("Inconnu");
    }
}
echo capital("Allemagne");
echo "<br>".capital("Japon");

//4e partie 
function listHTML($listname,$arrayelements){
    $resultat="<h3>$listname</h3>";
    $resultat.="<ul>";
    foreach($arrayelements as $element){
        $resultat.="<li>$element</li>";
    }
    $resultat.="</ul>";
return $resultat;
}
echo "<br>".listHTML('Capitale',["Berlin","Paris","Moscou"]);

?>