<?php
include'header.php';
include'controllers/add-article-controller.php';
if (isset($_SESSION['connect']) && $_SESSION['admin'] == 1) {
    ?>
    <div class="section white container formOptions">
        <h1>Publier un article</h1>
        <div>
            <?php foreach ($formError as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
        <form action="#" method="POST">
            <input type="date" hidden class="form-control" name="date" value="<?= date('Y-m-d'); ?>" />
            <input type="text" hidden class="form-control" name="author" value="<?= $_SESSION['login'] ?>" />
            <input type="text" hidden class="form-control" name="id_author" value="<?= $_SESSION['id'] ?>" />
            <input type="text" hidden class="form-control" name="authorPic" value="<?= $_SESSION['profilePic'] ?>" />
            <div class="input-field col s6">
                <input id="title" name="title" type="text" class="validate">
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s6">
                <textarea id="content" class="materialize-textarea" name="content" data-length="350"></textarea>
                <label for="content">Contenu de l'article</label>
            </div>
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
<p>Il vous faut certains droit pour publier un article sur le site, contactez l'administrateur <a href="contact.php">ici</a> si vous souhaitez publier un article</p>
    <?php
} include 'footer.php';
?>