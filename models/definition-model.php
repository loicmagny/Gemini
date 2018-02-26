<?php

class definition extends dataBase {

    public $id = 0;
    public $defname = '';
    public $defcontent = '';

    public function __construct() {
        parent::__construct();
    }

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

//            function searchPatients($search) {
//        $searchPatientResult = array();
//        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `lastname` LIKE :search OR `firstname` LIKE :search';
//        $searchPatient = $this->db->prepare($query);
//        $searchPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
//        if ($searchPatient->execute()) {
//            $searchPatientResult = $searchPatient->fetchAll(PDO::FETCH_OBJ);
//        }
//        return $searchPatientResult;
//    }
    function __destruct() {
        
    }

}
