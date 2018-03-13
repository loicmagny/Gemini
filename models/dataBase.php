<?php
/*
 * La classe dataBase assure la liaison avec la base de données. 
 * L'attribut $db sera disponible dans ses enfants et contient les informations de connection à la base de données.
 */
class dataBase {

    protected $db;
    const PREFIX = 'NCV9fL8njjsAB9Me_';

    protected function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=gemini;charset=utf8', 'usrgemini', 'BdwYdBf4x2dLf9Wt');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    protected function __destruct() {
        $this->db = NULL;
    }

}

?>
