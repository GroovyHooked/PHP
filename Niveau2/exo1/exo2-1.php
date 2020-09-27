<?php
function collatz($a){
    if (is_int($a)) {
           do {
             switch ($a){
                 case ($a % 2 == 1):
                     echo $a = ($a * 3) + 1 ."<br/>";
                 case ($a % 2 == 0):
                     echo $a = $a / 2 . "<br/>";
             }
           } while ( $a != 1);
    }
}

collatz(25);

/*
 * function collatz($a){
    if (is_int($a)) {

            if ($a % 2 == 1) {

               echo $a = ($a * 3) + 1 ."<br/>";

            } else if ($a % 2 == 0){

                    echo $a / 2 . "<br/>";
            }
    }
}

collatz(25);


 */