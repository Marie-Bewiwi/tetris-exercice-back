<?php
require "classes/form.class.php";
//***************************
$myform = new Form("traitement.php", "Accès au site", "post");
$myform->settext("nom", "Votre nom :  ");
$myform->settext("code", "Votre code : ");
$myform->setsubmit();
$myform->getform();
?>

<!--A vous de compléter les méthodes de la classe form afin d'obtenir le résultat suivant lors de l'appel à $myform->getform() dans l'exemple ci-dessus :-->
