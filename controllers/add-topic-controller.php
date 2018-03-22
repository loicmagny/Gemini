<?php

$topic = new topic();
$post = new post();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['topic'])) {
        $topic->topic = htmlspecialchars($_POST['topic']);
    }
    if (isset($_POST['id_author'])) {
        $topic->id_user = htmlspecialchars($_POST['id_author']);
        $post->id_user = htmlspecialchars($_POST['id_author']);
    }
    if (isset($_POST['date'])) {
        $topic->date = htmlspecialchars($_POST['date']);
        $post->date = htmlspecialchars($_POST['date']);
    }
    if (isset($_POST['post'])) {
        $post->post = htmlspecialchars($_POST['post']);
        $lastTopic = $topic->getLastInsertedTopic();
//        $lastTopic = $topic->createTopic();
        $post->id_topic = $lastTopic;
        var_dump($lastTopic);
        $post->addPost();
    }
    if (!$topic->addTopic()) {
        $formError['submit'] = 'Erreur lors de la création du sujet';
    } else {
        $insertSuccess = true;
        $topic->topic = '';
        $topic->id_NCV9fL8njjsAB9Me_user = '';
        $topic->date = '';
    }
}

