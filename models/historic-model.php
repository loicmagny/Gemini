<?php

/*
 * La classe historic contient toutes les méthodes relatives à l'historique de navigation de l'utilisateur.
 * Elle est enfant de dataBase.
 * La classe contient en attribut les id de tout les éléments contenus dans la base de données et visités par l'utilisateur
 */

class historic extends dataBase {

    public $id = 0;
    public $id_user = 0;
    public $id_tips = NULL;
    public $id_articles = NULL;
    public $id_topic = NULL;
    private $tablename = TABLEPREFIX . 'historic';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'ajouter les id des éléments contenus dans la base de données et visités par l'utilisateur
     */

    public function AddTopicInHistoric() {
        $query = 'INSERT INTO ' . $this->tablename . '(`visit_date`, `id_user`,  id_topic) VALUES(:visit_date, :id_user, :id_topic)';
        $addTopicInHistoric = $this->db->prepare($query);
        $addTopicInHistoric->bindValue(':visit_date', $this->visit_date, PDO::PARAM_STR);
        $addTopicInHistoric->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $addTopicInHistoric->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTopicInHistoric->execute();
    }

    public function AddArticlesInHistoric() {
        $query = 'INSERT INTO ' . $this->tablename . '(`visit_date`, `id_user`,  `id_articles`) VALUES(:visit_date, :id_user, :id_articles)';
        $addArticlesInHistoric = $this->db->prepare($query);
        $addArticlesInHistoric->bindValue(':visit_date', $this->visit_date, PDO::PARAM_STR);
        $addArticlesInHistoric->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $addArticlesInHistoric->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addArticlesInHistoric->execute();
    }

    public function AddTipsInHistoric() {
        $query = 'INSERT INTO ' . $this->tablename . '(`visit_date`, `id_user`,  `id_tips`) VALUES(:visit_date, :id_user, :id_tips)';
        $addTipsInHistoric = $this->db->prepare($query);
        $addTipsInHistoric->bindValue(':visit_date', $this->visit_date, PDO::PARAM_STR);
        $addTipsInHistoric->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $addTipsInHistoric->bindValue(':id_tips', $this->id_tips, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTipsInHistoric->execute();
    }

    /*
     * Cette méthode permet d'afficher l'historique de navigation de l'utilisateur
     * La requête contient une jointure entre toutes les tables de la base de données du projet afin de récupèrer chaque élément contenus dans la base de données et visités par l'utilisateur 
     * Cela permet d'afficher dans l'historique un lien vers ces éléments déjà visités
     */

    public function getHistoric($user_id) {
        $query = 'SELECT
    ' . $this->tablename . '.`id` AS historic_id,
    ' . $this->tablename . '.`id_user`,
    ' . $this->tablename . '.`id_articles`,
    ' . $this->tablename . '.`id_topic`,
    ' . $this->tablename . '.`id_tips`,
    `NCV9fL8njjsAB9Me_tips`.`id` AS tips_id,
    `NCV9fL8njjsAB9Me_tips`.`title` AS tips_title,
    `NCV9fL8njjsAB9Me_articles`.`id` AS articles_id,
    `NCV9fL8njjsAB9Me_articles`.`title` AS article_title,
    `NCV9fL8njjsAB9Me_topic`.`id` as topic_id,
    `NCV9fL8njjsAB9Me_topic`.`topic` as topic_name,
    `NCV9fL8njjsAB9Me_user`.`id` AS user_id,
    `NCV9fL8njjsAB9Me_user`.`login`
FROM
    (
        ' . $this->tablename . '
    LEFT JOIN
        `NCV9fL8njjsAB9Me_tips`
    ON
        ' . $this->tablename . '.`id_tips` = `NCV9fL8njjsAB9Me_tips`.`id`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_user`
    ON
        ' . $this->tablename . '.`id_user` = `NCV9fL8njjsAB9Me_user`.`id`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_articles`
    ON
        ' . $this->tablename . '.`id_articles` = `NCV9fL8njjsAB9Me_articles`.`id`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_topic`
    ON
        ' . $this->tablename . '.`id_topic` = `NCV9fL8njjsAB9Me_topic`.`id`
    )
WHERE
    ' . $this->tablename . '.`id_user` = :id_user';
        $historicResult = $this->db->prepare($query);
        $historicResult->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicResult->execute();
        if ($historicResult->execute()) {
            $historicList = $historicResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $historicList;
    }

    /*
     * Cette méthode permet de compter le nombre de lines dans l'historique d'un utilisateur afin d'établir une pagination
     */

    public function countHistoricLine($user_id) {
        $query = 'SELECT COUNT(`id`) AS `historicLine` FROM ' . $this->tablename . ' WHERE id_user = :id_user';
        $historicLineCount = $this->db->prepare($query);
        $historicLineCount->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicLineCount->execute();
        if ($historicLineCount->execute()) {
            $historicLineResult = $historicLineCount->fetch(PDO::FETCH_OBJ);
        } else {
            $historicLineResult = false;
        }
        return $historicLineResult;
    }

    /*
     * Cette méthode permet de supprimer l'historique de l'utilisateur
     */

    public function deleteHistoric($user_id) {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE id_user = :id_user';
        $historicLineCount = $this->db->prepare($query);
        $historicLineCount->bindValue('id_user', $user_id, PDO::PARAM_INT);
        $historicLineCount->execute();
        return $historicLineCount;
    }

    function __destruct() {
        
    }

}
