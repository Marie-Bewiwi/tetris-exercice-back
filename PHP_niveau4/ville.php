<?php
require 'classes/ville.class.php';
$ville1 = new ville('Nantes', 'Loire Atlantique'); // on appelle le constructeur de classe

$ville2 = new ville('Lyon', 'Rhône');
echo $ville1->getinfo();
echo $ville2->getinfo();
