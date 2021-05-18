<!-- Création d'un article -->

<?php ob_start(); ?>
<?php $title = 'Creer un article'; ?>

<h1>Bienvenu dans votre espace administrateur</h1>
<h2 id="titleAdmin">Créer un article</h2>

<div class="createArticle">
	<form action="index.php?action=ticketPost" method="post">
		<label for="title">Titre : </label>
		<input type="text" name="title" id="title" placeholder="Votre titre" size="80" /><br/>
		<textarea class="tinymce" name="content" rows="40" cols="160"></textarea>
		<input type="submit" value="Poster" />
	</form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>