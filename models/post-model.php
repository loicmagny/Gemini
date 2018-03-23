<?php

/*
 * La classe post contient toutes les méthodes permettant la manipulation des commentaires dans le forum,
 * Elle est enfant de dataBase. 
 */

class post extends topic {

    public $id = 0;
    public $post = '';
    public $date = '01/01/1900';
    public $id_topic = 1;
    public $id_user = 0;
    public $id_admin = NULL;
    private $tablename = TABLEPREFIX . 'post';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'ajouter un commentaire dans la base de données en fonction de l'id du sujet du forum
     */

    public function addPost() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO ' . $this->tablename . '(`post`, `id_topic`, `date`, `id_user`) VALUES(:post, :id_topic, :date, :id_user)';
        $addPost = $this->db->prepare($query);
        $addPost->bindValue(':post', $this->post, PDO::PARAM_STR);
        $addPost->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        $addPost->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addPost->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai$
        return $addPost->execute();
    }

    /*
     * Cette méthode permet de récupérer le contenu de tout les posts du sujet et de les afficher.
     * Elle sert égalent à la pagination
     */

    public function getPostListPagination($offset) {
        $query = 'SELECT
    `NCV9fL8njjsAB9Me_post`.`id`,
    `NCV9fL8njjsAB9Me_post`.`post`,
    `NCV9fL8njjsAB9Me_post`.`id_topic`,
    `NCV9fL8njjsAB9Me_post`.`id_user`,
    `NCV9fL8njjsAB9Me_user`.`login`,
    `NCV9fL8njjsAB9Me_user`.`profilePic`,
    DATE_FORMAT(
        `NCV9fL8njjsAB9Me_post`.`date`,
        "%d/%m/%Y"
    ) AS DATE
FROM
    (
        `NCV9fL8njjsAB9Me_post`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_user`
    ON
        `NCV9fL8njjsAB9Me_post`.`id_user` = `NCV9fL8njjsAB9Me_user`.`id`
    )
WHERE
    `NCV9fL8njjsAB9Me_post`.`id_topic` = :id_topic
LIMIT 25 OFFSET :offset';
        $postResult = $this->db->prepare($query);
        $postResult->bindValue(':offset', $offset, PDO::PARAM_INT);
        $postResult->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        if ($postResult->execute()) {
            $postList = $postResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            $postList = false;
        }
        return $postList;
    }

    /**
     * Cette fonction permet de récupérer le nombre de commentaires sur le sujet afin de permettre la pagination
     */
    Public function countPost() {
        $query = 'SELECT COUNT(`id`) AS `numberPost` FROM ' . $this->tablename . ' WHERE id_topic = :id_topic';
        $postCount = $this->db->prepare($query);
        $postCount->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        $postCount->execute();
        if ($postCount->execute()) {
            $postCountResult = $postCount->fetch(PDO::FETCH_OBJ);
        } else {
            $postCountResult = false;
        }
        return $postCountResult;
    }

    public function updatePost() {
        $query = 'UPDATE ' . $this->tablename . ' SET `post` = :post WHERE `id_user` = :id_user AND id_topic = :id_topic AND id =:id';
        $updatePost = $this->db->prepare($query);
        $updatePost->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePost->bindValue(':post', $this->post, PDO::PARAM_STR);
        $updatePost->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updatePost->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        return $updatePost->execute();
    }

    public function deletePost() {
        $query = 'DELETE FROM ' . $this->tablename . '  WHERE `id_user` = :id_user AND id_topic = :id_topic AND id =:id';
        $deleteTopic = $this->db->prepare($query);
        $deleteTopic->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deleteTopic->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $deleteTopic->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        return $deleteTopic->execute();
    }

    private function deletePosts() {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE ' . $this->tablename . '.`id_topic` = :id_topic';
        $deleteTopic = $this->db->prepare($query);
        $deleteTopic->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
        return $deleteTopic->execute();
    }

    public function deleteTopicAndPost() {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $this->deletePosts();
            $query = 'DELETE FROM `NCV9fL8njjsAB9Me_topic` WHERE `NCV9fL8njjsAB9Me_topic`.`id` = :id_topic';
            $deleteTopic = $this->db->prepare($query);
            $deleteTopic->bindValue(':id_topic', $this->id_topic, PDO::PARAM_INT);
            $deleteTopic->execute();
            $this->db->commit();
            return $deleteTopic;
        } catch (Exception $e) {
            $this->db->rollBack();
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function __destruct() {
        
    }

}
