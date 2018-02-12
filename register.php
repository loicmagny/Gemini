<?php
include 'header.php';
include 'controllers/register-controller.php';
?>
<div class="section white">
    <div>
        <?php foreach ($formError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <form action="#" method="POST">
        <label for="username" class="<?= isset($formError['username']) ? 'inputError' : '' ?>"> Nom d'utilisateur* : </label><input type="text" name="username" value="<?= $user->login ?>" />
        <label for="password" class="<?= isset($formError['password']) ? 'inputError' : '' ?>"> Mot de passe* :  </label><input type="password" name="password" value="<?= $user->password ?>" />
        <label for="confirm" class="<?= isset($formError['confirm']) ? 'inputError' : '' ?>"> Confirmer le mot de passe* :  </label><input type="password" name="confirm" value="<?= $user->password ?>" />
        <label for="birthdate" class="<?= isset($formError['birthdate']) ? 'inputError' : '' ?>"> Date de naissance* : </label><input type="date" name="birthdate" value="<?= $user->birthdate ?>" />
        <label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>"> Adresse mail* : </label><input type="text" name="mail" value="<?= $user->mail ?>" />
        <label for="file" class="<?= isset($formError['file']) ? 'inputError' : '' ?>">Photo de profil* :  </label><input type="file" name="file" />
        <input name="submit" type="submit" class="waves-effect waves-light btn" value="Valider"/>
    </form>
    <p class="formValid">
        <?php if ($insertSuccess) { ?>
        <p class="black-text">Envoi réussi</p>
        <?php
    }
    ?>
</p>
</div>
<?php
include 'footer.php';
