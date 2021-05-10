<?php $title = 'Modifier un article'; ?>
<?php ob_start(); ?>

<h1>Modifier votre article</h1>

<form action="index.php?action=submitUpdate&amp;id=<?= $post['id']; ?>" method="post">
	<label for="title">Titre : </label>
	<input type="text" name="title" id="title" value="<?= $post['title'];?>" /><br/>
	<textarea name="content" rows="20" cols="160"><?= nl2br($post['content']);?></textarea>
	<input type="submit" value="Poster" />
</form>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>