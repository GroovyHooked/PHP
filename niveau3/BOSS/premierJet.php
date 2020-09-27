<?php
        // Fonction erreur
function show_error($key) {
    global $errors; //Récupère la variable $errors dans la portée globale @param = $key / @return = String
    return !empty($errors[$key]) ? '<span class="error">'. $errors[$key] .'</span>' : '';
}
    // Vérif des champs
if(!empty($_POST)){
    if(empty($_POST["joueur1"])){
        $errors["joueur1"] = "Ce champ est obligatoire";
    }
    if(empty($_POST["joueur2"])){
        $errors["joueur2"] = "Ce champ est obligatoire";
    }
    if(!preg_match('/([0-6][0-4])|(6[0-4])/m', $_POST['identifiant'])){
        $errors['identifiant'] = "L'identifiant est incorrect";
    }
    if(empty($_POST["vainqueur"])){
        $errors["vainqueur"] = "Vous n'avez pas sélectionné de vainqueur";
    }
}
//vérif du fichier
if (isset($_POST['submit'])){
    $fichier = $_FILES['upload-file'];  // ["ceci"] => name="" dans <form>
    $nomDuFichier = $_FILES['upload-file']['name'];
    $nomTmpFichier = $_FILES['upload-file']['tmp_name'];
    $tailleDuFichier = $_FILES['upload-file']['size'];
    $erreurDuFichier = $_FILES['upload-file']['error'];
    $typeDuFichier = $_FILES['upload-file']['type'];

    $extFichier = explode('.', $nomDuFichier);
    $reelExtFichier = strtolower(end($extFichier));

    $accepter = ['jpg', 'png'];
    // Vérif extension
    if (in_array($reelExtFichier, $accepter)){
        // Vérif erreurs
        if($erreurDuFichier === 0){
            //Vérif taille
            if($tailleDuFichier <= 200000){
                $nouveauNomDeFichier = uniqid('', true) . "." . $reelExtFichier ;
                $destination = 'uploads/'. $nouveauNomDeFichier;
                $messsageFichier = "L'image a bien été uploadée";
                move_uploaded_file($nomTmpFichier, $destination);
                header("Location: index.php?uploadsucess");

            }
        }
    }
}

?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            .error
            {
                color: red;
            }
        </style>
    </head>
    <body>
    <div class="bg-secondary text-white text-center">Formulaire</div>
    <div class="bg-info text-white text-center">-</div>
    <div class="bg-warning mb-5 text-white text-center">_</div>

    <?php if(empty($_POST)) { ?>
    <form class="w-50 m-auto border border-dark p-4" action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group" >
            <label for="joueur1">Nom du 1er joueur</label>
            <input type="text" class="form-control" id="joueur1" name="joueur1">
        </div>

        <div class="form-group">
            <label for="joueur2">Nom du 2ème joueur</label>
            <input type="text" class="form-control" id="joueur2" name="joueur2">
        </div>

        <div class="form-group">
            <label for="identifiant">Identifiant du match</label>
            <input type="text" class="form-control" id="identifiant" name="identifiant">
        </div>

        <div class="form-group">
            <!--<div class="dropdown">-->
            <select class="w-25 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" name="vainqueur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vainqueur

                </option class="dropdown-menu" aria-labelledby="dropdownMenuButton" name="vainqueur">
                <option value="joueur1">Joueur 1</option>
                <option value="joueur1">Joueur 2</option>


            </select>
            <!--</div>-->
        </div>
        <input type="file" class="form-control-file text-center" id="file" name="upload-file">
        <button  type="submit" name="submit" class="btn btn-primary mt-5 text-center">Envoyer</button>
    </form>
        <pre>
            <?php var_dump($errors);?>
        </pre>

    <?php } elseif (!empty($errors)){?>

    <form class="w-50 m-auto border border-dark p-4" action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group" >
            <label for="joueur1">Nom du 1er joueur</label>
            <input type="text" class="form-control" id="joueur1" name="joueur1">
            <?php echo show_error('joueur1') ?>
        </div>

        <div class="form-group">
            <label for="joueur2">Nom du 2ème joueur</label>
            <input type="text" class="form-control" id="joueur2" name="joueur2">
            <?php echo show_error('joueur2') ?>
        </div>

        <div class="form-group">
            <label for="identifiant">Identifiant du match</label>
            <input type="text" class="form-control" id="identifiant" name="identifiant">
            <?php echo show_error('identifiant') ?>
        </div>

        <div class="form-group">
            <!--<div class="dropdown">-->
            <select class="w-25 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" name="vainqueur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vainqueur

                </option class="dropdown-menu" aria-labelledby="dropdownMenuButton" name="vainqueur">
                <option value="joueur1">Joueur 1</option>
                <option value="joueur1">Joueur 2</option>
                <?php echo show_error('vainqueur') ?>


            </select>
            <!--</div>-->
        </div>
        <input type="file" class="form-control-file text-center" id="file" name="upload-file">
        <button  type="submit" name="submit" class="btn btn-primary mt-5 text-center">Envoyer</button>
    </form>

    <?php } elseif(empty($errors) && !empty($_POST)) {?>
    <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>

    <table class="w-75 m-auto border border-dark p-4">
        <caption> Données du formulaire</caption>
        <tr>
            <th>Nom Joueur1</th>
            <th>Nom Joueur2</th>
            <th>Identifiant du match</th>
            <th>Vainqueur</th>
            <th>Nom du fichier</th>
        </tr>
        <tr>
            <td>
                <?php
                echo $_POST["joueur1"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["joueur2"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["identifiant"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["vainqueur"];
                ?>
            </td>
            <td>
                <?php
                echo $messsageFichier;
                ?>
            </td>
        </tr>
    </table>

    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>

