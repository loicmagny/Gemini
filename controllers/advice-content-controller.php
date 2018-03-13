<?php

//On instance la class advice()
$advice = new advice();
$formError = array();
$SearchSuccess = false;
if (isset($_GET['advice'])) {
//On lie l'id de l'article passé en paramètre d'url à l'attribut id de la classe advice()
    $advice->id = $_GET['advice'];
} else if (empty($_GET['advices'])) {
    $formError['adviceNotFound'] = 'Nous n\'avons pas trouvé de conseil';
}
if (count($formError) == 0) {
    //On appelle la méthode getAdviceContent()pour récupérer le contenu du conseil sélectionné
    $adviceContent = $advice->getAdviceContent();
    $SearchSuccess = true;
}


