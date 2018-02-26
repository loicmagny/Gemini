<?php

$topics = new forum();
$topicsList = $topics->getTopicsList();
$topic = new forum();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['topic'])) {
        $topic->topic = strip_tags($_POST['topic']);
    }
    if (isset($_POST['loginAuthor'])) {
        $topic->loginAuthor = htmlspecialchars($_POST['loginAuthor']);
    }
    if (isset($_POST['date'])) {
        $topic->date = htmlspecialchars($_POST['date']);
    }
    if (!$topic->addTopic()) {
        $formError['submit'] = 'Erreur lors de la création du sujet';
        var_dump($topic);
    } else {
        var_dump($topic);
        $insertSuccess = true;
        $topic->topic = '';
        $topic->loginAuthor = '';
        $topic->date = '';
        echo 'oui';
    }
}    