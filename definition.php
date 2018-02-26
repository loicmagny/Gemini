<?php
include 'header.php';
include 'controllers/definition-controller.php';
?>
<div>
    <?php foreach ($searchError as $error) { ?>
        <p><?= $error ?></p>
    <?php } ?>
</div>
<div class="row">
    <div class="col s12">
        <div class="letterList">
            <?php foreach ($letters as $letter) {
                ?>
                <a class="btn-floating letter hoverable" href="definition.php?letter=<?= $letter ?>" ><?= $letter ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="section white">
    <div class="row container">
        <ul class="collapsible popout" data-collapsible="accordion">
            <?php
            foreach ($definitionList as $definition) {
                ?>
                <li>
                    <div class="collapsible-header hoverable"><i class="material-icons">filter_drama</i><?= $definition->defname; ?></div>
                    <div class="collapsible-body"><span><?= $definition->description; ?></span></div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
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

