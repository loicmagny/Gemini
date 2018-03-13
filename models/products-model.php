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

    public function __construct() {
        parent::__construct();
    }
/*
 * Cette méthode permet à un utilisateur d'effectuer une recherche parmi la liste des produits de la base de données.
 * La requête intègre ue jointure afin de récupèrer les différents composants du produit contenus, eux dans la table components 
 */
    public function productSearch() {
        $query = 'SELECT `' . self::PREFIX . 'products`.`id`, `' . self::PREFIX . 'products`.`productname`, `' . self::PREFIX . 'products`.`description`, `' . self::PREFIX . 'products`.`type`, `' . self::PREFIX . 'products`.`brand`, `' . self::PREFIX . 'components`.`id`, `' . self::PREFIX . 'components`.`componentsname`, `' . self::PREFIX . 'components`.`description` AS description, `' . self::PREFIX . 'components`.`type`,`' . self::PREFIX . 'components`.`productId` FROM (`' . self::PREFIX . 'products` LEFT JOIN `' . self::PREFIX . 'components` ON `' . self::PREFIX . 'products`.`id` = `' . self::PREFIX . 'components`.`productId`) WHERE `' . self::PREFIX . 'products`.`productname` = :productname AND `' . self::PREFIX . 'products`.`type` = :type AND `' . self::PREFIX . 'products`.`brand` = :brand';
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
