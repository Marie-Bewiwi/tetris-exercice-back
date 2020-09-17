<?php
function conjuguer ($verbe) {
//utiliser str_replace ? 
//utiliser une boucle ? un switch ?
//faire 2 tableaux : un pour les pronoms, l'autre avec les terminaisons
$pronoms = array ("je","tu","il/elle","nous","vous","ils/elles");
$terminaisons = array ("e","es","e","ons","ez","ent");
$terminaisons_ger = array ("e","es","e","eons","ez","ent");
$longueurpronoms = count($pronoms);          
    if (preg_match('/ger$/',$verbe)){
        for ($i=0;$i<$longueurpronoms;$i++) {
        $verbecoupe = substr_replace($verbe,$terminaisons_ger[$i],-2);
        echo $pronoms[$i]." ".$verbecoupe."<br>";
        }
    }

    else if (preg_match('/er$/', $verbe)){
            for ($i=0;$i<$longueurpronoms;$i++){
            $verbecoupe = substr_replace($verbe,$terminaisons[$i],-2);
            echo $pronoms[$i]." ".$verbecoupe."<br>";
            }
    }
    else {
        echo ("ce verbe n'est pas supporté par notre super programme");
    }
}

echo conjuguer("nager")."<br>";
echo "<br>".conjuguer("manger");


?>