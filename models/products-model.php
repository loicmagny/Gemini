<?php

/*
 * La classe products contient toutes les méthodes relatives aux produits telle que la recherche,
 * Elle est enfant de dataBase.
 * NB: le terme "produits" désigne tout produit fini dont l'utilisation/la consommation est quotidienne.
 * Sont considérés comme produits les "produits" les différents consommables de la vie de tout les jours (nourriture, parfums, crèmes, lessives etc)
 */

class products extends dataBase {

    public $id = 0;
    public $name = '';
    public $description = '';
    //id_type définit l'id du type de produit dont il s'agit, s'il est alimentaire, cosmétique, médical etc
    public $id_type = 0;
    //id_brand désigne l'id de la marque du produit
    public $id_brand = 0;
    public $id_user = 0;
    private $tablename = TABLEPREFIX . 'products';

    public function __construct() {
        parent::__construct();
    }
/*
 * La méthode addProduct() permet d'insérer un produit dans la base de données.
 */
    public function addProduct() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`name`, `description`, `id_type`, `id_brand`, `id_user`) VALUES (:name, :description, :id_type, :id_brand, :id_user)';
        $addProduct = $this->db->prepare($query);
        $addProduct->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addProduct->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addProduct->bindValue(':id_type', $this->id_type, PDO::PARAM_INT);
        $addProduct->bindValue(':id_brand', $this->id_brand, PDO::PARAM_INT);
        $addProduct->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $addProduct->execute();
    }
/*
 * La méthodé getAllProducts permet de récupérer la totalité des produits disponible en base de données
 * et de les afficher dans un <select>
 */
    public function getAllProducts() {
        $query = 'SELECT `id`, `name` FROM ' . $this->tablename . '';
        $getAllProducts = $this->db->query($query);
        if (is_object($getAllProducts)) {
            $productList = $getAllProducts->fetchAll(PDO::FETCH_OBJ);
        }
        return $productList;
    }
/*
 * La méthode getProduct permet de récupérer un seul et unique produit présent en base de données
 */
    public function getProduct() {
        $query = 'SELECT
    ' . $this->tablename . '.`id`,
    ' . $this->tablename . '.`name`,
    ' . $this->tablename . '.`description`,
    ' . $this->tablename . '.`id_type`,
    ' . $this->tablename . '.`id_brand`,
    `NCV9fL8njjsAB9Me_brand`.`id`,
    `NCV9fL8njjsAB9Me_brand`.`brand`,
    `NCV9fL8njjsAB9Me_type`.`id`,
    `NCV9fL8njjsAB9Me_type`.`type`
FROM
    (
        ' . $this->tablename . '
    LEFT JOIN
        `NCV9fL8njjsAB9Me_brand`
    ON
        ' . $this->tablename . '.`id_brand` = `NCV9fL8njjsAB9Me_brand`.`id`
        LEFT JOIN
        `NCV9fL8njjsAB9Me_type`
    ON
        ' . $this->tablename . '.`id_type` = `NCV9fL8njjsAB9Me_type`.`id`
    )
WHERE
    ' . $this->tablename . '.`id` = :id';
        $getProduct = $this->db->prepare($query);
        $getProduct->bindValue(':id', $this->id, PDO::PARAM_STR);
        $getProduct->execute();
        if ($getProduct->execute()) {
            $productList = $getProduct->fetch(PDO::FETCH_OBJ);
        }
        return $productList;
    }

    /*
     * Cette méthode permet à un utilisateur d'effectuer une recherche parmi la liste des produits de la base de données.
     * La requête intègre ue jointure afin de récupèrer les différents composants du produit contenus, eux dans la table components 
     */

    public function productSearch() {
        $query = 'SELECT
    ' . $this->tablename . '.`id`,
    ' . $this->tablename . '.`name`,
    ' . $this->tablename . '.`description`,
    ' . $this->tablename . '.`id_type`,
    ' . $this->tablename . '.`id_brand`,
    ' . $this->tablename . '.`id`,
    `NCV9fL8njjsAB9Me_components`.`name` AS componentsName,
    `NCV9fL8njjsAB9Me_components`.`description` AS description,
    `NCV9fL8njjsAB9Me_components`.`id_type`
FROM
    (
        ' . $this->tablename . '
    LEFT JOIN
        `NCV9fL8njjsAB9Me_components`
    ON
        ' . $this->tablename . '.`id` = `NCV9fL8njjsAB9Me_components`.`id_type`
    )
WHERE
    ' . $this->tablename . '.`name` = :name AND ' . $this->tablename . '.`id_type` = :id_type AND ' . $this->tablename . '.`id_brand` = :id_brand';
        $productSearch = $this->db->prepare($query);
        $productSearch->bindValue(':name', $this->name, PDO::PARAM_STR);
        $productSearch->bindValue(':id_type', $this->id_type, PDO::PARAM_STR);
        $productSearch->bindValue(':id_brand', $this->brand, PDO::PARAM_STR);
        $productSearch->execute();
        if ($productSearch->execute()) {
            $productList = $productSearch->fetch(PDO::FETCH_OBJ);
        }
        return $productList;
    }
/*
 * La méthode updateName permet de modifier le nom du produit spécifié
 */
    public function updateName() {
        $query = 'UPDATE ' . $this->tablename . ' SET `name` = :name, id_user = :id_user WHERE `id` = :id';
        $updateName = $this->db->prepare($query);
        $updateName->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateName->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateName->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $updateName->execute();
    }
/*
 * La méthode updateDescription permet de modifier la description du produit spécifié
 */
    public function updateDescription() {
        $query = 'UPDATE ' . $this->tablename . ' SET `description` = :description, id_user = :id_user WHERE `id` = :id';
        $updateDescription = $this->db->prepare($query);
        $updateDescription->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateDescription->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateDescription->bindValue(':description', $this->description, PDO::PARAM_STR);
        return $updateDescription->execute();
    }
/*
 * La méthode updateBrand permet de modifier la marque du produit spécifié
 */
    public function updateBrand() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_brand` = :id_brand, id_user = :id_user WHERE `id` = :id';
        $updateBrand = $this->db->prepare($query);
        $updateBrand->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateBrand->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateBrand->bindValue(':id_brand', $this->id_brand, PDO::PARAM_INT);
        return $updateBrand->execute();
    }
/*
 * La méthode updateType permet de modifier le type du produit spécifié
 */
    public function updateType() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_type` = :id_type, id_user = :id_user WHERE `id` = :id';
        $updateType = $this->db->prepare($query);
        $updateType->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateType->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateType->bindValue(':id_type', $this->id_type, PDO::PARAM_INT);
        return $updateType->execute();
    }
/*
 * La méthode deleteProduct permet de supprimer le produit sélectionné
 */
    public function deleteProduct() {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE id = :id';
        $deleteProduct = $this->db->prepare($query);
        $deleteProduct->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deleteProduct->execute();
        return $deleteProduct;
    }

    function __destruct() {
        
    }

}
