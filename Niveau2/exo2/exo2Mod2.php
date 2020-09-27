<?php
$string = "Je suis une chaine de caractere";
echo $string;
echo "<br/>";
 function inverser($a){
     return strrev($a);
 }

 echo inverser($string);
echo '<br/>';

function inverserVersion2($a){
     $b = str_split($a);
     for ($i = count($b); $i >= 0; $i--){
         $c = $b[$i];
         echo $c;
     }
}
echo inverserVersion2($string);