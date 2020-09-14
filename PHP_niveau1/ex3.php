<?php
function estIlMajeur ($age) {
    if ($age>=18) {
        return true;
    }
    else {
        return false;
    }
}
$result = estIlMajeur(7);
var_dump($result); //var dump permet de tout écrire directement à propos de la variable

function plusGrand($nb1,$nb2) {
    return max($nb1,$nb2);
}
echo max(56,3);

function plusPetit($nombre,$nombre2) {
    return min($nombre,$nombre2);
}
echo min(87,908);
?>