<?php $title = 'Connexion';?>

<?php ob_start(); ?>

<div class="logConnexion">
  <h2>Connexion à votre compte</h2>
  <form method="post" action="index.php?action=loginSubmit">
    <div class="mb-3">
      <label for="pseudo" class="form-label">Pseudo</label>
      <input type="text" class="form-control" id="pseudo" name="pseudo">
    </div>
    <div class="mb-3">
      <label for="pass" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
    
  </form>
  
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>