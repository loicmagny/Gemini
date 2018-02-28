<?php
include 'header.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="card">
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab"><a class="active" href="#infos">Infos</a></li>
            </ul>
        </div>
        <div id="infos">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="<?= $_SESSION['profilePic']; ?>" class="responsive-img center profilePic" /></li>
                <li class="list-group-item"><?= $_SESSION['login']; ?></li>
                <li class="list-group-item">Date de naissance: <?= $userAge ?></li>
                <li class="list-group-item">Adresse mail: <?= $_SESSION['mail']; ?></li>
            </ul>
        </div>
    </div>
<?php } else {
    ?><p>Vous n'êtes pas connecté. <a href="register.php">Inscrivez-vous</a> ou <a data-toggle="modal" href="connection.php" data-target="#myModal">connectez-vous</a></p>
<?php } ?>
<?php
include 'footer.php';
?>

