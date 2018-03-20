<?php

/*
 * La classe products contient toutes les méthodes relatives aux produits tel que la recherche,
 * Elle est enfant de dataBase.
 * 
 * NB: le terme "produits" désigne tout produit fini dont l'utilisation/la consommation est quotidienne.
 * Sont considérés comme produits les "produits" les différents consommables de la vie de tout les jours (nourriture, crème, maquillage, lessive etc)
 */

class products extends dataBase {

    public $id = 0;
    public $productname = '';
    public $description = '';
    //type définit le type de produit dont il s'agit, s'il est alimentaire, cosmétique, médical etc
    public $type = 0;
    //brand désigne la marque du produit
    public $brand = '';
    private $tablename = TABLEPREFIX . 'products';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet à un utilisateur d'effectuer une recherche parmi la liste des produits de la base de données.
     * La requête intègre ue jointure afin de récupèrer les différents composants du produit contenus, eux dans la table components 
     */

    public function productSearch() {
        $query = 'SELECT ' . $this->tablename . '.`id`, ' . $this->tablename . '.`productname`, ' . $this->tablename . '.`description`, ' . $this->tablename . '.`type`, ' . $this->tablename . '.`brand`, ' . $this->tablename . '.`id`, ' . $this->tablename . '.`componentsname`, ' . $this->tablename . '.`description` AS description, ' . $this->tablename . '.`type`,' . $this->tablename . '.`productId` FROM (' . $this->tablename . ' LEFT JOIN ' . $this->tablename . ' ON ' . $this->tablename . '.`id` = ' . $this->tablename . '.`productId`) WHERE ' . $this->tablename . '.`productname` = :productname AND ' . $this->tablename . '.`type` = :type AND ' . $this->tablename . '.`brand` = :brand';
        $productSearch = $this->db->prepare($query);
        $productSearch->bindValue(':productname', $this->productname, PDO::PARAM_STR);
        $productSearch->bindValue(':type', $this->type, PDO::PARAM_STR);
        $productSearch->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $productSearch->execute();
        if ($productSearch->execute()) {
            $productList = $productSearch->fetch(PDO::FETCH_OBJ);
        }
        return $productList;
    }

    function __destruct() {
        
    }

}
