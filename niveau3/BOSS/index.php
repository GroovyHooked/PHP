<?php

function show_error($key) {
    global $errors; 
    return !empty($errors[$key]) ? '<span class="text-danger">'. $errors[$key] .'</span>' : '';
}
// Si trouvées, on stock les erreurs d'affichage
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
// Vérif du fichier à uploader

if (isset($_POST['submit'])){

    $fichier = $_FILES['upload-file'];  // ["ceci"] => name="["ceci"]" dans <form>
        // variable d'erreur de fichier
    if($_FILES['upload-file']['size'] === 0){
        $errors["upload-file"] = "Vous n'avez pas sélectionné d'image";
    }
        // Varibales fichier
    $nomDuFichier = $_FILES['upload-file']['name'];
    $nomTmpFichier = $_FILES['upload-file']['tmp_name'];
    $tailleDuFichier = $_FILES['upload-file']['size'];
    $erreurDuFichier = $_FILES['upload-file']['error'];
    $typeDuFichier = $_FILES['upload-file']['type'];

        // Recup de l'extension fichier
    $extFichier = explode('.', $nomDuFichier);
    $reelExtFichier = strtolower(end($extFichier));

    $accepter = ['jpg', 'png'];

    // Vérif extension
    if (in_array($reelExtFichier, $accepter)){

        // Vérif erreurs
        if($erreurDuFichier === 0){

            //Vérif taille
            if($tailleDuFichier <= 200000){

                    // Variable d'affichage d'uploads multiples sur même partie
                $nombreUnique = substr(time(),5);

                // Structure de nom du fichier uploadé
                $nouveauNomDeFichier = $_POST['identifiant'] . "_" . $_POST['joueur1'] . "_" . $_POST['joueur2'] . "_" . "W" . substr( $_POST['vainqueur'], -1) ." ." . $reelExtFichier ;

                    // Structure de nom du fichier en cas d'upload multiple pour la même partie même noms même joueurs.
                $nouveauNomDeFichierAlt = $_POST['identifiant'] . "_" . $_POST['joueur1'] . "_" . $_POST['joueur2'] . "_" . "W" . substr( $_POST['vainqueur'], -1) . "(" . $nombreUnique . ")" . "." . $reelExtFichier ;

                    // Chemins d'accès aux fichiers uploadés
                $destination = 'uploads/' . $nouveauNomDeFichier;
                $destinationAlt = 'uploads/' . $nouveauNomDeFichierAlt;

                if(file_exists($destination) || file_exists($destinationAlt)){
                    $destination = 'uploads/'. $nouveauNomDeFichierAlt;
                    $messsageFichier = "L'image supplémentaire a bien été enregistrée";
                    move_uploaded_file($nomTmpFichier, $destination);

                } else {
                    $destination = 'uploads/' . $nouveauNomDeFichier;
                    $messsageFichier = "L'image a bien été enregistrée";
                    move_uploaded_file($nomTmpFichier, $destination);
                }
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
</head>
<body>
<div class="bg-secondary text-white text-center">Vainqueur</div>
<div class="bg-info text-white text-center ">De</div>
<div class="bg-warning mb-5 text-white text-center">Partie</div>

<?php if(empty($_POST)) { ?>
    <form class="w-50 m-auto border border-dark p-4" method="POST" enctype="multipart/form-data">
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


<?php } elseif (!empty($errors)){ ?>

    <form class="w-50 m-auto border border-dark p-4"  method="POST" enctype="multipart/form-data">
        <div class="form-group" >
            <label for="joueur1">Nom du 1er joueur</label>
            <input type="text" class="form-control" id="joueur1" name="joueur1" value="<?php if(isset($_POST['joueur1'])){ echo htmlentities($_POST['joueur1']);}?>">
            <?php echo show_error('joueur1') ?>
        </div>

        <div class="form-group">
            <label for="joueur2">Nom du 2ème joueur</label>
            <input type="text" class="form-control" id="joueur2" name="joueur2" value="<?php if(isset($_POST['joueur1'])){ echo htmlentities($_POST['joueur2']);}?>">
            <?php echo show_error('joueur2') ?>
        </div>

        <div class="form-group">
            <label for="identifiant">Identifiant du match</label>
            <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?php if(isset($_POST['joueur1'])){ echo htmlentities($_POST['identifiant']);}?>">
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
        <?php echo show_error('upload-file') ?>
        <button  type="submit" name="submit" class="btn btn-primary mt-5 text-center">Envoyer</button>
    </form>

<?php } elseif(empty($errors) ){ ?>
    <p class="text-center">Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>

    <table class="table w-75 m-auto">
        <caption class="text-center"> Données du formulaire</caption>
        <thead>
        <tr>
            <th>Nom Joueur 1</th>
            <th>Nom Joueur 2</th>
            <th>Identifiant du match</th>
            <th>Vainqueur</th>
            <th>Nom du fichier</th>
            <th>État</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="pl-4 text-center">
                <?php
                echo $_POST["joueur1"];
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $_POST["joueur2"];
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $_POST["identifiant"];
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $_POST["vainqueur"];
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $nouveauNomDeFichier;
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $messsageFichier . '<br>' . $nombreUnique . '<br>' . time();
                ?>
            </td>
        </tr>
        </tbody>
    </table>

<?php } ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

