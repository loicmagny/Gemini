<?php

class dataBase {

//L'attribut $db sera disponible dans ses enfants
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=gemini;charset=utf8', 'usrgemini', 'BdwYdBf4x2dLf9Wt');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->db = NULL;
    }

}

?>
