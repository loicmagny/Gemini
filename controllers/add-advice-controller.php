<?php

//On instancie la classe advice()
$advice = new advice();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
        $advice->title = htmlspecialchars($_POST['title']);
    } else if (empty($_POST['title'])) {
        $formError['emptyTitle'] = 'Votre article n\'a pas de titre!';
    }
    if (isset($_POST['content'])) {
        $advice->content = htmlspecialchars($_POST['content']);
    } else if (empty($_POST['content'])) {
        $formError['emptyContent'] = 'Votre article n\'a pas de contenu!';
    }
    if (isset($_POST['author'])) {
        $advice->author = htmlspecialchars($_POST['author']);
    }
    if (isset($_POST['id_author'])) {
        $advice->id_author = htmlspecialchars($_POST['id_author']);
    }
    if (isset($_POST['authorPic'])) {
        $advice->authorPic = htmlspecialchars($_POST['authorPic']);
    }
    if (isset($_POST['date'])) {
        $advice->date = htmlspecialchars($_POST['date']);
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur lors de l'appel de la méthode addAdvice()
    if (!$advice->addAdvice()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        $advice->title = '';
        $advice->content = '';
        $advice->date = '';
        $advice->author = '';
        $advice->id_author = '';
        $advice->authorPic = '';
    }
}

