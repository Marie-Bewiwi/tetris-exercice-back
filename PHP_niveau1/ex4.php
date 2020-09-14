<?php
$tabvide = array ();
$tab = array ("Disney","Ghibli");
$tabint = array (6,8,90);
function premierElementTableau($tableau){
    if (empty($tableau)){
        return "NULL";
    }
   else {
    return $tableau[0]; }

}

echo premierElementTableau($tab);

function dernierElementTableau($argtableau){
    return end($argtableau);
}
echo "<br>".dernierElementTableau($tab);

function plusGrand ($argtableau2) {
    return max($argtableau2);
}
echo "<br>".plusGrand($tabint);

function plusPetit ($argtableau3) {
    return min($argtableau3);
}
echo "<br>".plusPetit($tabint);
?>