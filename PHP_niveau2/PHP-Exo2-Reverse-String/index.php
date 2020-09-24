 <?php 

function invert ($chaine){
    $chaineinversee= strrev($chaine);
    return $chaineinversee;
}
echo invert('Je suis devenu un magnifique papillon');

//autrement 
function autremethode($chaine2){
    $longueurchaine = strlen($chaine2);
    $chainerenversee = "";
    for($i = $longueurchaine - 1; $i >= 0; $i--){
        $caractere=$chaine2[$i];
        $chainerenversee.=$caractere;
    }
    return $chainerenversee;
}
echo "<br>".autremethode("Je suis aussi un beau papillon");
?>