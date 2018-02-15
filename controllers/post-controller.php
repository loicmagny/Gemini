<?php

$insertSuccess = false;
$formError = array();
if (isset($_POST['ajax'])) {
    include '../models/dataBase.php';
    include '../models/post-model.php';
    $post = new post();
    if (isset($_POST['post'])) {
        $post->post = ($_POST['post']);
    } else if (empty($_POST['post'])) {
        $formError['emptyPost'] = 'Merci d\'écrire quelque chose';
    }
    if (isset($_POST['postmaker'])) {
        $post->postmaker = ($_POST['postmaker']);
    } else if (empty($_POST['postmaker'])) {
        $formError['emptyPostMaker'] = 'Il vous faut un compte pour poster quelque chose';
    }
    if (isset($_POST['topicid'])) {
        $post->topicid = ($_POST['topicid']);
    }
    if (isset($_POST['date'])) {
        $post->date = $_POST['date'];
    }
    $addPost = $post->addPost();
    $postList = $post->getPostsList();
    $insertSuccess = true;
    $post->post = '';
    $post->postmaker = '';
    $post->topicid = '';
    $post->date = '';
    echo 'success';
} else {
    echo '';
    $post = new post();
    $postList = $post->getPostsList();
}

