<?php

$historic = new historic();
if (isset($_SESSION['connect'])) {
    $historic->id_user = $_SESSION['id'];
    $historicList = $historic->getHistoric($_SESSION['id']);
    $historicCount = $historic->countHistoricLine($_SESSION['id']);
    if (count($historicCount) > 10) {
        $historic->deleteHistoric($_SESSION['id']);
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
    }
}