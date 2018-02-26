<?php

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
    if (isset($_POST['loginAuthor'])) {
        $advice->loginAuthor = htmlspecialchars($_POST['loginAuthor']);
    }
    if (isset($_POST['date'])) {
        $advice->date = htmlspecialchars($_POST['date']);
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$advice->addAdvice()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        $advice->title = '';
        $advice->content = '';
        $advice->date = '';
        $advice->loginAuthor = '';
    }
    var_dump($insertSuccess);
    var_dump($_POST);
}
$adviceList = $advice->getAdvicesList();
