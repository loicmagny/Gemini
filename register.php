<?php
include 'header.php';
include 'controllers/register-controller.php';
?>
<div class="section white container ">
    <h1>Inscription</h1>
    <div>
        <?php foreach ($formError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data" id="addUser">
        <p class="secondary">Les champs dotés d'un * sont obligatoires</p>
        <label for="login" class="<?= isset($formError['login']) ? 'inputError' : '' ?>"> Nom d'utilisateur* : </label><input type="text" name="login" id="registerLogin" required onblur="checkLoginUnique()" value="<?= $user->login ?>" />
        <p><span id="errorCheckLoginUnique"><?= ERROR_LOGINUNIQUE ?></span></p>
        <label for="password" class="<?= isset($formError['password']) ? 'inputError' : '' ?>"> Mot de passe* :  </label><input type="password" name="password" id="password" required onclick="Materialize.toast('<span>Le mot de passe doit contenir: un chiffre, une majuscule, une minuscule et doit avoir une longueur entre 8 et 32 caractères</span>', 3000)" value ="<?= $user->password ?>" />
        <label for="confirm" class="<?= isset($formError['confirm']) ? 'inputError' : '' ?>"> Confirmer le mot de passe* :  </label><input type="password" name="confirm" required value="<?= $user->password ?>" />
        <label for="birthdate" class="<?= isset($formError['birthdate']) ? 'inputError' : '' ?>"> Date de naissance* : </label><input type="date" name="birthdate" required value="<?= $user->birthdate ?>" min="1900-01-01" max="<?= date('Y-m-d'); ?>" />
        <label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>"> Adresse mail* : </label><input type="text" name="mail" id="mail" required onblur="checkMailUnique()" value="<?= $user->mail ?>" />
        <p><span id="errorCheckMailUnique"><?= ERROR_MAILUNIQUE ?></span></p>
        <div class="input-field col s12">
            <select name="colorUserNav" id="colorUserNav">
                <option value="" disabled selected>Couleur du menu utilisateur</option>
                <option value="red">Rouge</option>
                <option value="blue">Bleu</option>
                <option value="green">Vert</option>
                <option value="yellow">Jaune</option>
                <option value="brown">Marron</option>
                <option value="purple">Violet</option>
                <option value="black">Noir</option>
            </select>
            <label>Choisissez la couleur du menu utilisateur</label>
        </div>
        <div class="input-field col s12">
            <select name="colorNav" id="colorNav">
                <option value="" disabled selected>Couleur du menu de navigation</option>
                <option value="red">Rouge</option>
                <option value="blue">Bleu</option>
                <option value="green">Vert</option>
                <option value="yellow">Jaune</option>
                <option value="brown">Marron</option>
                <option value="purple">Violet</option>
                <option value="black">Noir</option>
            </select>
            <label>Choisissez la couleur du menu de navigation</label>
        </div>
        <input name="register" type="submit" class="waves-effect waves-light btn" value="Valider"/>
    </form>
    <p class="formValid">
        <?php if ($insertSuccess) { ?>
        <p class="black-text">Envoi réussi</p>
        <?php
    }
    ?>
</div>
<?php
include 'footer.php';
