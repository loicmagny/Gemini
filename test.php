<?php
if (isset($_POST['addComponent'])) {
    if (isset($_POST['componentName'])) {
        $component->name = htmlspecialchars($_POST['componentName']);
    } else if (empty($_POST['componentName'])) {
        $formError['noProductName'] = 'Le composant n\'a pas de nom';
    }
    if (isset($_POST['componentDescription'])) {
        $component->description = htmlspecialchars($_POST['componentDescription']);
    } else if (empty($_POST['componentDescription'])) {
        $formError['noProductDescription'] = 'Le composant n\'a pas de description';
    }
    if (isset($_POST['id_user'])) {
        $component->id_user = htmlspecialchars($_POST['id_user']);
    }
    if (isset($_POST['selectTypeComponent'])) {
        $component->id_type = htmlspecialchars($_POST['selectTypeComponent']);
    } else if (empty($_POST['selectTypeComponent'])) {
        $formError['noTypeSelected'] = 'Aucun type n\'a été sélectionné';
    }
    if (isset($_POST['selectProductComponent'])) {
        $component->id_products = htmlspecialchars($_POST['selectProductComponent']);
    } else if (empty($_POST['selectProductComponent'])) {
        $formError['noTypeSelected'] = 'Aucun produit n\'a été sélectionné';
    }
    if (!$component->addComponent()) {
        $formError['componentAddingFailed'] = 'L\'ajout a échoué, veuillez recommencer';
    }
}
if (isset($_POST['componentList'])) {
    $component->id = htmlspecialchars($_POST['componentList']);
    if (isset($_POST['updateComponent'])) {
        $componentInfo = $component->getComponent();
        if (isset($_POST['changeComponent'])) {
            $component->id_user = htmlspecialchars($_POST['id_user']);
            if (isset($_POST['componentList'])) {
                $component->id = htmlspecialchars($_POST['componentList']);
            }
            if (isset($_POST['componentName'])) {
                $component->name = htmlspecialchars($_POST['componentName']);
                var_dump($component->updateName());
            } else if (empty($_POST['componentName'])) {
                $formError['noComponentName'] = 'Le produit n\'a pas de nom';
            }
            if (isset($_POST['componentDescription'])) {
                $component->description = htmlspecialchars($_POST['componentDescription']);
                var_dump($component->updateDescription());
            } else if (empty($_POST['componentDescription'])) {
                $formError['noComponentDescription'] = 'Le produit n\'a pas de description';
            }

            if (isset($_POST['selectProductComponent'])) {
                $component->id_products = htmlspecialchars($_POST['selectProductComponent']);
                var_dump($component->updateProduct());
            }
            if (isset($_POST['selectTypeComponent'])) {
                $component->id_type = htmlspecialchars($_POST['selectTypeComponent']);
                var_dump($component->updateType());
            }
        }
    } else if (isset($_POST['deleteComponent'])) {
        if (!$component->deleteComponent()) {
            $formError['componentDeletionFailed'] = 'La suppression a échoué, veuillez réessayer';
        }
    }
}