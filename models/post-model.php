<?php

class post extends dataBase {

    public $id = 0;
    public $post = '';
    public $postmaker = '';
    public $topicid = 1;
    public $date = '01/01/1900';

    public function __construct() {
        parent::__construct();
    }

    public function addPost() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `topic`(`post`, `postmaker`, `topicid`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date VALUES (:post, :postmaker, :topicid, :date)';
        $addPost = $this->db->prepare($query);
        $addPost->bindValue(':post', $this->post, PDO::PARAM_STR);
        $addPost->bindValue(':postmaker', $this->postmaker, PDO::PARAM_STR);
        $addPost->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
        $addPost->bindValue(':date', $this->date, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai$
        return $addPost->execute();
    }

    public function getPostsList() {
        $postList = array();
        $query = 'SELECT `id`, `post`, `postmaker`, `topicid`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `topic`';
        $postResult = $this->db->query($query);
        if (is_object($postResult)) {
            $postList = $postResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $postList;
    }

}
