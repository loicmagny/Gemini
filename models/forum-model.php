<?php

class forum extends dataBase {

    public $id = 0;
    public $topic = '';
    public $idmaker = '';
    public $date = '01/01/1900';

    public function __construct() {
        parent::__construct();
    }

    public function addTopic() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `forum`(`topic`, `idmaker`, `date`) VALUES(:topic, :idmaker,:date)';
        $addTopic = $this->db->prepare($query);
        $addTopic->bindValue(':topic', $this->topic, PDO::PARAM_STR);
        $addTopic->bindValue(':idmaker', $this->idmaker, PDO::PARAM_INT);
        $addTopic->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addTopic->execute();
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTopic;
    }

    public function getTopicsList() {
        $topicList = array();
        $query = 'SELECT `id`, `topic`, `idmaker`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `forum`';
        $topicResult = $this->db->query($query);
        if (is_object($topicResult)) {
            $topicList = $topicResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $topicList;
    }

}
