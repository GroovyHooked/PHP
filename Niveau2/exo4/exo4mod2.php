<?php
function fibonacci($a){
    $b = 0;
    $c = 1;
    echo $b;
    echo '<br/>';
    echo $c;
    echo '<br/>';
    for ($i = 0; $i < $a; $i++){
        $b += $c;
        echo $b;
        echo '<br/>';
        $c += $b;
        echo $c;
        echo '<br/>';
    }
}
echo fibonacci(10);