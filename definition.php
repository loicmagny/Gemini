<?php
include 'header.php';
include 'controllers/definition-controller.php';
?>
<div class=" section white">
    <div>
        <?php foreach ($searchError as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="letterList">
                <ul class="pagination">
                    <?php foreach ($letters as $letter) {
                        ?>
                        <li><a class="waves-effect letter" href="definition.php?letter=<?= $letter ?>"><?= $letter ?></a></li>
                        <?php
                    }
                    ?></li>
                </ul>
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
                        <div class="collapsible-body">
                            <span class="flow-text"><?= $definition->description; ?></span>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
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