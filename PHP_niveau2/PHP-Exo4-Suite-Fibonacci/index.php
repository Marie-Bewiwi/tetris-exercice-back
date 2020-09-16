<?php
function fibonacci($mois){
$lapin1 = 0;
$lapin2 = 1;
$resultat = 0;

for ($i=1 ;$i<$mois ;$i++) {
    $resultat = $lapin1+$lapin2;
    $lapin1=$lapin2;
    $lapin2=$resultat;
}
return $resultat;
}

echo fibonacci(12);



?>