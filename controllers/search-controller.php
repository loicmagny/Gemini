<?php

$componentSearch = false;
$formError = array();
$component = new components();
$historic = new historic();
$product = new products();
$productSearch = false;
if (isset($_POST['searchComponent'])) {
    if (isset($_POST['componentName'])) {
        $component->componentsname = strip_tags($_POST['componentName']);
    }
    if (isset($_POST['componentType'])) {
        $component->type = strip_tags($_POST['componentType']);
    }
    $componentList = $component->componentSearch();
    $historic->id_components = $componentList->id;
    if (!$componentList) {
        $formError['submitComponent'] = 'Erreur lors de la recherche';
    } else {
        $componentSearch = true;
        $historic->id_user = $_SESSION['id'];
        $addInHistoric = $historic->AddInHistoric();
    }
} else if (isset($_POST['searchProduct'])) {
    if (isset($_POST['productName'])) {
        $product->productname = strip_tags($_POST['productName']);
    }
    if (isset($_POST['productType'])) {
        $product->type = strip_tags($_POST['productType']);
    }
    if (isset($_POST['productBrand'])) {
        $product->brand = strip_tags($_POST['productBrand']);
    }
    $productList = $product->productSearch();
    $historic->id_products = $productList->id;
    if (!$productList) {
        $formError['submitProduct'] = 'Erreur lors de la recherche';
    } else {
        $productSearch = true;
        $historic->id_user = $_SESSION['id'];
        $addInHistoric = $historic->AddInHistoric();
    }
}

    