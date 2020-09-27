<?php
function helloWorld(){
    return "Hello World";
}
echo helloWorld();
echo "<br>";
function quiEstMonMeilleurProf(){
    return "Mon super formateur de dev web";
}
echo quiEstMonMeilleurProf();
echo "<br>";
function jeRetourneMonArgument($test){
    return $test;
}
$theTest = "Mon test !";
echo jeRetourneMonArgument($theTest);
echo "<br>";
echo jeRetourneMonArgument("Un autre test");
echo "<br>";

function concatenation($var1, $var2){
    return $var1 . $var2;
}

function concatenationAvecEspace($var1, $var2){
    return $var1 . ' ' . $var2;
}
echo concatenation("Kinglsey", "Coman");
echo "<br/>";
 echo concatenationAvecEspace("Manuel", "Neuer");

