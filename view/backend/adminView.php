<?php ob_start(); ?>
<?php $title = "Admin" ?>

<h1>Bienvenue sur votre espace Admin</h1>

<div class="cardAdmin">
    <div class="card-body">
        <h5 class="card-title">Créer un article pour qu'il soit publié</h5>
        <a href="index.php?action=articleViewAdmin" class="btn btn-primary">Y aller !</a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Modifié ou supprimé un article existant </h5>
        <a href="index.php?action=updateDeletePost" class="btn btn-primary">Y aller !</a>
    </div>
    <div class="card-body">
        <h5 class="card-title">Créer, supprimer, modifier un commentaires !</h5>
        <a href="index.php?action=commentViewAdmin" class="btn btn-primary">Y aller !</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>