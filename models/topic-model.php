<?php

/*
 * La classe forum contient toutes les méthodes relatives au forum
 * Elle est enfant de dataBase
 */

class topic extends dataBase {

    public $id = 0;
    public $topic = '';
    public $date = '01/01/1900 00:00:00';
    public $id_user = 0;
    public $id_admin = NULL;
    private $tablename = TABLEPREFIX . 'topic';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet de créer un sujet sur le forum sur lequel chaque utilisateur connecté peut poster un commentaire
     */

    public function addTopic() {
        $query = 'INSERT INTO ' . $this->tablename . '(`topic`, `id_user`, `date`) VALUES (:topic, :id_user, :date)';
        $addTopic = $this->db->prepare($query);
        $addTopic->bindValue(':topic', $this->topic, PDO::PARAM_STR);
        $addTopic->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $addTopic->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addTopic->execute();
        return $addTopic;
    }

    public function getLastInsertedTopic() {
        $topicList = array();
        $query = 'SELECT `id` FROM ' . $this->tablename . '  WHERE `id` = LAST_INSERT_ID()';
        $LastInsertedTopic = $this->db->query($query);
        if ($LastInsertedTopic->execute()) {
            if (is_object($LastInsertedTopic)) {
                $LastInsertedTopicObtained = $LastInsertedTopic->fetch(PDO::FETCH_OBJ);
                if (!empty($LastInsertedTopicObtained)) {
                    $this->id = $LastInsertedTopicObtained->id;
                }
            }
            return $LastInsertedTopicObtained;
        }
    }

    public function createTopic() {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $this->addTopic();
            $createTopic = $this->getLastInsertedTopic();
            $this->db->commit();
            return $createTopic;
        } catch (Exception $e) {
            $this->db->rollBack();
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    /*
     * Cette méthode permet de récupérer la listes des sujets du forum afin de les afficher
     */

    public function getTopicsList() {
        $topicList = array();
        $query = 'SELECT
    `' . $this->tablename . '`.`id`,
    `' . $this->tablename . '`.`topic`,
    `' . $this->tablename . '`.`id_user`,
    `NCV9fL8njjsAB9Me_user`.`login`,
    DATE_FORMAT(`' . $this->tablename . '`.`date`, "%d/%m/%Y %H:%i") AS DATE
FROM
    (
        `' . $this->tablename . '`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_user`
    ON
        `' . $this->tablename . '`.`id_user` = `NCV9fL8njjsAB9Me_user`.`id`
    )';
        $topicResult = $this->db->query($query);
        if (is_object($topicResult)) {
            $topicList = $topicResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $topicList;
    }

    function __destruct() {
        
    }

}
