<?php
include 'header.php';
include 'controllers/search-controller.php';
?>
<div class="section white">
    <div class="row container">
        <h1 class="display-3">Rechercher un composant</h1>
        <form class="form-horizontal" method="POST" action="search-result.php">
            <?php if (isset($_SESSION['role']) == 1 || isset($_SESSION['role']) == 2) { ?>
                <a href="search-settings.php" class="btn-flat tooltipped waves" data-position="right" data-delay="50" data-tooltip="Réglagles"><i class="material-icons">settings</i></a>
            <?php } ?>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="componentName" class="validate">
                <label for="componentName">Nom du composant</label>
            </div>
            <div class="input-field col s12">
                <select multiple name="componentType">
                    <option disabled>Sélectionnez</option>
                    <option value="Composant alimentaire">Composant alimentaire</option>
                    <option value="Composant cosmétique"> Composant cosmétique</option>
                    <option value="Composant d'hygiène">Composant d'hygiène</option>
                    <option value="Composant de lessive">Composant de lessive</option>
                    <option value="Composant médical">Composant médical</option>
                </select>
                <label for="componentType">Type de prduit</label>
            </div>
            <div class="row">
                <div class="col s6">
                    <button class="btn waves-effect waves-light" type="reset" name="action">Annuler</button>
                </div>
                <div class="col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="searchComponent">Chercher</button>
                </div>
            </div>
        </form>
        <div>
            <?php
            if (isset($_POST['searchComponent'])) {
                foreach ($formError as $error) {
                    ?>
                    <p><?= $error ?></p>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="https://wallpaperscraft.com/image/road_winter_trees_turn_118645_1920x1080.jpg"></div>
</div>
<div class="section white">
    <div class="row container">
        <h2 class="display-3">Rechercher un produit</h2>
        <form class="form-horizontal" action="search-result.php" method="POST">
            <div class="input-field col s6">
                <input id="last_name" type="text" name="productName" class="validate">
                <label for="productName">Nom du produit</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="productBrand" class="validate">
                <label for="productBrand">Marque</label>
            </div>
            <div class="input-field col s12">
                <select name="productType">
                    <option disabled>Vous pouvez le trouver dans..</option>
                    <option value="Produit alimentaire">Produit alimentaire</option>
                    <option value="Produit cosmétique"> Produit cosmétique</option>
                    <option value="Produit d'hygiène">Produit d'hygiène</option>
                    <option value="Produit de lessive">Produit de lessive</option>
                    <option value="Produit médical">Produit médical</option>
                </select>
                <label name="productType">Type de prduit</label>
            </div>
            <div class="row">
                <div class="col s6">
                    <button class="btn waves-effect waves-light" type="reset" name="action">Annuler</button>
                </div>
                <div class="col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="searchProduct">Chercher</button>
                </div>
            </div>
        </form>
        <div>
            <?php
            if (isset($_POST['searchProduct'])) {
                foreach ($formError as $error) {
                    ?>
                    <p><?= $error ?></p>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="http://avante.biz/wp-content/uploads/Colombia-Wallpapers/Colombia-Wallpapers-058.jpg"></div>
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

