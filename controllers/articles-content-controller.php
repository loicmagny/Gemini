<?php

$article = new article();
$formError = array();
$SearchSuccess = false;
if (isset($_GET['article'])) {
    $article->id = $_GET['article'];
} else if (empty($_GET['article'])) {
    $formError['articleNotFound'] = 'Nous n\'avons pas trouvé d\'articles';
}
if (count($formError) == 0) {
    $articleContentList = $article->getArticlesContent();
    $SearchSuccess = true;
}

