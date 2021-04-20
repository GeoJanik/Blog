<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<div class="logConnexion">
  <h2>Connexion à votre compte</h2>
  <form method="post" action="">
    <div class="mb-3">
      <label for="pseudo" class="form-label">Pseudo</label>
      <input type="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
    <input type="submit" class="form-control" id="submit">
  </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>