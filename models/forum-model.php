<?php

/*
 * La classe forum contient toutes les méthodes relatives au forum
 * Elle est enfant de dataBase
 */

class forum extends dataBase {

    public $id = 0;
    public $topic = '';
    public $idmaker = '';
    public $date = '01/01/1900';
    private $tablename = TABLEPREFIX . 'forum';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet de créer un sujet sur le forum sur lequel chaque utilisateur connecté peut poster un commentaire
     */

    public function addTopic() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO ' . $this->tablename . '(`topic`, `loginAuthor`, `date`) VALUES(:topic, :loginAuthor, :date)';
        $addTopic = $this->db->prepare($query);
        $addTopic->bindValue(':topic', $this->topic, PDO::PARAM_STR);
        $addTopic->bindValue(':loginAuthor', $this->loginAuthor, PDO::PARAM_STR);
        $addTopic->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addTopic->execute();
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTopic;
    }

    /*
     * Cette méthode permet de récupérer la listes des sujets du forum afin de les afficher
     */

    public function getTopicsList() {
        $topicList = array();
        $query = 'SELECT `id`, `topic`, `loginAuthor`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM ' . $this->tablename . '';
        $topicResult = $this->db->query($query);
        if (is_object($topicResult)) {
            $topicList = $topicResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $topicList;
    }

    function __destruct() {
        
    }

}
