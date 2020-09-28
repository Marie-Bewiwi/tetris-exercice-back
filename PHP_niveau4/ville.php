<?php
require 'classes/ville.class.php';
$ville1 = new ville(); // on appelle le constructeur de classe
$ville1->nom = "Nantes"; // on lui donne son nom
$ville1->departement = "Loire Atlantique";

$ville2 = new ville();
$ville2->nom = "Lyon";
$ville2->departement = "Rhône";
echo $ville1->getinfo();
echo $ville2->getinfo();
