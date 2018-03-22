<?php
include'header.php';
include 'controllers/add-advice-controller.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="section white container formOptions">
        <h1>Ajouter un conseil</h1>
        <form action="#" method="POST">
            <input type="datetime" hidden class="form-control" name="date" value="<?= date('Y-m-d H:i'); ?>" />
            <input type="text" hidden class="form-control" name="id_author" value="<?= $_SESSION['id']; ?>" />
            <div class="input-field col s6">
                <input id="title" type="text" name="title" required class="validate">
                <label for="title">Titre</label>
            </div>
            <div class="input-field col s12">
                <textarea id="content" name="content" required class="materialize-textarea"></textarea>
                <label for="content">Contenu</label>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Publier le conseil" />
        </form>
    </div>
    <?php
} else {
    ?>
    <p>Vous devez être connecté pour créer un topic sur le sujet. <a class="modal-trigger" href="#modalConnect">Connectez-vous</a> ou <a href="register.php">inscrivez-vous</a> si vous souhaitez créer un topic.</p>
    <?php
}include 'footer.php';
?>