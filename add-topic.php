<?php
include 'header.php';
include 'controllers/add-topic-controller.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="section white container formOptions">
        <h1>Créer un topic</h1>
        <form action="#" method="POST">
            <input type="datetime" hidden class="form-control" name="date" value="<?= date('Y-m-d H:i:s'); ?>" />
            <div class="input-field col s6">
                <input id="topic" name="topic" type="text" required class="validate">
                <label for="topic">Sujet</label>
            </div>
            <div class="input-field col s6">
                <textarea id="post" class="materialize-textarea " name="post" data-length="300"></textarea>
                <label for="textarea1">Contenu</label>
            </div>
            <input type="text" hidden class="form-control" name="id_author" value="<?= $_SESSION['id'] ?>" />
            <button type="submit" name="submit" class="btn btn-primary">Créer le topic</button>
        </form>
    </div>
    <?php
} else {
    ?>
    <p>Vous devez être connecté pour créer un topic sur le forum. <a class="modal-trigger" href="#modalConnect">Connectez-vous</a> ou <a href="register.php">inscrivez-vous</a> si vous souhaitez créer un topic.</p>
    <?php
}
include 'footer.php';
?>
