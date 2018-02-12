<?php

$componentSearch = false;
$formError = array();
$component = new components();
if (isset($_POST['searchComponent'])) {
    if (isset($_POST['componentName'])) {
        $component->componentsname = strip_tags($_POST['componentName']);
    }
    if (isset($_POST['componentType'])) {
        $component->type = strip_tags($_POST['componentType']);
    }
    $componentList = $component->componentSearch();
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$componentList) {
        $formError['submitComponent'] = 'Erreur lors de la recherche';
    } else {
        $componentSearch = true;
        $component->componentsname = '';
        $component->type = '';
    }
}

$product = new products();
$productSearch = false;
if (isset($_POST['searchProduct'])) {
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
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$productList) {
        $formError['submitProduct'] = 'Erreur lors de la recherche';
    } else {
        $productSearch = true;
        $product->productname = '';
        $product->type = '';
        $product->brand = '';
    }
}

    