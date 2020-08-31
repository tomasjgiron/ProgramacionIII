<?php

function potenciaNumero($num, $exp)
{
    return pow($num, $exp);
}

for ($i = 1; $i <= 4; $i++) {
    echo "<br>";
    echo "<br> Las primeras cuatro potencias de $i son: ";
    for ($exp = 1; $exp <= 4; $exp++) {
         echo potenciaNumero($i, $exp);
         $retVal = ($exp != 4) ? ", " : "." ;
         echo "{$retVal}";

    }
}
