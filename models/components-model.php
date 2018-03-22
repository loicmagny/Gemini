<?php

/*
 * La classe components contient l'ensemble des méthodes qui concernent les composants des produits
 * Elle est enfant de dataBase
 * NB: Les composants correspondent aux différents éléments qui composent un produit. Chaque composant est contenu dans un produit, et chaque produit possède des composants.
 */

class components extends dataBase {

    public $id = 0;
    public $name = '';
    public $description = '';
    public $id_NCV9fL8njjsAB9Me_products = '';
    public $id_NCV9fL8njjsAB9Me_type = '';
    public $id_NCV9fL8njjsAB9Me_user = '';
    private $tablename = TABLEPREFIX . 'components';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet d'effectuer une recherche dans la table components en fonction des informations entrées par l'utilisateur dans la vue.
     */

    public function componentSearch() {
        $query = 'SELECT `id`, `name`, `description`, `id_NCV9fL8njjsAB9Me_type`, `id_NCV9fL8njjsAB9Me_products` FROM ' . $this->tablename . ' WHERE name = :name AND id_NCV9fL8njjsAB9Me_type = :id_NCV9fL8njjsAB9Me_type';
        $componentSearch = $this->db->prepare($query);
        $componentSearch->bindValue(':name', $this->name, PDO::PARAM_STR);
        $componentSearch->bindValue(':id_NCV9fL8njjsAB9Me_type', $this->type, PDO::PARAM_STR);
        $componentSearch->execute();
        if ($componentSearch->execute()) {
            $componentList = $componentSearch->fetch(PDO::FETCH_OBJ);
        }
        return $componentList;
    }

    function __destruct() {
        
    }

}
