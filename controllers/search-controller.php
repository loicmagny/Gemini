<?php

$componentSearch = false;
$formError = array();
// on instancie les classe components(), historic(), products()
$component = new components();
$historic = new historic();
$product = new products();
$productSearch = false;
if (isset($_POST['searchComponent'])) { // Si on cherche un composant
    if (isset($_POST['componentName'])) {
        $component->componentsname = htmlspecialchars($_POST['componentName']); //On attribue les valeurs des input aux attributs de la classe components permettant d'effectuer la recherche
    }
    if (isset($_POST['componentType'])) {
        $component->type = strip_tags($_POST['componentType']);
    }
    $componentList = $component->componentSearch(); //On appelle la méthode qui permet d'effectuer la recherche
    $historic->id_components = $componentList->id;
    if (!$componentList) {
        $formError['submitComponent'] = 'Erreur lors de la recherche, il nous manque certainement quelques informations';
    } else {
        $componentSearch = true;
        if ($componentSearch) {//Si la recherche à eu lieu
            $historic->id_user = $_SESSION['id'];
            $addInHistoric = $historic->AddInHistoric(); // On appelle la méthode qui permet d'ajouter la recherche à l'historique
        } else {//Si la recherche n'a pas eu lieu on affiche un message d'erreur
            $formError['error'] = 'Une erreur est survenue, veuillez réessayer';
        }
    }
} else if (isset($_POST['searchProduct'])) {
    if (isset($_POST['productName'])) {
        $product->productname = strip_tags($_POST['productName']); //On attribue les valeurs des input aux attributs de la classe products permettant d'effectuer la recherche
    }
    if (isset($_POST['productType'])) {
        $product->type = strip_tags($_POST['productType']);
    }
    if (isset($_POST['productBrand'])) {
        $product->brand = strip_tags($_POST['productBrand']);
    }
    $productList = $product->productSearch(); //On appelle la méthode qui permet d'effectuer la recherche
    if (!$productList) {
        $formError['submitProduct'] = 'Erreur lors de la recherche, il nous manque certainement quelques informations';
    } else {
        $productSearch = true;
        if ($productSearch) {//Si la recherche à lieu
            $historic->id_products = $productList->id;
            $historic->id_user = $_SESSION['id'];
            $addInHistoric = $historic->AddInHistoric(); // On appelle la méthode qui permet d'ajouter la recherche à l'historique
        } else {
            $formError['error'] = 'Une erreur est survenue, veuillez réessayer';
        }
    }
}

    