<?php

class advice extends dataBase {

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

    public function addAdvice() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'advices`(`title`, `content`, `date`, `author`, `id_author`, `authorPic`) VALUES (:title, :content, :date, :author, :id_author, :authorPic)';
        $addAdvice = $this->db->prepare($query);
        $addAdvice->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addAdvice->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addAdvice->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addAdvice->bindValue(':author', $this->author, PDO::PARAM_STR);
        $addAdvice->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);
        $addAdvice->bindValue(':authorPic', $this->authorPic, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addAdvice->execute();
    }

    public function getAdvicesList() {
        $advicesList = array();
        $query = 'SELECT `id`, `title`, `content`, `author`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'advices`';
        $advicesResult = $this->db->query($query);
        $advicesList = $advicesResult->fetchAll(PDO::FETCH_OBJ);
        return $advicesList;
    }

    public function getAdviceContent() {
        $query = 'SELECT `id`, `title`, `content`, `author`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date, `author`, `id_author`, `authorPic` FROM `' . self::PREFIX . 'advices` WHERE id = :id';
        $advicesResult = $this->db->prepare($query);
        $advicesResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $advicesResult->execute();
        if ($advicesResult->execute()) {
            $adviceList = $advicesResult->fetch(PDO::FETCH_OBJ);
        } else {
            $adviceList = false;
        }
        return $adviceList;
    }

    function __destruct() {
        
    }

}
