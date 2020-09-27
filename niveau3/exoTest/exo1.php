<?php
$nom= null; // À définir par défaut
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') { // ==> 3. Si l'attribut "action" est définie dans l'url && si la valeur de l'attribut est "déconnecter"
    unset($_COOKIE['utilisateur']);  // Supprimer le cookie de la session
    setcookie('utilisateur', '', time() - 10); //  Faire un setup du cookie dans le passé pour le faire disparaitre complètement
}
if (!empty($_COOKIE['utilisateur'])){ // ==> 2. Si le cookie est défini =>
    $nom = $_COOKIE['utilisateur'];  // on enregistre son nom dans une variable
}
if (!empty($_POST['nom'])){ // ==> 1. Si le formulaire a été rempli =>
    setcookie('utilisateur', $_POST['nom'], time() );  // on va le sauvegarder dans un cookie
    $nom = $_POST['nom'];
}

include 'header.php';
?>

<h1>Veuillez vous connecter</h1>





<?php if($nom): ?>
    <div class="formulaire">
        <h1>Bonjour <?= htmlentities($nom) ?></h1>
        <a href="exo1.php?action=deconnecter">Se déconnecter</a>
    </div>
<?php else: ?>
    <div class="formulaire">
        <form action="" method="post">
            <div class="group">
                <input type="text" placeholder="Entrez votre nom" name="nom" id="entree">
                <button class="btn">Se connecter</button>
            </div>
        </form>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>