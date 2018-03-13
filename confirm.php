<?php
include 'header.php';
?>
<h1>Activation du compte</h1>
<?php
if ($connectSuccess) {
    if ($_SESSION['activate'] == 0) {
        ?>
        <form class="col s12" action="#" method="POST">
            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" name="login" class="validate">
                        <label for="login">Nom d'utilisateur</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="confirmCode" type="password" name="confirmCode" class="validate">
                        <label for="confirmCode">Code de confirmation</label>
                    </div>
                    <input name="confirm" id="confirm" type="submit" class="waves-effect waves-light btn-flat" value="Valider"/>
                </div>
                <?php
                foreach ($confirmError as $error) {
                    ?>
                    <p><?= $error ?></p>
                    <?php
                }
                ?>
            </div>
        </form>
    <?php } else { ?>
        <p>Votre compte est déjà activé</p>
        <?php
    }
}
include 'footer.php';
?>