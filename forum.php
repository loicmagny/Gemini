<?php
include 'header.php';
include 'controllers/forum-controller.php';
?>
<div class="section white container formOptions">
    <h1>Forum</h1>
    <table class="table table-striped table-hover center tableCommunity responsive-table">
        <thead>
            <tr>
                <th>Nom du topic</th>
                <th>Créateur</th>
                <th>Date</th>
                <th><a class="btn tooltipped btn-flat" data-position="bottom" data-delay="50" data-tooltip="Créer un topic" href="add-topic.php"><i class="material-icons">add_circle</i></a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topicsList as $topics) { ?>
                <tr class="success center tableCommunity">
                    <td><a href="topic.php?topic=<?= $topics->id ?>&name=<?= $topics->topic ?>"> <?= $topics->topic ?> </a></td>
                    <td><?= $topics->login ?></td>
                    <td><?= $topics->DATE ?></td>
                    <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) { ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="text" hidden name="topic_id" value="<?= $topics->id ?>"/>
                    <td><button type="submit" name="delete" class="btn-flat tooltipped waves" data-position="right" data-delay="50" data-tooltip="Supprimer le topic" ><i class="material-icons">delete_forever</i></button></td>
                </form>
            <?php } ?>
            </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
<?php
include 'footer.php';

if (isset($_POST['deconnect'])) {
    session_unset();
    session_destroy();
} else {
    session_write_close();
}
?>

