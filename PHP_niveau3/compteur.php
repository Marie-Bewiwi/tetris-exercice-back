<?php
if (file_exists("compteur.txt")) {
    $doc = fopen('compteur.txt', "r");
    $count = fgets($doc);
    fclose($doc);
} else {

    $count = 0;
}
$doc = fopen("compteur.txt", "w");
$count++;
fwrite($doc, $count);
fclose($doc);

echo 'Le nombre de visite est de ' . $count . " !";
