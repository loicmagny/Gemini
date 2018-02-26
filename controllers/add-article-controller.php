<?php

$article = new article();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
        $article->title = htmlspecialchars($_POST['title']);
    } else if (empty($_POST['title'])) {
        $formError['emptyTitle'] = 'Votre article n\'a pas de titre!';
    }
    if (isset($_POST['content'])) {
        $article->content = htmlspecialchars($_POST['content']);
    } else if (empty($_POST['content'])) {
        $formError['emptyContent'] = 'Votre article n\'a pas de contenu!';
    }
    if (isset($_POST['makerid'])) {
        $article->makerid = htmlspecialchars($_POST['makerid']);
    }
    if (isset($_POST['date'])) {
        $article->date = htmlspecialchars($_POST['date']);
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$article->addArticle()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        $article->title = '';
        $article->content = '';
        $article->date = '';
        $article->makerid = '';
    }
}
