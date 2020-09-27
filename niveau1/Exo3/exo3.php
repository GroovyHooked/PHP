<?php


/*function estIlMajeur($age){
    if ($age === (int)$age){
        if($age >= 18){
            return "true";
        } else{
            return "false";
        }
    }
}*/
function estIlMajeur($a){
    return $a >= 18;
}

var_dump(estIlMajeur(19));
echo '<br/>';
























function plusGrand($a, $b){
    if ($a > $b){
        return $a;
    } else {
        return $b;
    }
}
echo plusGrand(55, 35);
echo '<br/>';

function plusPetit($a, $b){
    if ($a < $b){
        return $a;
    } else {
        return $b;
    }
}
echo plusPetit(55, 35);
echo '<br/>';

function lePlusPetit($a, $b, $c){
    if ($a < $b && $a < $c){
        return $a;
    } else if ($b < $a && $b < $c){
        return $b;
    } else {
        return $c;
    }
}
echo lePlusPetit(55, 35, 13);