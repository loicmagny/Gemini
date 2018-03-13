<?php 
//On instancie la classe forum()
$topics = new forum();
//On appelle la méthode getTopicsList() afin de récupérer la liste des sujets
$topicsList = $topics->getTopicsList();
//On instancie la classe forum()
$topic = new forum();
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['topic'])) {
        $topic->topic = strip_tags($_POST['topic']);
    }
    if (isset($_POST['loginAuthor'])) {
        $topic->loginAuthor = htmlspecialchars($_POST['loginAuthor']);
        var_dump($topic->loginAuthor);
    }
    if (isset($_POST['date'])) {
        $topic->date = htmlspecialchars($_POST['date']);
    }
    if (!$topic->addTopic()) {
        $formError['submit'] = 'Erreur lors de la création du sujet';
        var_dump($topic);
    } else {
        $insertSuccess = true;
        $topic->topic = '';
        $topic->loginAuthor = '';
        $topic->date = '';
    }
}    

