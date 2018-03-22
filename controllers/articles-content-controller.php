<?php

//On instancie la classe article()
$article = new articles();
$formError = array();
$SearchSuccess = false;
if (isset($_GET['article'])) {
    //On lie l'id de l'article passé en paramètre d'url à l'attribut id de la classe article()
    $article->id = $_GET['article'];
} else if (empty($_GET['article'])) {
    $formError['articleNotFound'] = 'Nous n\'avons pas trouvé d\'articles';
}
if (count($formError) == 0) {
    //On appelle la méthode getArticlesContent pour récupérer le contenu de l'article sélectionner
    $articleContentList = $article->getArticlesContent();
    $SearchSuccess = true;
}

