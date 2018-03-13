<?php
/*
 * La classe components contient l'ensemble des méthodes qui concernent les composants des produits
 * Elle est enfant de dataBase
 * NB: Les composants correspondent aux différents éléments qui composent un produit. Chaque composant est contenu dans un produit, et chaque produit possède des composants.
 */
class components extends dataBase {

    public $id = 0;
    public $componentname = '';
    public $description = '';
    public $type = 0;

    public function __construct() {
        parent::__construct();
    }
/*
 * Cette méthode permet d'effectuer une recherche dans la table components en fonction des informations entrées par l'utilisateur dans la vue.
 */
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
