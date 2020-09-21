<?php
function changechiffre($chiffrentier)
{
    $chiffrentier = intval($chiffrentier);
    if ($chiffrentier <= 0) {
        $chiffrentier = 1;
    }
    return $chiffrentier;
}

function syracuse($newchiffre)
{
    echo $newchiffre;
    do {
        if ($newchiffre % 2 === 1) {
            $newchiffre = ($newchiffre * 3) + 1;
            echo " " . ($newchiffre);
        } else {
            $newchiffre = $newchiffre / 2;
            echo " " . ($newchiffre);
        }
    } while ($newchiffre != 1);

    return $newchiffre;
}
syracuse(changechiffre(877.67));
