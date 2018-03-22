<?php

/*
 * La classe tips contient toutes les méthodes concernant les conseils contenus dans la base de données
 * Elle est enfant de dataBase
 */

class tips extends dataBase {

    public $id = 0;
    public $title = '';
    public $content = '';
    public $date = '1990-01-01';
    public $valid = 0;
    public $id_author = 0;
    public $id_admin = NULL;
    private $tablename = TABLEPREFIX . 'tips';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'ajouter un conseil à la base de données
     */

    public function addTips() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO ' . $this->tablename . '(`title`, `content`, `date`, `id_author`) VALUES(:title, :content, :date, :id_author)';
        $addTip = $this->db->prepare($query);
        $addTip->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addTip->bindValue(':content', $this->content, PDO::PARAM_STR);
        $addTip->bindValue(':date', $this->date, PDO::PARAM_STR);
        $addTip->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addTip->execute();
    }

    /*
     * Cette méthode permet de récupérer et d'afficher la liste des conseils contenus dans la base de données
     */

    public function getTipsList() {
        $tipsList = array();
        $query = 'SELECT
    ' . $this->tablename . '.`id`,
    ' . $this->tablename . '.`title`,
    ' . $this->tablename . '.`content`,
    ' . $this->tablename . '.`id_author`,
    `NCV9fL8njjsAB9Me_user`.`login`,
    DATE_FORMAT(
        ' . $this->tablename . '.`date`,
        "%d/%m/%Y"
    ) AS DATE
FROM
    (
        ' . $this->tablename . '
    LEFT JOIN
        `NCV9fL8njjsAB9Me_user`
    ON
        `NCV9fL8njjsAB9Me_user`.`id` = ' . $this->tablename . '.`id_author`
    )';
        $tipsResult = $this->db->query($query);
        $tipsList = $tipsResult->fetchAll(PDO::FETCH_OBJ);
        return $tipsList;
    }

    /*
     * Cette méthode permet de récupérer le contenu du conseil en fonction de son id
     */

    public function getTipsContent() {
        $query = 'SELECT
    `NCV9fL8njjsAB9Me_tips`.`id`,
    `NCV9fL8njjsAB9Me_tips`.`title`,
    `NCV9fL8njjsAB9Me_tips`.`content`,
    `NCV9fL8njjsAB9Me_tips`.`id_author`,
    `NCV9fL8njjsAB9Me_user`.`login`,
    `NCV9fL8njjsAB9Me_user`.`profilePic`,
    DATE_FORMAT(
        `NCV9fL8njjsAB9Me_tips`.`date`,
        "%d/%m/%Y"
    ) AS DATE
FROM
    (
        `NCV9fL8njjsAB9Me_tips`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_user`
    ON
        `NCV9fL8njjsAB9Me_user`.`id` = `NCV9fL8njjsAB9Me_tips`.`id_author`
    )
WHERE
    `NCV9fL8njjsAB9Me_tips`.`id` = :id';
        $tipsResult = $this->db->prepare($query);
        $tipsResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $tipsResult->execute();
        if ($tipsResult->execute()) {
            $tipsList = $tipsResult->fetch(PDO::FETCH_OBJ);
        } else {
            $tipsList = false;
        }
        return $tipsList;
    }

    function __destruct() {
        
    }

}
