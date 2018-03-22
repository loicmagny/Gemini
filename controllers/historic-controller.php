<?php

$clear = false;
//Si l'utilisateur est connecté
if (isset($_SESSION['connect'])) {
    //On instancie la classe historic
    $historic = new historic();
    $historic->id_user = $_SESSION['id'];
    //On appelle la méthode getHistoric() qui prend en paramètre l'id de l'utilisateur connecté afin de récupérer son historique
    $historicList = $historic->getHistoric($_SESSION['id']);
    //On appelle la méthode countHistoricLine() qui prend en paramètre l'id de l'utilisateur connecté afin de compter le nombre de lignes dans son historique
    $historicCount = $historic->countHistoricLine($_SESSION['id']);
    if (isset($_POST['clear'])) {
        //On appelle la méthode deleteHistoric()
        $historic->deleteHistoric($_SESSION['id']);
        $clear = true;
    }
    //Si un conseil est visité, on ajoute son id à l'historique de l'utilisateur
    if (isset($_GET['advice'])) {
        $historic->id_tips = $_GET['advice'];
        $historic->visit_date = date('Y-m-d H:i');
        $addTipsInHistoric = $historic->AddTipsInHistoric();
    }
        //Si un article est visité, on ajoute son id à l'historique de l'utilisateur
    if (isset($_GET['article'])) {
        $historic->id_articles = $_GET['article'];
        $historic->visit_date = date('Y-m-d H:i');
        $addArticlesInHistoric = $historic->AddArticlesInHistoric();
    }
    //Si un topic du forum est visité, on ajoute son id à l'historique de l'utilisateur
    if (isset($_GET['topic'])) {
        $historic->id_topic = $_GET['topic'];
        $historic->visit_date = date('Y-m-d H:i');
        $addTopicInHistoric = $historic->AddTopicInHistoric();
    }
} else {
    $empty = 'Votre historique est vide pour le moment';
}