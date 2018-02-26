<?php
include 'header.php';
?>
<?php
if (isset($_SESSION['connect'])) {
    ?>
    <div class="card">
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab"><a class="active" href="#infos">Infos</a></li>
                <li class="tab"><a href="#recentSearch">Recherche récente</a></li>
                <li class="tab"><a href="#topic">Derniers topic visités</a></li>
            </ul>
        </div>
        <div id="infos">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><img src="<?= $_SESSION['profilePic']; ?>" class="responsive-img center profilePic" /></li>
                <li class="list-group-item"><?= $_SESSION['login']; ?></li>
                <li class="list-group-item">Date de naissance: <?= $_SESSION['birthdate']; ?></li>
                <li class="list-group-item">Adresse mail: <?= $_SESSION['mail']; ?></li>
            </ul>
        </div>
        <div id="recentSearch">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Recherche 1</li>
                <li class="list-group-item">Recherche 2</li>
                <li class="list-group-item">Recherche 3</li>
            </ul>
        </div>
        <div id="topic">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Topic 1</li>
                <li class="list-group-item">Topic 2</li>
                <li class="list-group-item">Topic 3</li>
            </ul>
        </div>
    </div>

    <?php
} else {
    ?><p>Vous n'êtes pas connecté. <a href="register.php">Inscrivez-vous</a> ou <a data-toggle="modal" href="connection.php" data-target="#myModal">connectez-vous</a></p>
<?php }
?>

<?php
include 'footer.php';
?>

