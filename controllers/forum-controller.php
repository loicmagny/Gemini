<?php

$topic = new topic();
$topicsList = $topic->getTopicsList();
$post = new post();
$deletionSuccess = false;
if (isset($_POST['delete'])) {
    $topic->id = intval($_POST['topic_id']);
    $post->id_topic = intval($_POST['topic_id']);
    if ($delete = $post->deleteTopicAndPost()) {
        $deletionSuccess = true;
    }
}

