<?php

//On instance la class tip()
$tip = new tips();
$formError = array();
$SearchSuccess = false;
if (isset($_GET['tips'])) {
//On lie l'id de l'article passé en paramètre d'url à l'attribut id de la classe tip()
    $tip->id = $_GET['tips'];
} else if (empty($_GET['tips'])) {
    $formError['tipNotFound'] = 'Nous n\'avons pas trouvé de conseil';
}
if (count($formError) == 0) {
    //On appelle la méthode getTipsContent()pour récupérer le contenu du conseil sélectionné
    $tipsContent = $tip->getTipsContent();
    $SearchSuccess = true;
}


