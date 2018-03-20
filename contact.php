<?php
include'header.php';
include 'controllers/contact-controller.php'
?>
<div class="section white container formOptions">
    <h1>Contacter l'administrateur</h1>
    <div>
        <?php foreach ($formError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <form action="#" method="POST">
        <input type="text" hidden class="form-control" name="authorMail" value="<?= $_SESSION['mail'] ?>" />
        <div class="input-field col s6">
            <input id="title" name="title" type="text" required class="validate">
            <label for="title">Ojbjet du message</label>
        </div>
        <div class="input-field col s6">
            <textarea id="content" class="materialize-textarea" name="content" required data-length="350"></textarea>
            <label for="content">Contenu du message</label>
        </div>
        <button type="submit" name="contact" class="btn btn-flat">Envoyer</button>
    </form>
    <p class="formValid">
        <?php if ($sendSuccess) { ?>
        <p class="black-text">Envoi réussi</p>
        <?php
    }
    ?>
</div>
<?php include'footer.php'; ?>
