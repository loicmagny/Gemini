<?php
include 'header.php';
include 'controllers/definition-controller.php';
?>
<div class="row">
    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1">
            <?php foreach ($letters as $tabs) {
                ?>
                <li class="tab"><a href="#" ><?= $tabs ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="section white">
    <div class="row container">
        <?php
        foreach ($definitionList as $definition) {
            ?>
            <div id="definition" class="col s12 black-text def">
                <a href="definition.php?letter=<?= $definition->id ?>"><?= $definition->defname ?></a>
            </div>
            <?php
        }
        ?>
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

