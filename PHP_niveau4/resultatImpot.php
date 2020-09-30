<?php
require "classes/impot.class.php";
$resultat = new impot($_GET["name"], $_GET["revenus"]);
$resultat->afficheImpots($_GET["name"], $resultat->calculImpots($_GET["revenus"]));
