<?php

class type extends dataBase {

    public $id = 0;
    public $type = '';
    private $tablename = TABLEPREFIX . 'type';

    public function __construct() {
        parent::__construct();
    }

    /*
     * La méthode addUser() permet d'insérer un nouvel utilisateur dans la base de données.
     * On insère le login, le mot de passe, la date de naissance, le mail, la couleur de la barre de navigation (optionnel),
     * la couleur de la barre de navigation utilisateur (otpionnel) et le code de confirmation envoyé par mail
     */

    public function addType() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`type`) VALUES (:type)';
        $addType = $this->db->prepare($query);
        $addType->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $addType->execute();
    }

    public function getAllTypes() {
        $query = 'SELECT `id`, `type` FROM ' . $this->tablename . '';
        $getAllTypes = $this->db->query($query);
        if (is_object($getAllTypes)) {
            $typesList = $getAllTypes->fetchAll(PDO::FETCH_OBJ);
        }
        return $typesList;
    }

    public function updateType() {
        $query = 'UPDATE ' . $this->tablename . ' SET `type` = :type WHERE `id` = :id';
        $updateType = $this->db->prepare($query);
        $updateType->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateType->bindValue(':type', $this->type, PDO::PARAM_STR);
        return $updateType->execute();
    }

    public function deleteType() {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE id = :id';
        $deleteType = $this->db->prepare($query);
        $deleteType->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deleteType->execute();
        return $deleteType;
    }

    function __destruct() {
        
    }

}
