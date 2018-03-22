<?php

$insertSuccess = false;
$getPosts = false;
$formError = array();
if (isset($_POST['ajax'])) {//Si on lance l'appel ajax
    //On inclue les models dataBase.php, post-model.php, et historic-model.php
    include '../models/dataBase.php';
    include '../configuration.php';
    include '../models/post-model.php';
    include '../models/historic-model.php';
    $post = new post(); //On instancie la classe post()
    if (isset($_POST['post'])) {
        $post->post = ($_POST['post']);
    } else if (empty($_POST['post'])) {
        $formError['emptyPost'] = 'Merci d\'écrire quelque chose';
    }
    if (isset($_POST['id_user'])) {
        $post->id_user = ($_POST['id_user']);
    } else if (empty($_POST['id_user'])) {
        $formError['emptyPostMaker'] = 'Il vous faut un compte pour poster quelque chose';
    }
    if (isset($_POST['id_topic'])) {
        $post->id_topic = $_POST['id_topic'];
    }
    if (isset($_POST['date'])) {
        $post->date = $_POST['date'];
    }
    //Si l'ajout ne se fait pas,
    if (!$addPost = $post->addPost()) {
        //On affiche une erreur
        $formError['submit'] = 'Erreur lors de la publication';
    } else {
        $insertSuccess = true;
        $post->post = '';
        $post->id_topic = '';
        $post->date = '';
        $post->id_user = '';
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
    $id_topic = $_GET['topic'];
    $post->id_topic = $id_topic;
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
            $maxPagination = 0;
        } else {
            $getPosts = true;
            $maxPagination = ceil($postCount->numberPost / $limit);
        }
    }
}
