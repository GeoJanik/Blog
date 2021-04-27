<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>





<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($post['title']) ?></h5>
        <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        <a href="index.php" class="btn btn-primary">Retour à la liste des billets</a>
    </div>
    <div class="card-footer text-muted">
        <em>le <?= $post['creation_date_fr'] ?></em>
    </div>
</div>

<div class="formComment">
    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>

            <button type="submit" class="btn btn-success">Envoyer</button>
        </div>
    </form>


    <?php
while ($comment = $comments->fetch())
{
?>

    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <a href="index.php?action=commentReport&amp;comment_id=<?php $comment['id']?>">
        <button type="button" class="btn btn-danger">Signaler</button></a>
    <?php
        
}
?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>