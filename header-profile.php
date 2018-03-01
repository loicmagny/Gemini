<?php
include 'controllers/historic-controller.php';
?>
<div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large userToolbar <?= $_SESSION['colorUserNav']; ?>" >
        <?php if (empty($_SESSION['profilePic'])) { ?>
            <i class="material-icons">account_circle</i>
        <?php } else { ?>
            <img src="<?= $_SESSION['profilePic']; ?>" alt="photo de profil" class="circle responsive-img toolbarPic"/>
        <?php } ?>
    </a>
    <ul>
        <li class="black-text center hoverable"><a href="profile.php">Profil</a></li>
        <li class="black-text center hoverable"><a href="options.php">Options</a></li>
        <li class="black-text center hoverable"><a href="historic.php">Historique</a></li>
        <li class="black-text center hoverable"><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
</div>
