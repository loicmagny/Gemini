<?php
include 'header.php';
include 'controllers/password-forgotten-controller.php';
?>
<div class="section container formOptions">
    <h1>Vous avez oublié votre mot de passe?</h1>
    <div>
        <?php foreach ($formError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <form action="#" method="POST">
        <label for="login" class="<?= isset($formError['username']) ? 'inputError' : '' ?>"> Quel est votre nom d'utilisateur ? </label><input type="text" name="login"  required />
        <label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>"> Quelle est votre adresse mail ? </label><input type="text" name="mail"  required />
        <label for="password" class="<?= isset($formError['password']) ? 'inputError' : '' ?>"> Nouveau mot de passe :  </label><input type="password" name="password"  required onclick="Materialize.toast('<span>Le mot de passe doit contenir: un chiffre, une majuscule, une minuscule et doit avoir une longueur entre 8 et 32 caractères</span>', 15000)" value ="<?= $user->password ?>" />
        <label for="confirm" class="<?= isset($formError['confirm']) ? 'inputError' : '' ?>"> Confirmer le nouveau mot de passe :  </label><input type="password"  required name="confirm" />
        <label for="confirmCode" class="<?= isset($formError['confirm']) ? 'inputError' : '' ?>"> Code de confirmation  </label><input type="password" name="confirmCode"  required />
        <input type="submit" name="forget" class="btn blue" value="Réinitialiser mon mot de passe"/>
    </form>
    <p class="formValid">
        <?php if ($correctInfos) { ?>
        <p class="black-text">Modification réussie</p>
        <?php
    }
    ?>
</div>
<?php
include 'footer.php';
?>