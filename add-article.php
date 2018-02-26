<?php
include'header.php';
include'controllers/add-article-controller.php';
if (isset($_SESSION['connect'])) {
    ?>
    <div class="section white">
        <h1>Publier un article</h1>
        <div>
            <?php foreach ($formError as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
        <form action="#" method="POST">
            <input type="date" hidden class="form-control" name="date" value="<?= date('Y-m-d'); ?>" />
            <div class="input-field col s6">
                <input id="title" name="title" type="text" class="validate">
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s6">
                <textarea id="content" class="materialize-textarea" name="content" data-length="350"></textarea>
                <label for="content">Contenu de l'article</label>
            </div>
            <input type="text" hidden class="form-control" name="makerid" value="<?= $_SESSION['login'] ?>" />
            <button type="submit" name="submit" class="btn btn-flat">Créer le topic</button>
        </form>
        <p class="formValid">
            <?php if ($insertSuccess) { ?>
            <p class="black-text">Envoi réussi</p>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    ?>
    <p>Il vous faut certains droit pour publier un article sur le site <a href="connection.php">Connectez-vous</a> ou <a href="register.php">inscrivez-vous</a> si vous souhaitez publier un article</p>
    <?php
} include 'footer.php';
?>