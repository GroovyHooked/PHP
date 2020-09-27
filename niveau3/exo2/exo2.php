<?php

$tableau = [
    "Roger" => 12,
    "Monica" => 16,
    "Najat" => 15
];


$tableau["Anton"] = 10;
$stockage = [];
var_dump($tableau);
echo '<br>';
$count = 0;
$cumuleNotes= 0;
foreach ($tableau as $nom => $note) {
    var_dump($note) ;
    $count++;
    $cumuleNotes += $note;
    array_push($stockage, $note);
    echo '<br>';
    echo $count;
}
echo '<pre>';
var_dump($stockage);
echo '<pre>';
echo '<br>';
echo '</pre>';
var_dump($tableau);
echo '</pre>';
echo '<br>';
echo $cumuleNotes / $count;