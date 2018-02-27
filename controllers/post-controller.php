<?php

$insertSuccess = false;
$formError = array();
if (isset($_POST['ajax'])) {
    include '../models/dataBase.php';
    include '../models/post-model.php';
    include '../models/historic-model.php';
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
    if (isset($_GET['topic'])) {
        $post->topicid = $_GET['topic'];
    }
    if (isset($_POST['date'])) {
        $post->date = $_POST['date'];
    }
    var_dump($post);
    if (!$addPost = $post->addPost() && count($formError) == 0) {
        $formError['submit'] = 'Erreur lors de la publication';
        var_dump($post);
        $insertSuccess = true;
        $post->post = '';
        $post->postmaker = '';
        $post->topicid = '';
        $post->date = '';
    }
} else {
    $post = new post();
    $postList = $post->getPostsList();
//par défaut première page
    $page = 1;
//on limite l'affichage à 5 patients
    $limit = 25;
    $post = new post();
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
//Permet de calculer le offset en fonction de la page sélectionné
    $start = ($page * $limit) - $limit;
    $post->topicid = $_GET['topic'];
//appel de la méthode getPostListPagination
    $postListPage = $post->getPostListPagination($start);
//appel de la méthode countPost
    $postCount = $post->countPost();
    $maxPagination = ceil($postCount->numberPost / $limit);
}
    