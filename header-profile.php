<?php
include 'controllers/historic-controller.php';
?>
<div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large pulse userToolbar <?= $_SESSION['colorUserNav']; ?>" >
        <i class="material-icons">account_circle</i>
    </a>
    <ul>
        <li class="black-text center hoverable"><a href="profile.php">Profil</a></li>
        <li class="black-text center hoverable"><a href="historic.php">Historique</a></li>
        <li class="black-text center hoverable"><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
</div>
