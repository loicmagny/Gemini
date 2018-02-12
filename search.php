<?php
include 'header.php';
include 'controllers/search-controller.php';
?>
<div class="section white">
    <div class="row container">
        <h2 class="display-3">Rechercher un composant</h2>
        <form class="form-horizontal" method="POST" action="#">
            <div class="input-field col s6">
                <input id="last_name" type="text" name="componentName" class="validate">
                <label for="componentName">Nom du composant</label>
            </div>
            <div class="input-field col s12">
                <select multiple name="componentType">
                    <option disabled>Sélectionnez</option>
                    <option value="1">Produit alimentaire</option>
                    <option value="2"> Produit cosmétique</option>
                    <option value="3">Produit d'hygiène</option>
                    <option value="4">Produit de lessive</option>
                    <option value="5">Produit médical</option>
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
        <form class="form-horizontal" action="#" method="POST">
            <div class="input-field col s6">
                <input id="last_name" type="text" name="productName" class="validate">
                <label for="productName">Nom du produit</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" name="productBrand" class="validate">
                <label for="productBrand">Marque</label>
            </div>
            <div class="input-field col s12">
                <select name="productType" multiple>
                    <option value="" disabled>Sélectionnez</option>
                    <option value="1">Produit alimentaire</option>
                    <option value="2"> Produit cosmétique</option>
                    <option value="3">Produit d'hygiène</option>
                    <option value="4">Produit de lessive</option>
                    <option value="5">Produit médical</option>
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

