<?php

class article extends dataBase {

    public $id = 0;
    public $title = '';
    public $content = '';
    public $date = '1990-01-01';
    public $author = '';
    public $id_author = 0;
    public $authorPic = '';

    public function __construct() {
        parent::__construct();
    }

    public function addArticle() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'articles`(`title`, `content`, `date`, `author`, `id_author`, `authorPic`) VALUES (:title, :content, :date, :author, :id_author, :authorPic)';
        $addArticle = $this->db->prepare($query);
        $addArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArticle->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addArticle->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArticle->bindValue(':author', $this->author, PDO::PARAM_STR);
        $addArticle->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);
        $addArticle->bindValue(':authorPic', $this->authorPic, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addArticle->execute();
    }

    public function getArticlesList() {
        $articleList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `author` FROM `' . self::PREFIX . 'articles`';
        $articleResult = $this->db->query($query);
        if (is_object($articleResult)) {
            $articleList = $articleResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $articleList;
    }

    public function getArticlesContent() {
        $articleContentList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `author`, `id_author`, `authorPic` FROM `' . self::PREFIX . 'articles` WHERE id = :id';
        $articleContentResult = $this->db->prepare($query);
        $articleContentResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $articleContentResult->execute();
        if ($articleContentResult->execute()) {
            $articleContentList = $articleContentResult->fetch(pdo::FETCH_OBJ);
        }
        return $articleContentList;
    }

}
