<?php
include 'header.php';
include 'controllers/search-settings-controller.php';
?>
<div class="section white container formOptions">
    <h1>Administration de la recherche</h1>
    <h2>Marques et Produits</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div>
            <?php foreach ($formError as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="brand" name="brand" type="text" class="validate">
                <input id="id_user" hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
                <label for="brand">Ajouter une marque</label>
            </div>
            <div class="input-field col s6">
                <input id="type" name="type" type="text" class="validate">
                <label for="type">Ajouter un type</label>
            </div>
            <input type="submit" name="addBrandType" class="btn hoverable green waves black-text" value="Ajouter"/>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <select name="selectTypes" id="typeList">
                    <option value="" disabled selected>Choississez le type</option>
                    <?php foreach ($typeList as $types) { ?>
                        <option value="<?= $types->id; ?>" ><?= $types->type ?></option>
                    <?php } ?>
                </select>
                <label>Liste des types</label>
            </div>
            <div class="input-field col s4" >
                <input name="newType" id="newType" type="text" class="validate">
                <label for="newType">Modifier le nom du type</label>
            </div>
            <div class="input-field col s4">
                <input type="submit" class="btn waves hoverable yellow black-text" name="updateTypes" value="Modifier"/>
                <input type="submit" class="btn waves hoverable red black-text" name="deleteTypes"  value="Supprimer"/>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <select name="selectBrands" id="brandList">
                    <option value="" disabled selected>Choississez la marque</option>
                    <?php foreach ($brandList as $brands) { ?>
                        <option value="<?= $brands->id; ?>"><?= $brands->brand ?></option>
                    <?php } ?>
                </select>
                <label>Liste des marques</label>
            </div>
            <div class="input-field col s4" >
                <input  name="newBrand" id="newBrand" type="text" class="validate">
                <label for="newBrand">Modifier le nom de la marque</label>
            </div>
            <div class="input-field col s4">
                <input type="submit" class="btn waves hoverable yellow black-text" name="updateBrand" value="Modifier" />
                <input type="submit" class="btn waves hoverable red black-text" name="deleteBrand" value="Supprimer" />
            </div>
        </div>
    </form>
    <h2>Produits</h2>
    <form class="col s12" method="POST" action="#">
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <select name="productList" id="productList">
                        <option <?= isset($_POST['updateProduct']) ? 'value="' . $productInfo->id . '" selected>' . $productInfo->name . '' : 'value="" disabled selected>Choississez le produit' ?></option>
                        <?php foreach ($productList as $products) { ?>
                            <option value="<?= $products->id; ?>" ><?= $products->name ?></option>
                        <?php } ?>
                    </select>
                    <label>Liste des produits</label>
                </div>
                <?php if (isset($_POST['updateProduct'])) { ?>
                    <div class="input-field col s6">
                        <input id="id_user" hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
                        <input name="productName" type="text" class="validate" value="<?= $productInfo->name ?>">
                        <label for="productName">Nom du produit</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="productDescription" class="materialize-textarea"><?= $productInfo->description ?></textarea>
                        <label for="productDescription">Descripton du produit</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3">
                        <select name="selectBrandProduct">
                            <option value="" disabled>Choississez la marque</option>
                            <option value="<?= $productInfo->id_brand ?>"  selected><?= $productInfo->brand ?></option>
                            <?php foreach ($brandList as $brands) { ?>
                                <option value="<?= $brands->id; ?>"><?= $brands->brand ?></option>
                            <?php } ?>
                        </select>
                        <label>Liste des marques</label>
                    </div>
                    <div class="input-field col s3">
                        <select name="selectTypeProduct">
                            <option value="" disabled selected>Choississez le type</option>
                            <option value="<?= $productInfo->id_type ?>" selected><?= $productInfo->type ?></option>
                            <?php foreach ($typeList as $types) { ?>
                                <option value="<?= $types->id; ?>" ><?= $types->type ?></option>
                            <?php } ?>
                        </select>
                        <label>Liste des types</label>
                    </div>
                </div>
            <?php } else if (!isset($_POST['productList']) || isset($_POST['deleteProduct'])) { ?>
                <div class="input-field col s6">
                    <input hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
                    <input name="productName" type="text" class="validate">
                    <label for="productName">Nom du produit</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="productDescription" class="materialize-textarea"></textarea>
                    <label for="productDescription">Descripton du produit</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="selectBrandProduct">
                        <option value="" disabled selected>Choississez la marque</option>
                        <?php foreach ($brandList as $brands) { ?>
                            <option value="<?= $brands->id; ?>"><?= $brands->brand ?></option>
                        <?php } ?>
                    </select>
                    <label>Liste des marques</label>
                </div>
                <div class="input-field col s6">
                    <select name="selectTypeProduct">
                        <option value="" disabled selected>Choississez le type</option>
                        <?php foreach ($typeList as $types) { ?>
                            <option value="<?= $types->id; ?>" ><?= $types->type ?></option>
                        <?php } ?>
                    </select>
                    <label>Liste des types</label>
                </div>
            </div>
        <?php } ?>
        <div class="input-field col s12">
            <input type="submit" class="btn hoverable green waves black-text" name="addProduct" value="Ajouter"/>
            <input type="submit" class="btn waves hoverable yellow black-text" name="updateProduct" value="Modifier" />
            <input type="submit" class="btn waves hoverable red black-text" name="deleteProduct" value="Supprimer" />
        </div>
</div>
</form>
<h2>Composants</h2>
<form class="col s12" method="POST" action="#">
    <div class="row">
        <div class="input-field col s6">
            <select name="componentList">
                <option <?= isset($_POST['updateComponent']) ? 'value="' . $componentInfo->id . '" selected>' . $componentInfo->name . '' : 'value="" disabled selected>Choississez le composant' ?></option>
                <?php foreach ($componentList as $components) { ?>
                    <option value="<?= $components->id; ?>" ><?= $components->name ?></option>
                <?php } ?>
            </select>
            <label>Liste des composants</label>
        </div>
        <?php if (isset($_POST['updateComponent'])) { ?>
            <div class="input-field col s6">
                <input id="id_user" hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
                <input name="componentName" type="text" class="validate" value="<?= $componentInfo->name ?>">
                <label for="componentName">Nom du produit</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="componentDescription" class="materialize-textarea"><?= $componentInfo->description ?></textarea>
                <label for="componentDescription">Descripton du produit</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s3">
                <select name="selectProductComponent">
                    <option value="" disabled>Choississez le produit</option>
                    <option <?= isset($_POST['updateComponent']) ? 'value="' . $componentInfo->id . '" selected>' . $componentInfo->product_name . '' : 'value="" disabled selected>Choississez le produit' ?></option>
                    <?php foreach ($productList as $products) { ?>
                        <option value="<?= $products->id; ?>"><?= $products->name ?></option>
                    <?php } ?>
                </select>
                <label>Liste des produits</label>
            </div>
            <div class="input-field col s3">
                <select name="selectTypeComponent">
                    <option value="" disabled selected>Choississez le type</option>
                    <option value="<?= $componentInfo->id_type ?>" selected><?= $componentInfo->type ?></option>
                    <?php foreach ($typeList as $types) { ?>
                        <option value="<?= $types->id; ?>" ><?= $types->type ?></option>
                    <?php } ?>
                </select>
                <label>Liste des types</label>
            </div>
        </div>
    <?php } else if (!isset($_POST['componentList']) || isset($_POST['deleteComponent'])) { ?>
        <div class="input-field col s6">
            <input hidden name="id_user" type="text" class="validate" value="<?= $_SESSION['id']; ?>">
            <input name="componentName" type="text" class="validate">
            <label for="componentName">Nom du produit</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <textarea name="componentDescription" class="materialize-textarea"></textarea>
            <label for="componentDescription">Descripton du produit</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <select name="selectProductComponent">
                <option <?= isset($_POST['updateComponent']) ? 'value="' . $componentInfo->id . '" selected>' . $componentInfo->name . '' : 'value="" disabled selected>Choississez le produit' ?></option>
                <?php foreach ($productList as $products) { ?>
                    <option value="<?= $products->id; ?>" ><?= $products->name ?></option>
                <?php } ?>
            </select>
            <label>Liste des produits</label>
        </div>
        <div class="input-field col s6">
            <select name="selectTypeComponent">
                <option value="" disabled selected>Choississez le type</option>
                <?php foreach ($typeList as $types) { ?>
                    <option value="<?= $types->id; ?>" ><?= $types->type ?></option>
                <?php } ?>
            </select>
            <label>Liste des types</label>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="input-field col s12">
        <input type="submit" class="btn hoverable green waves black-text" name="addComponent" value="Ajouter"/>
        <input type="submit" class="btn waves hoverable yellow black-text" name="updateComponent" value="Modifier" />
        <input type="submit" class="btn waves hoverable red black-text" name="deleteComponent" value="Supprimer" />
    </div>
</div>
</form>
</div>
<?php include 'footer.php'; ?>
