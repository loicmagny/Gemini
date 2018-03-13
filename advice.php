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
            <?php // foreach ($adviceList as $advice) { ?>
                <tr class="success center tableCommunity">
                    <td><a href="advice-content.php?advice=<?= $advice->id ?>"><?= $advice->title; ?></a></td>
                    <td><?= $advice->author; ?></td>
                    <td><?= $advice->date; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php'
?>
