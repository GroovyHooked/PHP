<?php

function show_error($key) {
    global $errors; //Récupère la variable $errors dans la portée globale @param = $key / @return = String
    return !empty($errors[$key]) ? '<span class="error">'. $errors[$key] .'</span>' : '';
}

if(!empty($_POST))
{
    if(!preg_match('#^[A-Z][A-Za-z\é\è\ê\-]+$#', $_POST['nom'])) {
        $errors['nom'] = "Le nom doit contenir que les lettres";
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "L'email entré n'est pas valide";
    }
    if(!preg_match("^((\+|00)33\s?|0)[67](\s?\d{2}){4}$^", $_POST['numero'])){
        $errors['numero'] = "Le numéro de téléphone n'est pas valide";
    }
    if(empty($_POST['adress'])){
        $errors['adress'] = 'L\'adresse ne peut être vide';
    }
    if(strlen($_POST["zip"]) != 5){
        $errors['zip'] = 'Le code postal n\'est pas valide';
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exemple de ton code</title>
	<style>
		.error
		{
			color: red;
		}
	</style>
</head>
<body>
        <div class="bg-secondary text-white text-center mb-5">Formulaire</div>

	<?php if(empty($_POST)) {?>

        <form method="POST" action="exo4bis.php">
            <p class="m-auto w-50">
                <label>Nom (*) </label>
                <input type="text" name="nom" value=""/>
            </p>
            <p class="m-auto w-50">
                <label>Email (*)</label>
                <input type="email" name="email" value=""/>
            </p>
            <p class="m-auto w-50">
                <label>Téléphone (*)</label>
                <input type="tel" name="numero" value=""/>
            </p>
            <p class="m-auto w-50">
                <label>Adresse (*) </label>
                <input type="text" name="adress" value="">
            </p>
            <p class="m-auto w-50">
                <label>Code postal (*) </label>
                <input type="number" name="zip" value="">
            </p>
            <div class="m-auto w-50">
                <input type="submit" value="Soumettre le formulaire">
            </div>
        </form>
        <pre>
            <?php var_dump($errors);?>
        </pre>

    <?php } elseif (!empty($errors)){?>

        <form method="POST" action="exo4bis.php"">
        <p class="m-auto w-50">
            <label>Nom (*) </label>
            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);}?>"/>
            <?php echo show_error('nom') ?>
        </p>
        <p class="m-auto w-50">
            <label>Email (*)</label>
            <input type="email" name="email" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']);}?>"/>
            <?php echo show_error('email') ?>
        </p>
        <p class="m-auto w-50">
            <label>Téléphone (*)</label>
            <input type="tel" name="numero" value="<?php if(isset($_POST['numero'])) { echo htmlentities($_POST['numero']);}?>"/>
            <?php echo show_error('numero') ?>
        </p>
        <p class="m-auto w-50">
            <label>Adresse (*) </label>
            <input type="text" name="adress" value="<?php if(isset($_POST['adress'])) { echo htmlentities($_POST['adress']);}?>">
            <?php echo show_error('adress') ?>
        </p>
        <p class="m-auto w-50">
            <label>Code postal (*) </label>
            <input type="number" name="zip" value="<?php if(isset($_POST['zip'])) { echo htmlentities($_POST['zip']);}?>">
            <?php echo show_error('zip') ?>
        </p class="m-auto w-50">
        <div class="m-auto w-50">
            <input type="submit" value="Soumettre le formulaire">
        </div>
        </form>

        <pre>
            <?php var_dump($errors);?>
        </pre>
        <pre>
            <?php var_dump($_POST);?>
        </pre>

<?php } elseif(empty($errors) && !empty($_POST)) {?>

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
                echo $_POST["nom"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["email"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["numero"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["adress"];
                ?>
            </td>
            <td>
                <?php
                echo $_POST["zip"];
                ?>
            </td>
        </tr>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php } ?>