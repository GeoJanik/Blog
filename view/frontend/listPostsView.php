<!-- liste des billets de l'accueil -->

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php
while ($data = $posts->fetch())
{
?>
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
        <div class="card-text">
            <?= 
         substr($data['content'], 0, 300);
         ?>
            <br>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire plus ...</a>
        </div>
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
<?php require('template.php'); ?>