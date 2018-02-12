<?php

class definition extends dataBase {

    public $id = 0;
    public $defname = '';
    public $defcontent = '';

    public function __construct() {
        parent::__construct();
    }

    public function definitionList() {
        if (isset($_GET['letter'])) {
            $defintion = $_GET['letter'];
            $query = ' SELECT `id`, `defname`, `description` FROM definition WHERE `defname` LIKE :definition';
            $defList = '%' . $defintion . '%';
            $definitionResult = $this->db->prepare($query);
            $definitionResult->execute(['definition' => $defList]);
            $definitionList = $definitionResult->fetchAll(PDO::FETCH_OBJ);
            return $definitionList;
        }
    }

    function __destruct() {
        
    }

}
