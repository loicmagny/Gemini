<?php

class definition extends dataBase {

    public $id = 0;
    public $defname = '';
    public $defcontent = '';

    public function __construct() {
        parent::__construct();
    }

    public function definitionList() {
        $query = ' SELECT `id`, `defname`, `description` FROM definition';
        $definitionResult = $this->db->query($query);
        $definitionList = $definitionResult->fetchAll(PDO::FETCH_OBJ);
        return $definitionList;
    }

    function __destruct() {
        
    }

}
