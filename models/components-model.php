<?php

class components extends dataBase {

    public $id = 0;
    public $componentname = '';
    public $description = '';
    public $type = 0;

    public function __construct() {
        parent::__construct();
    }

    public function componentSearch() {
        $query = 'SELECT `id`, `componentsname`, `description`, `type`, `productId` FROM `' . self::PREFIX . 'components` WHERE componentsname = :componentsname AND type = :type';
        $componentSearch = $this->db->prepare($query);
        $componentSearch->bindValue(':componentsname', $this->componentsname, PDO::PARAM_STR);
        $componentSearch->bindValue(':type', $this->type, PDO::PARAM_STR);
        $componentSearch->execute();
        if ($componentSearch->execute()) {
            $componentList = $componentSearch->fetch(PDO::FETCH_OBJ);
        }
        return $componentList;
    }

    function __destruct() {
        
    }

}
