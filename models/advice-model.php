<?php

class advice extends dataBase {

    public function __construct() {
        parent::__construct();
    }

    public function addAdvice() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'advices`(`title`, `content`, `date`, `loginAuthor`) VALUES (:title, :content, :date, :loginAuthor)';
        $addAdvice = $this->db->prepare($query);
        $addAdvice->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addAdvice->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addAdvice->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addAdvice->bindValue(':loginAuthor', $this->loginAuthor, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addAdvice->execute();
    }

    public function getAdvicesList() {
        $advicesList = array();
        $query = 'SELECT `id`, `title`, `content`, `loginAuthor`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'advices`';
        $advicesResult = $this->db->query($query);
        $advicesList = $advicesResult->fetchAll(PDO::FETCH_OBJ);
        return $advicesList;
    }

    public function getAdviceContent() {
        $query = 'SELECT `id`, `title`, `content`, `loginAuthor`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'advices` WHERE id = :id';
        $advicesResult = $this->db->prepare($query);
        $advicesResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $advicesResult->execute();
        if ($advicesResult->execute()) {
            $adviceList = $advicesResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            $adviceList = false;
        }
        return $adviceList;
    }

//
//    public function getPostListPagination($offset) {
//        $query = 'SELECT `id`, `post`, `postmaker`, `topicid`, DATE_FORMAT(`date`, "%d/%m/%Y") AS date FROM `' . self::PREFIX . 'topic` WHERE topicid = :topicid LIMIT 25 OFFSET :offset ';
//        $advicesResult = $this->db->prepare($query);
//        $advicesResult->bindValue(':offset', $offset, PDO::PARAM_INT);
//        $advicesResult->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
//        if ($advicesResult->execute()) {
//            $postList = $advicesResult->fetchAll(PDO::FETCH_OBJ);
//        } else {
//            $postList = false;
//        }
//        return $postList;
//    }
//
//    /**
//     * Cette fonction permet de récupérer le nombre de patient
//     */
//    Public function countPost() {
//        $query = 'SELECT COUNT(`id`) AS `numberPost` FROM `' . self::PREFIX . 'topic` WHERE topicid = :topicid';
//        $postCount = $this->db->prepare($query);
//        $postCount->bindValue(':topicid', $this->topicid, PDO::PARAM_INT);
//        $postCount->execute();
//        if ($postCount->execute()) {
//            $postCountResult = $postCount->fetch(PDO::FETCH_OBJ);
//        } else {
//            $postCountResult = false;
//        }
//        return $postCountResult;
//    }
}
