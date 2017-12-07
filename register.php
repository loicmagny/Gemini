<?php
include 'header.php'
?>
<div class="jumbotron register">
  <h2 class="display-3">S'incrire</h2>
  <form class="form-horizontal">
    <fieldset>
      <div class="form-group">
        <label for="inputUsername" class="col-lg-2 control-label">Nom d'utilisateur</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputEmail" placeholder="Ex: jeanDubois56874" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="inputMail" class="col-lg-2 control-label">Adresse mail</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputMail" placeholder="Ex: jeanDubois56874@hotmail.com" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Mot de passe</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputPassword" placeholder="Ex: azerty" type="password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPasswordConfirm" class="col-lg-2 control-label">Confirmez votre mot de passe</label>
        <div class="col-lg-10">
          <input class="form-control" id="inputPasswordConfirm" type="password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Annuler</button>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
      </div>
    </div>
  </fieldset>
</form>
<?php
include 'footer.php'
?>
