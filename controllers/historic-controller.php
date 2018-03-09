<?php

$clear = false;
if (isset($_SESSION['connect'])) {
    $historic = new historic();
    $historic->id_user = $_SESSION['id'];
    $historicList = $historic->getHistoric($_SESSION['id']);
    $historicCount = $historic->countHistoricLine($_SESSION['id']);
    if (isset($_POST['clear'])) {
        $historic->deleteHistoric($_SESSION['id']);
        $clear = true;
    }
    if (isset($_GET['advice'])) {
        $historic->id_advice = $_GET['advice'];
        $addInHistoric = $historic->AddInHistoric();
    } else if (isset($_GET['article'])) {
        $historic->id_articles = $_GET['article'];
        $addInHistoric = $historic->AddInHistoric();
    } else if (isset($_GET['topic'])) {
        $historic->id_topic = $_GET['topic'];
        $addInHistoric = $historic->AddInHistoric();
    } else {
        $empty = 'Votre historique est vide pour le moment';
    }
}