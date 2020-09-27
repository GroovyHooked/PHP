<?php

function premierElementTableau($tableau){
    if (empty($tableau)){
        return "NULL";
    } else {
        return $premierElement = array_shift($tableau);
    }
}
$a = [10, 23, 45, 24];
var_dump(premierElementTableau($a));
echo '<br/>';
var_dump($a);

echo '<br/>';

function dernierElementTableau($tableau){
    if (empty($tableau)){
        return "NULL";
    } else {
        return $dernierElement = $tableau[count($tableau) - 1] ;
    }
}
$b = [10, 23, 45, 24];
var_dump(dernierElementTableau($b));
echo '<br/>';
var_dump($b);
echo '<br/>';

function plusGrand($tableau){
    if (empty($tableau)){
        return "NULL";
    } else {
        return max($tableau);
    }
}
$b = [10, 23, 45, 24];
echo plusGrand($b);

echo '<br/>';

function plusPetit($tableau){
    if (empty($tableau)){
        return "NULL";
    } else {
        return min($tableau);
    }
}
$b = [10, 23, 2, 45, 24];
echo plusPetit($b);

