<?php
include 'header.php';
include 'controllers/advice-controller.php';
?>
<div class="section white container formOptions">
    <h1>Conseils</h1>
    <table class="table table-striped table-hover center tableCommunity">
        <thead>
            <tr>
                <th>Sujet</th>
                <th>Créateur</th>
                <th>Date</th>
                <th><a class="btn tooltipped btn-flat" data-position="bottom" data-delay="50" data-tooltip="Ajouter un conseil" href="add-advice.php"><i class="material-icons">add_circle</i></a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipsList as $tips) { ?>
                <tr class="success center tableCommunity">
                    <td><a href="advice-content.php?tips=<?= $tips->id ?>"><?= $tips->title; ?></a></td>
                    <td><?= $tips->login; ?></td>
                    <td><?= $tips->DATE; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php'
?>
