<?php

/*
 * La classe article contient toutes les méthodes concernant les articles de la base de données
 * Elle est enfant de dataBase
 */

class article extends dataBase {

    public $id = 0;
    public $title = '';
    public $content = '';
    public $date = '1990-01-01';
    public $author = '';
    public $id_author = 0;
    public $authorPic = '';
    private $tablename = TABLEPREFIX . 'article';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'ajouter un article dans la base de données
     */

    public function addArticle() {
        $query = 'INSERT INTO ' . $this->tablename . '(`title`, `content`, `date`, `author`, `id_author`, `authorPic`) VALUES (:title, :content, :date, :author, :id_author, :authorPic)';
        $addArticle = $this->db->prepare($query);
        $addArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArticle->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addArticle->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArticle->bindValue(':author', $this->author, PDO::PARAM_STR);
        $addArticle->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);
        $addArticle->bindValue(':authorPic', $this->authorPic, PDO::PARAM_STR);
        return $addArticle->execute();
    }

    /*
     * Cette méthode permet de récupérer la liste des articles et de leurs auteurs contenus dans la base de données
     */

    public function getArticlesList() {
        $articleList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `author` FROM ' . $this->tablename . '';
        $articleResult = $this->db->query($query);
        if (is_object($articleResult)) {
            $articleList = $articleResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $articleList;
    }

    /*
     * Cette méthode permet de récupérer et d'afficher, dans la vue, le contenu et l'auteur de l'article selectionné 
     */

    public function getArticlesContent() {
        $articleContentList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `author`, `id_author`, `authorPic` FROM ' . $this->tablename . ' WHERE id = :id';
        $articleContentResult = $this->db->prepare($query);
        $articleContentResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $articleContentResult->execute();
        if ($articleContentResult->execute()) {
            $articleContentList = $articleContentResult->fetch(pdo::FETCH_OBJ);
        }
        return $articleContentList;
    }

    function __destruct() {
        
    }

}
