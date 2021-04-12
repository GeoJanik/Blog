<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<div class="logConnexion">
  <form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
  </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>