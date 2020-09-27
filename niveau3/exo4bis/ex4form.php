<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>

    <table>
        <caption> Données du formulaire</caption>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Télephone</th>
            <th>Adresse</th>
            <th>Code postal</th>
        </tr>
        <tr>
            <td>
                <?php
                echo $_POST["user_name"];
                ?>
            </td>
            <td>
                <?php
                if (filter_var($_POST["user_mail"], FILTER_VALIDATE_EMAIL)){
                    echo $_POST["user_mail"];
                } else {
                    echo "Votre adresse mail n'est pas valide";
                }
                ?>
            </td>
            <td>
                <?php  //'#^0[5-6][-. ]?[0-9]{2}){4}$#'
                $code_syntaxe="#[0][5-6][- \.?]?([0-9][0-9][- \.?]?){4}$#";
                if(preg_match($code_syntaxe, $_POST["user_cell"])) {
                    echo $_POST["user_cell"];
                } else {
                    echo "Votre numéro de télepone n'est pas valide";
                }
                ?>
            </td>
            <td>
                <?php
                echo $_POST["user_adress"];
                ?>
            </td>
            <td>
                <?php
                if (strlen($_POST["user_zip"]) != 5){
                    echo "Votre Code postal doit être composé de 5 chiffres";
                } else {
                    echo $_POST["user_zip"];
                }
                ?>
            </td>
        </tr>
    </table>




</body>
</html>