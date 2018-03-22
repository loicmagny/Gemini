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
    public $name = '';
    public $description = '';
    //id_NCV9fL8njjsAB9Me_type définit le id_NCV9fL8njjsAB9Me_type de produit dont il s'agit, s'il est alimentaire, cosmétique, médical etc
    public $id_NCV9fL8njjsAB9Me_type = 0;
    //brand désigne la marque du produit
    public $id_NCV9fL8njjsAB9Me_brand = 0;
    public $id_NCV9fL8njjsAB9Me_user = 0;
    private $tablename = TABLEPREFIX . 'products';

    public function __construct() {
        parent::__construct();
    }

    /*
     * Cette méthode permet à un utilisateur d'effectuer une recherche parmi la liste des produits de la base de données.
     * La requête intègre ue jointure afin de récupèrer les différents composants du produit contenus, eux dans la table components 
     */

    public function productSearch() {
        $query = 'SELECT
    `NCV9fL8njjsAB9Me_products`.`id`,
    `NCV9fL8njjsAB9Me_products`.`name`,
    `NCV9fL8njjsAB9Me_products`.`description`,
    `NCV9fL8njjsAB9Me_products`.`id_NCV9fL8njjsAB9Me_type`,
    `NCV9fL8njjsAB9Me_products`.`id_NCV9fL8njjsAB9Me_brand`,
    `NCV9fL8njjsAB9Me_products`.`id`,
    `NCV9fL8njjsAB9Me_components`.`name` AS componentsName,
    `NCV9fL8njjsAB9Me_components`.`description` AS description,
    `NCV9fL8njjsAB9Me_components`.`id_NCV9fL8njjsAB9Me_type`
FROM
    (
        `NCV9fL8njjsAB9Me_products`
    LEFT JOIN
        `NCV9fL8njjsAB9Me_components`
    ON
        `NCV9fL8njjsAB9Me_products`.`id` = `NCV9fL8njjsAB9Me_components`.`id_NCV9fL8njjsAB9Me_type`
    )
WHERE
    `NCV9fL8njjsAB9Me_products`.`name` = :name AND `NCV9fL8njjsAB9Me_products`.`id_NCV9fL8njjsAB9Me_type` = :id_NCV9fL8njjsAB9Me_type AND `NCV9fL8njjsAB9Me_products`.`id_NCV9fL8njjsAB9Me_brand` = :id_NCV9fL8njjsAB9Me_brand';
        $productSearch = $this->db->prepare($query);
        $productSearch->bindValue(':name', $this->name, PDO::PARAM_STR);
        $productSearch->bindValue(':id_NCV9fL8njjsAB9Me_type', $this->id_NCV9fL8njjsAB9Me_type, PDO::PARAM_STR);
        $productSearch->bindValue(':id_NCV9fL8njjsAB9Me_brand', $this->brand, PDO::PARAM_STR);
        $productSearch->execute();
        if ($productSearch->execute()) {
            $productList = $productSearch->fetch(PDO::FETCH_OBJ);
        }
        return $productList;
    }

    function __destruct() {
        
    }

}
