<?php

//On instancie la classe tips()
$tips = new tips();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['title'])) {
        $tips->title = htmlspecialchars($_POST['title']);
    } else if (empty($_POST['title'])) {
        $formError['emptyTitle'] = 'Votre article n\'a pas de titre!';
    }
    if (isset($_POST['content'])) {
        $tips->content = htmlspecialchars($_POST['content']);
    } else if (empty($_POST['content'])) {
        $formError['emptyContent'] = 'Votre article n\'a pas de contenu!';
    }
    if (isset($_POST['id_author'])) {
        $tips->id_author = htmlspecialchars($_POST['id_author']);
    }
    if (isset($_POST['date'])) {
        $tips->date = htmlspecialchars($_POST['date']);
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur lors de l'appel de la méthode addAdvice()
    if (!$tips->addTips()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        $tips->title = '';
        $tips->content = '';
        $tips->date = '';
        $tips->id_author = '';
    }
}

