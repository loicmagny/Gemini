<?php

$insertSuccess = false;
$getPosts = false;
$formError = array();
if (isset($_POST['ajax'])) {//Si on lance l'appel ajax
    //On inclue les models dataBase.php, post-model.php, et historic-model.php
    include '../models/dataBase.php';
    include '../models/post-model.php';
    include '../models/historic-model.php';
    $post = new post(); //On instancie la classe post()
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
    //Si l'ajout ne se fait pas,
    if (!$addPost = $post->addPost()) {
        //On affiche une erreur
        $formError['submit'] = 'Erreur lors de la publication';
    } else {
        $insertSuccess = true;
        $post->post = '';
        $post->postmaker = '';
        $post->topicid = '';
        $post->date = '';
        $post->id_author = '';
        $post->authorPic = '';
    }
    //Si l'appel ajax n'est pas effectué
} else {
//La page par défaut est la première
    $page = 1;
//on limite l'affichage à 25 commentaires
    $limit = 25;
    // On instancie la classe post()
    $post = new post();
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
//Permet de calculer le offset (décalage) en fonction de la page sélectionné
    $start = ($page * $limit) - $limit;
    $topicid = $_GET['topic'];
    $post->topicid = $topicid;
//appel de la méthode getPostListPagination
    //appel de la méthode countPost
    $postCount = $post->countPost();
    //Si l'objet $postCount contient 0 résultats,
    if ($postCount === 0) {
        //On affiche une erreur
        $formError['noPosts'] = 'Le topic est vide';
        $getPosts = false;
    } else {
        $postListPage = $post->getPostListPagination($start);
        if (!$postListPage) {
            $getPosts = false;
        } else {
            $getPosts = true;
            $maxPagination = ceil($postCount->numberPost / $limit);
        }
    }
}
