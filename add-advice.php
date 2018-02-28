<?php
include'header.php';
include 'controllers/advice-controller.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="section white">
        <h1>Ajouter un conseil</h1>
        <form action="#" method="POST">
            <input type="date" hidden class="form-control" name="date" value="<?= date('Y-m-d'); ?>" />
            <div class="input-field col s6">
                <input id="title" type="text" name="title" class="validate">
                <label for="title">Titre</label>
            </div>
            <div class="input-field col s12">
                <textarea id="content" name="content" class="materialize-textarea"></textarea>
                <label for="content">Contenu</label>
            </div>
            <input type="text" hidden class="form-control" name="loginAuthor" value="<?= $_SESSION['login'] ?>" />
            <button type="submit" name="submit" class="btn btn-primary">Ajouter l'article</button>
        </form>
    </div>
    <?php
} else {
    ?>
    <p>Vous devez être connecté pour créer un topic sur le sujet. <a href="connection.php">Connectez-vous</a> ou <a href="register.php">inscrivez-vous</a> si vous souhaitez créer un topic.</p>
    <?php
}include 'footer.php';
?>