<?php
include 'header.php';
include 'controllers/register-controller.php';
?>
<div class="section white container ">
    <h1><?= HEAD_REGISTERTITLE ?></h1>
    <div>
        <?php foreach ($formError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <form action="#" method="POST" enctype="multipart/form-data" id="addUser">
        <p class="secondary"><?= FORM_INFO ?></p>
        <label for="login" class="<?= isset($formError['login']) ? 'inputError' : '' ?>">*<?= FORM_LOGIN ?></label><input type="text" name="login" id="registerLogin" required onblur="checkLoginUnique()" value="<?= $user->login ?>" />
        <p><span id="errorCheckLoginUnique"><?= ERROR_LOGINUNIQUE ?></span></p>
        <label for="password" class="<?= isset($formError['password']) ? 'inputError' : '' ?>">*<?= FORM_PASSWORD ?></label><input type="password" name="password" id="password" required onclick="Materialize.toast('<span>Le mot de passe doit contenir: un chiffre, une majuscule, une minuscule et doit avoir une longueur entre 8 et 32 caractères</span>', 3000)" value ="<?= $user->password ?>" />
        <label for="confirm" class="<?= isset($formError['confirm']) ? 'inputError' : '' ?>">*<?= FORM_CONFIRMPASSWORD ?></label><input type="password" name="confirm" required value="<?= $user->password ?>" />
        <label for="birthdate" class="<?= isset($formError['birthdate']) ? 'inputError' : '' ?>">*<?= FORM_DATE ?></label><input type="date" name="birthdate" required value="<?= $user->birthdate ?>" min="1900-01-01" max="<?= date('Y-m-d'); ?>" />
        <label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>">*<?= FORM_MAIL ?></label><input type="text" name="mail" id="mail" required onblur="checkMailUnique()" value="<?= $user->mail ?>" />
        <p><span id="errorCheckMailUnique"><?= ERROR_MAILUNIQUE ?></span></p>
        <div class="input-field col s12">
            <select name="colorUserNav" id="colorUserNav">
                <option value="" disabled selected><?= COLORUSERNAV ?></option>
                <option value="red"><?= FORM_COLOR_RED ?></option>
                <option value="blue"><?= FORM_COLOR_BLUE ?></option>
                <option value="green"><?= FORM_COLOR_GREEN ?></option>
                <option value="yellow"><?= FORM_COLOR_YELLOW ?></option>
                <option value="brown"><?= FORM_COLOR_BROWN ?></option>
                <option value="purple"><?= FORM_COLOR_PURPLE ?></option>
                <option value="black"><?= FORM_COLOR_BLACK ?></option>
            </select>
            <label><?= FORM_COLORUSERNAV ?></label>
        </div>
        <div class="input-field col s12">
            <select name="colorNav" id="colorNav">
                <option value="" disabled selected><?= COLORNAV ?></option>
                <option value="red"><?= FORM_COLOR_RED ?></option>
                <option value="blue"><?= FORM_COLOR_BLUE ?></option>
                <option value="green"><?= FORM_COLOR_GREEN ?></option>
                <option value="yellow"><?= FORM_COLOR_YELLOW ?></option>
                <option value="brown"><?= FORM_COLOR_BROWN ?></option>
                <option value="purple"><?= FORM_COLOR_PURPLE ?></option>
                <option value="black"><?= FORM_COLOR_BLACK ?></option>
            </select>
            <label><?= FORM_COLORNAV ?></label>
        </div>
        <input name="register" type="submit" class="waves-effect waves-light btn" value="<?= FORM_REGISTER ?>"/>
    </form>
    <p class="formValid">
        <?php if ($insertSuccess) { ?>
        <p class="black-text"><?= FORM_SUCCESS ?></p>
        <?php
    }
    ?>
</div>
<?php
include 'footer.php';
