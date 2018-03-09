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
        $query = 'INSERT INTO `' . self::PREFIX . 'forum`(`topic`, `loginAuthor`, `date`) VALUES(:topic, :loginAuthor, :date)';
        $addTopic = $this->db->prepare($query);
        $addTopic->bindValue(':topic', $this->topic, PDO::PARAM_STR);
        $addTopic->bindValue(':loginAuthor', $this->loginAuthor, PDO::PARAM_STR);
        $addTopic->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addTopic->execute();
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTopic;
    }

    public function getTopicsList() {
        $topicList = array();
        $query = 'SELECT `id`, `topic`, `loginAuthor`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'forum`';
        $topicResult = $this->db->query($query);
        if (is_object($topicResult)) {
            $topicList = $topicResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $topicList;
    }

}
