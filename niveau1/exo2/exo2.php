<?php
function somme($var1, $var2){
    if ($var1 == (int)$var1 && $var2 == (int)$var2){
        return $var1 + $var2;
    } else {
        return "Nombre non entier";
    }
}

echo somme(5.5,8);
echo '<br/>';

function soustraction($var1_1, $var2_1){
    if ($var1_1 == (int)$var1_1 && $var2_1 == (int)$var2_1){
        return $var1_1 - $var2_1;
    } else {
        return "Nombre non entier";
    }
}
echo soustraction(5, 10);
echo '<br/>';

function multiplication($var1_2, $var2_2){
    if ($var1_2 == (int)$var1_2 && $var2_2 == (int)$var2_2){
        return $var1_2 * $var2_2;
    } else {
        return "Nombre non entier";
    }
}
echo multiplication(5, 10);
