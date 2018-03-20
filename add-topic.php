<?php
include 'header.php';
include 'controllers/forum-controller.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="section white container formOptions">
        <h1>Créer un topic</h1>
        <form action="#" method="POST">
            <input type="date" hidden class="form-control" name="date" value="<?= date('Y-m-d'); ?>" />
            <div class="input-field col s6">
                <input id="topic" name="topic" type="text" required class="validate">
                <label for="topic">Sujet</label>
            </div>
            <input type="text" hidden class="form-control" name="loginAuthor" value="<?= $_SESSION['login'] ?>" />
            <button type="submit" name="submit" class="btn btn-primary">Créer le topic</button>
        </form>
    </div>
    <?php
} else {
    ?>
    <p>Vous devez être connecté pour créer un topic sur le sujet. <a href="connection.php">Connectez-vous</a> ou <a href="register.php">inscrivez-vous</a> si vous souhaitez créer un topic.</p>
<?php
}
include 'footer.php';
?>
