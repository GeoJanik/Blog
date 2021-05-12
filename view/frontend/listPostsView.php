<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<?php
while ($data = $posts->fetch())
{
?>
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
        <p class="card-text">
            <?= 
         $limited = substr($data['content'], 0, 200) ;
         echo $limited . "...";
         ?>
            <br>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire plus ...</a>
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