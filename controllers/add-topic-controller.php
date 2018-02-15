<?php

$topic = new forum();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['topic'])) {
        $topic->topic = strip_tags($_POST['topic']);
    }
    if (isset($_POST['makerid'])) {
        $topic->idmaker = htmlspecialchars($_POST['makerid']);
    }
    if (isset($_POST['date'])) {
        $topic->date = htmlspecialchars($_POST['date']);
    }
    $topic->addTopic();

    if (!$topic->addTopic()) {
        $formError['submit'] = 'Erreur lors de la création du sujet';
    } else {
        $insertSuccess = true;
        $topic->topic = '';
        $topic->idmaker = '';
        $topic->date = '';
        var_dump($topic);
        echo 'oui';
    }
}

