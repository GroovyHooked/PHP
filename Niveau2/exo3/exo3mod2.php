<?php

function sapin($a){
    for ($i = 1; $i <= $a; $i++){
        echo    '<p style="text-align: center; margin:0; padding:0 ">' . str_repeat('**', $i) . '<p style="margin:0; padding:0 "/>';
    }
}

echo sapin(10);


//'<p style="text-align: center">**<p/>'