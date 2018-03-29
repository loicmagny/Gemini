<?php

class brand extends dataBase {

    public $id = 0;
    public $brand = '';
    public $id_user = '';
    private $tablename = TABLEPREFIX . 'brand';

    public function __construct() {
        parent::__construct();
    }

    /*
     * La méthode addUser() permet d'insérer un nouvel utilisateur dans la base de données.
     * On insère le login, le mot de passe, la date de naissance, le mail, la couleur de la barre de navigation (optionnel),
     * la couleur de la barre de navigation utilisateur (otpionnel) et le code de confirmation envoyé par mail
     */

    public function addBrand() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`brand`, `id_user`) VALUES (:brand, :id_user)';
        $addBrand = $this->db->prepare($query);
        $addBrand->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $addBrand->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $addBrand->execute();
    }

    public function getAllBrands() {
        $query = 'SELECT `id`, `brand` FROM ' . $this->tablename . '';
        $getAllBrands = $this->db->query($query);
        if (is_object($getAllBrands)) {
            $brandsList = $getAllBrands->fetchAll(PDO::FETCH_OBJ);
        }
        return $brandsList;
    }

    public function updateBrand() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_user` = :id_user, `brand` = :brand WHERE `id` = :id';
        $updateBrand = $this->db->prepare($query);
        $updateBrand->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateBrand->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $updateBrand->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $updateBrand->execute();
    }

    public function deleteBrand() {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE id = :id';
        $deleteBrand = $this->db->prepare($query);
        $deleteBrand->bindValue('id', $this->id, PDO::PARAM_INT);
        $deleteBrand->execute();
        return $deleteBrand;
    }

    function __destruct() {
        
    }

}
