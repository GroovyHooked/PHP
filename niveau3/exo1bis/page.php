<!DOCTYPE html>
<html>
<head>
    <title>Compteur de visites</title>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user scalable=no">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Exercice PHP</h1>
</header>
<?php
$chemin = 'compteur.txt';

$pages_vues = 0;

$monfichier = fopen($chemin, 'a+');
$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
fclose($monfichier);

$pages_vues += 1; // On augmente de 1 ce nombre de pages vues

$monfichier = fopen($chemin, 'r+');
fwrite($monfichier, $pages_vues); // On remet le curseur au début du fichier
fclose($monfichier);


echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';

?>

 <footer>

    </footer>

</body>
</html>



