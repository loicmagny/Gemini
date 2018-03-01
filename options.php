<?php
include 'header.php';
?>
<div class="section-white">
    <h2>Options</h2>
    <?php foreach ($updateError as $error) { ?>
        <p><?= $error ?></p>
    <?php } ?>
    <form action="#" method="POST" enctype="multipart/form-data">
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
        <div class="input-field col s6">
            <input id="login" name="login" type="text" class="validate">
            <label for="login">Modifier le nom d'utilisateur</label>
        </div>
        <div class="input-field col s6">
            <input id="mail" name="mail" type="text" class="validate">
            <label for="mail">Modifier l'adresse mail</label>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>Ajouter une photo de profil</span>
                <input type="file" name="file" id="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <input name="update" id="update" type="submit" class="btn waves-effect waves-light green" value="Modifier"/>
    </form>
    <div>
        <?php foreach ($updateError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
</div>
<?php
include 'footer.php';
if (isset($_POST['deconnect'])) {
    session_unset();
    session_destroy();
} else {
    session_write_close();
}
?>

