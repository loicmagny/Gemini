<?php

class article extends dataBase {

    public function __construct() {
        parent::__construct();
    }

    public function addArticle() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'articles`(`title`, `content`, `date`, `makerid`) VALUES (:title, :content, :date, :makerid)';
        $addArticle = $this->db->prepare($query);
        $addArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArticle->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addArticle->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addArticle->bindValue(':makerid', $this->makerid, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addArticle->execute();
    }

    public function getArticlesList() {
        $articleList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `maker` FROM `' . self::PREFIX . 'articles`';
        $articleResult = $this->db->query($query);
        if (is_object($articleResult)) {
            $articleList = $articleResult->fetchAll(pdo::FETCH_OBJ);
        }
        return $articleList;
    }

    public function getArticlesContent() {
        $articleContentList = array();
        $query = 'SELECT `id`, `title`, `content`,  DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `maker` FROM `' . self::PREFIX . 'articles` WHERE id = :id';
        $articleContentResult = $this->db->prepare($query);
        $articleContentResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $articleContentResult->execute();
        if ($articleContentResult->execute()) {
            $articleContentList = $articleContentResult->fetch(pdo::FETCH_OBJ);
        }
        return $articleContentList;
    }

}
