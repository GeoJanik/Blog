<?php $title = "Admin" ?>


<h1>Bienvenu sur votre espace Admin</h1>

<div class="cardAdmin">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Géré les articles</h5>
            <p class="card-text">Créer, suprimer, modifier un article !</p>
            <a href="#" class="btn btn-primary">Y aller !</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Géré les Commentaires</h5>
            <p class="card-text">Créer, suprimer, modifier un commentaires !</p>
            <a href="#" class="btn btn-primary">Y aller !</a>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>