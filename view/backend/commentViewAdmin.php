<!-- Affichage des commentaires report -->

<?php ob_start(); ?>
<?php $title = "Gerer les commentaires" ?>

<h1>Bienvenu dans votre espace administrateur</h1>

<h2 id="titleCommentAdmin">Gérer les Commentaires signalés par les utilisateurs</h2>
<div class="carComment"></div>
<?php
while ($reportedComment = $reportedComments->fetch()) 
{
?>
<div class="card text-center">
    <div class="card-bodyAdmin">
        <p id="userComment">L'utilisateur <strong><?= htmlspecialchars($reportedComment['author']) ?></strong></p>
        <p>A été signalé pour le commentaire suivant :</p>
        <p><?= nl2br(htmlspecialchars($reportedComment['comment'])) ?></p>
        <a class="btn btn-danger" href="index.php?action=deleteComment&amp;comment_id=<?= $reportedComment['id']?>">
        Supprimer le commentaire</a> <br><br>
    </div>
</div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>