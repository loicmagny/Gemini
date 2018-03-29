<?php
include 'header.php';

include 'controllers/options-controller.php';
if (isset($_SESSION['connect'])) {
    ?><div class="section white container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab"><a class="active" href="#infos">Infos</a></li>
                    <li class="tab"><a href="#options">options</a></li>
                </ul>
            </div>
            <div id="infos" class="col s12">
                <p><img src="<?= $_SESSION['profilePic']; ?>" class="responsive-img center profilePic" /></p>
                <p><?= $_SESSION['login']; ?></p>
                <p>Date de naissance: <?= $_SESSION['birthdate'] ?></p>
                <p>Adresse mail: <?= $_SESSION['mail']; ?></p>
            </div>
            <div id="options" class="col s12">
                <?php foreach ($updateError as $error) { ?>
                    <p><?= $error ?></p>
                <?php } ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
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
                        <div class="input-field col s6">
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
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="login" name="login" type="text" class="validate">
                            <input id="id_user" hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
                            <label for="login">Modifier le nom d'utilisateur</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="mail" name="mail" type="text" class="validate">
                            <label for="mail">Modifier l'adresse mail</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s6 offset-m3">
                            <div class="btn">
                                <span>Ajouter une photo de profil</span>
                                <input type="file" name="file" id="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <input name="update" id="update" type="submit" class="btn waves-effect waves-light green" value="Modifier"/>
                            <a id="delete" href="#modalDeactivate" class="btn waves-effect waves-light red modal-trigger">Supprimer mon compte</a>
                        </div>
                </form>
            </div>
            <div>
                <?php foreach ($updateError as $error) { ?>
                    <p><?= $error ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <div id="modalDeactivate" class="modal">
        <div class="modal-content">
            <p>Entrez votre mot de passe pour valider l'opération</p>
            <form action="#" method="POST">
                <label for="password" class="<?= isset($formError['password']) ? 'inputError' : '' ?>"> Mot de passe :  </label><input type="password" name="deletionPassword" required value ="<?= $user->password ?>" />
                <input name="delete" id="delete" type="submit" class="btn-flat waves-effect waves-light red" value="Supprimer mon compte"/>
            </form>
        </div>
    </div>
<?php } else {
    ?><div class="section white container formOptions">
        <p>Vous n'êtes pas connecté. <a href="register.php">Inscrivez-vous</a> ou <a data-toggle="modal" href="connection.php" data-target="#myModal">connectez-vous</a></p>
    </div>
<?php } ?>
<?php
include 'footer.php';
?>

