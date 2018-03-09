<?php
include 'header.php';
include 'controllers/search-controller.php';
?>
<div class="section white">
    <div class="row container">
        <div class="col s12 m12 s12 center">
            <div class="searchResult">
                <?php
                if (isset($_POST['searchComponent'])) {
                    ?>
                    <div class="card center">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?= $componentList->componentsname ?><i class="material-icons right">more_vert</i></span>
                            <p><?= $componentList->type; ?></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $componentList->componentsname ?><i class="material-icons right">close</i></span>
                            <p class="flow-text"><?= $componentList->description; ?></p>
                        </div>
                    </div>
                    <?php
                } else if (isset($_POST['searchProduct'])) {
                    ?>
                    <div class="card center">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?= $productList->productname ?><i class="material-icons right">more_vert</i></span>
                            <p><?= $productList->brand; ?></p>
                            <p><?= $productList->type; ?></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $productList->productname ?><i class="material-icons right">close</i></span>
                            <p class="flow-text"><?= $productList->description; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
