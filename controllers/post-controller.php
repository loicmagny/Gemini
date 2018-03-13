<?php

$insertSuccess = false;
$getPosts = false;
$formError = array();
if (isset($_POST['ajax'])) {
    include '../models/dataBase.php';
    include '../models/post-model.php';
    include '../models/historic-model.php';
    $post = new post();
    if (isset($_POST['id_author'])) {
        $post->id_author = $_POST['id_author'];
    }
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
        $post->topicid = $_POST['topicid'];
    }
    if (isset($_POST['date'])) {
        $post->date = $_POST['date'];
    }
    if (isset($_POST['authorPic'])) {
        $post->authorPic = $_POST['authorPic'];
    } else {
        $post->authorPic = null;
    }
    if (!$addPost = $post->addPost() && count($formError) == 0) {
        $formError['submit'] = 'Erreur lors de la publication';
        $insertSuccess = true;
        $post->post = '';
        $post->postmaker = '';
        $post->topicid = '';
        $post->date = '';
        $post->id_author = '';
        $post->authorPic = '';
    }
    var_dump($post);
} else {
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
    $topicid = $_GET['topic'];
    $post->topicid = $topicid;
//appel de la méthode getPostListPagination
    //appel de la méthode countPost
    $postCount = $post->countPost();
    if ($postCount === 0) {
        $formError['noPosts'] = 'Le topic est vide';
        $getPosts = false;
    } else {
        $postListPage = $post->getPostListPagination($start);
        if (empty($postListPage)) {
            $getPosts = false;
        } else {
            $getPosts = true;
            $maxPagination = ceil($postCount->numberPost / $limit);
        }
    }
}