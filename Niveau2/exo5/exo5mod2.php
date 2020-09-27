<?php


function conjuger($var){
    $conjugaison = ['e', 'es', 'e', 'ions', 'iez', 'ent' ];
    $conjugaisonEr = ['e', 'es', 'e', 'ons', 'ez', 'ent' ];
    $pronoms = ['je', 'tu', 'il', 'nous', 'vous', 'ils'];

    if (preg_match("/ger\Z/", $var)) {
        for ($i = 0; $i < count($conjugaison); $i++){
            echo $pronoms[$i] .' '. str_replace("er", $conjugaison[$i], $var);
            echo '<br/>';
        }
        } else if (preg_match("/er\Z/", $var)) {
        for ($i = 0; $i < count($conjugaison); $i++){
            echo $pronoms[$i] .' '. str_replace("er", $conjugaisonEr[$i], $var);
            echo '<br/>';
        }
        } else {
            echo "Ce n'est pas un verbe du premier groupe";
        }
    }

echo conjuger("danser");
echo '<br/>';

