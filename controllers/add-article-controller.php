<?php
//On instancie la class article()
$article = new articles();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
        $article->title = htmlspecialchars($_POST['title']);
    } else if (empty($_POST['title'])) {
        $formError['emptyTitle'] = 'Votre message n\'a pas de titre!';
    }
    if (isset($_POST['content'])) {
        $article->content = htmlspecialchars($_POST['content']);
    } else if (empty($_POST['content'])) {
        $formError['emptyContent'] = 'Votre message n\'a pas de contenu!';
    }
    if (isset($_POST['id_author'])) {
        $article->id_author = htmlspecialchars($_POST['id_author']);
    }
    if (isset($_POST['date'])) {
        $article->date = htmlspecialchars($_POST['date']);
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur lors de l'éxécution de la méthode addArticle()
    if (!$article->addArticle()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        $article->title = '';
        $article->content = '';
        $article->date = '';
        $article->author = '';
        $article->id_author = '';
        $article->authorPic = '';
    }
}
