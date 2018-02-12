<?php
include 'header.php';
?>
<div class="section white">
    <div class="row">
        <form class="col s12" action="#" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <input id="login" type="text" name="login" class="validate">
                    <label for="login">Nom d'utilisateur</label>
                </div>
                <div class="input-field col s6">
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Mot de passe</label>
                </div>
                <input name="connect" type="submit" class="waves-effect waves-light btn" value="Valider"/>
            </div>  
            <?php
            foreach ($formError as $error) {
                ?>
                <p><?= $error ?></p>
                <?php
            }
            ?>
        </form>
    </div>
</div>
<?php
include 'footer.php';
