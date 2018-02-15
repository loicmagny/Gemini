<?php
include 'header.php';
include 'controllers/add-topic-controller.php';
?>
<div class="section white">
    <h1>Créer un topic</h1>
    <form action="#" method="POST">
        <input type="date" hidden class="form-control" name="date" value="<?= date('Y-m-d'); ?>" />
        <div class="input-field col s6">
            <input id="topic" name="topic" type="text" class="validate">
            <label for="topic">Sujet</label>
        </div>
        <input type="text" hidden class="form-control" name="makerid" value="<?= $_SESSION['id'] ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Créer le topic</button>
    </form>
</div>
<?php
include 'footer.php';
?>
