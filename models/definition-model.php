<?php
/*
 * La classse definition contient toutes les méthodes relatives au glossaire du site
 * Elle est enfant de dataBase
 */
class definition extends dataBase {

    public $id = 0;
    public $defname = '';
    public $defcontent = '';

    public function __construct() {
        parent::__construct();
    }
/*
 * Cette méthode permet de récupérer l'ensemble des définition contenues dans la base de données en fonction d'une pagination alphabétique.
 */
    public function definitionList($search) {
        $DefinitionList = array();
        $query = 'SELECT `id`, `defname`, `description` FROM `' . self::PREFIX . 'definition` WHERE `defname` LIKE :search ORDER BY `defname` ASC';
        $definitionResult = $this->db->prepare($query);
        $definitionResult->bindValue(':search', $search . '%', PDO::PARAM_STR);
        $definitionResult->execute();
        if ($definitionResult->execute()) {
            $definitionList = $definitionResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $definitionList;
    }

    function __destruct() {
        
    }

}
