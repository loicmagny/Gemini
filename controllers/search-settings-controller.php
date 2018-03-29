<?php

$typeAdded = false;
$brandAdded = false;
$formError = array();
$brand = new brand();
$brandList = $brand->getAllBrands();
$type = new type();
$typeList = $type->getAllTypes();
$product = new products();
$productList = $product->getAllProducts();
$component = new components();
$componentList = $component->getAllComponents();
if (isset($_POST['addBrandType'])) {
    if (!empty($_POST['type'])) {
        $type->type = htmlspecialchars($_POST['type']);
        if (!$type->addType()) {
            $formError['addingFailed'] = 'L\'ajout a échoué, veuillez recommencer';
        } else {
            $typeAdded = true;
        }
    } else if (empty($_POST['type'])) {
        $type->type = '';
    }

    if (!empty($_POST['brand'])) {
        $brand->brand = htmlspecialchars($_POST['brand']);
        $brand->id_user = htmlspecialchars($_POST['id_user']);
        if (!$brand->addBrand()) {
            $formError['addingFailed'] = 'L\'ajout a échoué, veuillez recommencer';
        } else {
            $brandAdded = true;
        }
    } else if (empty($_POST['brand'])) {
        $brand->brand = '';
    }
}
if (!empty($_POST['selectTypes'])) {
    $type->type = htmlspecialchars($_POST['selectTypes']);
    if (!$type->updateType()) {
        $formError['updateFailed'] = 'La mise à jour des informations a échoué, veuillez recommencer';
    } else {
        $typeAdded = true;
    }
} else if (empty($_POST['type'])) {
    $type->type = '';
}
if (!empty($_POST['selectBrands'])) {
    $brand->brand = htmlspecialchars($_POST['selectBrands']);
    $brand->id_user = htmlspecialchars($_POST['id_user']);
    if (!$brand->updateBrand()) {
        $formError['updateFailed'] = 'La mise à jour des informations a échoué, veuillez recommencer';
    } else {
        $brandAdded = true;
    }
} else if (empty($_POST['brand'])) {
    $brand->brand = '';
}
if (!empty($_POST['selectTypes'])) {
    $type->id = htmlspecialchars($_POST['selectTypes']);
    if (!$type->deleteType()) {
        $formError['deletionFailed'] = 'La suppression des informations a échoué, veuillez recommencer';
    } else {
        $typeAdded = true;
    }
} else if (empty($_POST['type'])) {
    $type->type = '';
}
if (!empty($_POST['selectBrands'])) {
    $brand->id = htmlspecialchars($_POST['selectBrands']);
    if (!$brand->deleteBrand()) {
        $formError['deletionFailed'] = 'La suppression des informations a échoué, veuillez recommencer';
    } else {
        $brandAdded = true;
    }
} else if (empty($_POST['brand'])) {
    $brand->brand = '';
}
//Si on appuie sur le bouton pour ajouter
if (isset($_POST['addProduct'])) {
    //on lie la valeur de l'input à l'attribut id_user
    $product->id_user = htmlspecialchars($_POST['id_user']);
    if (!empty($_POST['productName'])) {
        //on lie la valeur de l'input à l'attribut name
        $product->name = htmlspecialchars($_POST['productName']);
    } else if (empty($_POST['productName'])) {
        $formError['noProductName'] = 'Le produit n\'a pas de nom';
    }
    if (!empty($_POST['productDescription'])) {
        //on lie la valeur de l'input à l'attribut description
        $product->description = htmlspecialchars($_POST['productDescription']);
    } else if (empty($_POST['productDescription'])) {
        $formError['noProductDescription'] = 'Le produit n\'a pas de description';
    }
    if (!empty($_POST['id_user'])) {
        $product->id_user = htmlspecialchars($_POST['id_user']);
    }
    if (!empty($_POST['selectBrandProduct'])) {
        //on lie la valeur de l'input à l'attribut id_brand
        $product->id_brand = htmlspecialchars($_POST['selectBrandProduct']);
        echo $_POST['selectBrandProduct'];
    } else if (empty($_POST['selectBrandProduct'])) {
        $formError['noProductBrand'] = 'Le produit n\'a pas de marque';
        echo $_POST['selectBrandProduct'];
    }
    if (!empty($_POST['selectTypeProduct'])) {
        //on lie la valeur de l'input à l'attribut id_type
        $product->id_type = htmlspecialchars($_POST['selectTypeProduct']);
        echo $_POST['selectTypeProduct'];
    } else if (empty($_POST['selectTypeProduct'])) {
        $formError['noProductType'] = 'Le produit n\'a pas de type';
        echo $_POST['selectTypeProduct'];
    }
    //Si il n'y a pas eu d'erreur, on éxecute la méthode et réinitialise le contenu des attributs
    if (count($formError) == 0) {
        $product->addProduct();
        $product->name = '';
        $product->description = '';
        $product->id_type = '';
        $product->id_brand = '';
        $product->id_user = '';
    }
}
//Si on clique sur le bouton pour mettre à jour un produit
if (isset($_POST['updateProduct'])) {
    $product->id_user = htmlspecialchars($_POST['id_user']);
//Si on sélectionne un produit
    if (!empty($_POST['productList'])) {
        //On lie la value de l'option du <select> à l'attribut id
        $product->id = htmlspecialchars($_POST['productList']);
    }
    //si un nom est entré
    if (!empty($_POST['productName'])) {
        //on lie la valeur de l'input à l'attribut 
        $product->name = htmlspecialchars($_POST['productName']);
        //et on exécute la méthode
        $product->updateName();
    } else if (empty($_POST['productName'])) {
        $formError['noProductName'] = 'Le produit n\'a pas de nom';
    }
    //Si une description est entrée
    if (!empty($_POST['productDescription'])) {
        //on lie la valeur de l'input à l'attribut 
        $product->description = htmlspecialchars($_POST['productDescription']);
        //et on exécute la méthode
        $product->updateDescription();
    } else if (empty($_POST['productDescription'])) {
        $formError['noProductDescription'] = 'Le produit n\'a pas de description';
    }
    //Si on une marque est sélectionnée
    if (!empty($_POST['selectBrandProduct'])) {
        //on lie la valeur de l'input à l'attribut 
        $product->id_brand = htmlspecialchars($_POST['selectBrandProduct']);
        //et on exécute la méthode
        $product->updateBrand();
    }
    //si un type est sélectionné
    if (!empty($_POST['selectTypeProduct'])) {
        //on lie la valeur de l'input à l'attribut 
        $product->id_type = htmlspecialchars($_POST['selectTypeProduct']);
        //et on exécute la méthode
        $product->updateType();
    }
}
//Si on appuie sur le bouton de suppression
if (isset($_POST['deleteProduct'])) {
    if (!empty($_POST['productList'])) {
        //on lie la valeur de l'input à l'attribut 
        $product->id = htmlspecialchars($_POST['productList']);
        //Si la méthode ne s'éxecute pas
        if (!$product->deleteProduct()) {
            //On affiche un message d'erreur
            $formError['productDeletionFailed'] = 'La suppression a échoué, veuillez réessayer';
        }
    }
}
if (isset($_POST['addComponent'])) {
    if (!empty($_POST['componentName'])) {
        $component->name = htmlspecialchars($_POST['componentName']);
    } else if (empty($_POST['componentName'])) {
        $formError['noProductName'] = 'Le composant n\'a pas de nom';
    }
    if (!empty($_POST['componentDescription'])) {
        $component->description = htmlspecialchars($_POST['componentDescription']);
    } else if (empty($_POST['componentDescription'])) {
        $formError['noProductDescription'] = 'Le composant n\'a pas de description';
    }
    if (!empty($_POST['id_user'])) {
        $component->id_user = htmlspecialchars($_POST['id_user']);
    }
    if (!empty($_POST['selectTypeComponent'])) {
        $component->id_type = htmlspecialchars($_POST['selectTypeComponent']);
    } else if (empty($_POST['selectTypeComponent'])) {
        $formError['noTypeSelected'] = 'Aucun type n\'a été sélectionné';
    }
    if (!empty($_POST['selectProductComponent'])) {
        $component->id_products = htmlspecialchars($_POST['selectProductComponent']);
    } else if (empty($_POST['selectProductComponent'])) {
        $formError['noTypeSelected'] = 'Aucun produit n\'a été sélectionné';
    }
    if (!$component->addComponent()) {
        $formError['componentAddingFailed'] = 'L\'ajout a échoué, veuillez recommencer';
    }
}
if (!empty($_POST['componentList'])) {
    $component->id = htmlspecialchars($_POST['componentList']);
    $componentInfo = $component->getComponent();
    if (isset($_POST['updateComponent'])) {
        $component->id_user = htmlspecialchars($_POST['id_user']);
        if (!empty($_POST['componentList'])) {
            $component->id = htmlspecialchars($_POST['componentList']);
        }
        if (!empty($_POST['componentName'])) {
            $component->name = htmlspecialchars($_POST['componentName']);
            $component->updateName();
        } else if (empty($_POST['componentName'])) {
            $formError['noComponentName'] = 'Le produit n\'a pas de nom';
        }
        if (!empty($_POST['componentDescription'])) {
            $component->description = htmlspecialchars($_POST['componentDescription']);
            $component->updateDescription();
        } else if (empty($_POST['componentDescription'])) {
            $formError['noComponentDescription'] = 'Le produit n\'a pas de description';
        }
        if (!empty($_POST['selectProductComponent'])) {
            $component->id_products = htmlspecialchars($_POST['selectProductComponent']);
            $component->updateProduct();
        }
        if (!empty($_POST['selectTypeComponent'])) {
            $component->id_type = htmlspecialchars($_POST['selectTypeComponent']);
            $component->updateType();
        }
    }
}
if (isset($_POST['deleteComponent'])) {
    if (!empty($_POST['componentList'])) {
        $component->id = htmlspecialchars($_POST['componentList']);
        if (!$component->deleteComponent()) {
            $formError['componentDeletionFailed'] = 'La suppression a échoué, veuillez réessayer';
        }
    }
}