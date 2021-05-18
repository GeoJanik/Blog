<!-- Modifié ou supprimer un billet -->

<?php $title = 'Supprimer ou modifié'; ?>
<?php ob_start(); ?>

<h1>Supprimer ou modifié vos billlets</h1>

<?php
while ($data = $posts->fetch())
{
?>
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
        <p class="card-text"><?= ($data['content']) ?></p>
        <a class="btn btn-danger" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>">
        Modifier</a>
        <a class="btn btn-danger" href="index.php?action=deletePost&amp;id=<?= $data['id']; ?>">
        Supprimer</a>   
    </div>
    <div class="card-footer text-muted">
        <em>le <?= $data['creation_date_fr'] ?></em>
    </div>
</div>
<?php
}
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>