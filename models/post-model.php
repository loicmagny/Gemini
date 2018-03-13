<?php

/*
 * La classe post contient toutes les méthodes permettant la manipulation des commentaires dans le forum,
 * Elle est enfant de dataBase. 
 */

class post extends dataBase {

    public $id = 0;
    public $post = '';
    public $postmaker = '';
    public $topicid = 1;
    public $date = '01/01/1900';
    public $id_author = 0;
    public $authorPic = '';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'ajouter un commentaire dans la base de données en fonction de l'id du sujet du forum
     */

    public function addPost() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'topic`(`post`, `postmaker`, `topicid`, `date`, `id_author`, `authorPic`) VALUES (:post, :postmaker, :topicid, :date, :id_author, :authorPic)';
        $addPost = $this->db->prepare($query);
        $addPost->bindValue(':post', $this->post, PDO::PARAM_STR);
        $addPost->bindValue(':postmaker', $this->postmaker, PDO::PARAM_STR);
        $addPost->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
        $addPost->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addPost->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);
        $addPost->bindValue(':authorPic', $this->authorPic, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai$
        return $addPost->execute();
    }

    /*
     * Cette méthode permet de récupérer le contenu de tout les posts du sujet et de les afficher.
     * Elle sert égalent à la pagination
     */

    public function getPostListPagination($offset) {
        $query = 'SELECT `id`, `post`, `postmaker`, `topicid`, `id_author`, `authorPic`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'topic` WHERE topicid = :topicid LIMIT 25 OFFSET :offset';
        $postResult = $this->db->prepare($query);
        $postResult->bindValue(':offset', $offset, PDO::PARAM_INT);
        $postResult->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
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
        $query = 'SELECT COUNT(`id`) AS `numberPost` FROM `' . self::PREFIX . 'topic` WHERE topicid = :topicid';
        $postCount = $this->db->prepare($query);
        $postCount->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
        $postCount->execute();
        if ($postCount->execute()) {
            $postCountResult = $postCount->fetch(PDO::FETCH_OBJ);
        } else {
            $postCountResult = false;
        }
        return $postCountResult;
    }

    function __destruct() {
        
    }

}
