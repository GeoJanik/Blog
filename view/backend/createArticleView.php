<?php ob_start(); ?>

<h1>Bienvenu dans votre espace administrateur</h1>

<h2>Créer un article</h2>

<div class="createArticle">
<form action="index.php?action=ticketPost" method="post">
	<label for="title">Titre : </label>
	<input type="text" name="title" id="title" placeholder="Votre titre" size="80" /><br/>
	<textarea name="content" rows="40" cols="160"></textarea>
	<input type="submit" value="Poster" />
</form>

<?php $content = ob_get_clean(); ?>
<?php require('./view/frontend/template.php'); ?>