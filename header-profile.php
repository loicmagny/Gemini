<?php
include 'models/historic-model.php';
include 'controllers/connection-controller.php';
include 'controllers/historic-controller.php';
?>
<div class="row">
    <div class="col s12 m4 l3">
        <ul id="slide-out" class="side-nav">
            <li><div class="user-view">
                    <img class="circle responsive-img center profilePic" src="<?= $_SESSION['profilePic']; ?>" alt="photo de profil">
                    <li class="divider"></li>
                    <li class="black-text name center"><?= $_SESSION['login']; ?></li>
                    <li class="black-text email center"><?= $_SESSION['mail']; ?></li>
                    <li class="divider"></li>
                    <li class="black-text email center"><a href="profile.php">Voir le profil</a></li>
            </li>
            <div class="row line">
                <a href="options.php" class="btn tooltipped btn-flat"data-position="left" data-delay="50" data-tooltip="Options"><i class="material-icons md-36 dark settings">settings</i></a>
                <a href="deconnexion.php" class="btn tooltipped btn-flat"data-position="bottom" data-delay="10" data-tooltip="Se déconnecter"><i class = "material-icons">delete</i></a>
            </div>
        </ul>
    </div>
</div>
<a href="#" data-activates="slide-out" class="button-collapse btn-floating btn-large btn-flat pulse left valign-wrapper"><i class="material-icons">menu</i></a>
