<?php
function verificationPassword($var){
    if (strlen($var) >= 8){
        return "true";
    } else {
        return "false";
    }
}
$a = "Jesuisunmotdepasse5";
echo verificationPassword($a);
echo '<br/>';
// var_dump(count($a)); (Impossible de récupérer la longueur d'une chaine de caractères)

function verificationPassword2($var){
    $upper = preg_match('@[A-Z]@', $var);
    $lower = preg_match('@[a-z]@', $var);
    $number = preg_match('@[0-9]@', $var);
    if (strlen($var) >= 8 && $upper && $lower && $number){
        return "Mot de passe solide";
    } else {
        return "Le mot de passe doit être composé de 8 caractères minimum, avoir au moins une lettre minuscule et majuscule et être composé d'au moins un chiffre";
    }
}
echo verificationPassword2($a);
$tab = [
    'France' => 'Paris',
    'Allemage' => 'Berlin',
    "Italie" => 'Rome',
    "Maroc" => 'Rabat',
    "Espagne" => 'Madrid',
    "Portugal" => 'Lisbonne',
    "Angleterre" => 'Londres'
];

function capital($a){
    switch ($a){
        case 'France':
            echo 'Paris';
            break;
        case 'Allemagne':
            echo 'Berlin';
            break;
        case 'Italie';
            echo 'Rome';
            break;
        case 'Maroc';
            echo 'Rabat';
            break;
        case 'Espagne';
            echo 'Lisbonne';
            break;
        case 'Angleterre';
            echo 'Londres';
            break;
        default :
            echo "inconnu";
            break;
    }
}
echo capital(Angleterre);







function listeHTML($a, $b){
        echo "<h3>$a<h3/>";
        echo "<ul>";
    for ($i = 0; $i < count($b); $i ++) {
        echo "<li>$b[$i]</li>";
    }
        echo "</ul>";
}


$titre = "Capitale";
$villes = ["Paris", "Berlin", "New-York" ];
echo listeHTML($titre, $villes);
echo "<br/>";









function remplacerLesLettres($a){
    return strtr($a, "ei", "31");
}
$test = "Je suis une phrase test";
echo remplacerLesLettres($test);
echo '<br/>';

function quelleAnnee(){
    //$date = localtime();
    return date("Y");
}

echo quelleAnnee();
echo '<br/>';

function quelleDate(){
    return date("d/m/Y");
}
echo quelleDate();