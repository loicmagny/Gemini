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
    public $id_products = '';
    public $id_type = '';
    public $id_user = '';
    private $tablename = TABLEPREFIX . 'components';

    public function __construct() {
        parent::__construct();
    }

    public function addComponent() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`name`, `description`, `id_type`, `id_products`, `id_user`) VALUES (:name, :description, :id_type, :id_products, :id_user)';
        $addComponent = $this->db->prepare($query);
        $addComponent->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addComponent->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addComponent->bindValue(':id_type', $this->id_type, PDO::PARAM_INT);
        $addComponent->bindValue(':id_products', $this->id_products, PDO::PARAM_INT);
        $addComponent->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        return $addComponent->execute();
    }

    public function getAllComponents() {
        $query = 'SELECT `id`, `name` FROM ' . $this->tablename . '';
        $getAllComponents = $this->db->query($query);
        if (is_object($getAllComponents)) {
            $componentList = $getAllComponents->fetchAll(PDO::FETCH_OBJ);
        }
        return $componentList;
    }

    public function getComponent() {
        $query = 'SELECT
    ' . $this->tablename . '.`id`,
    ' . $this->tablename . '.`name`,
    ' . $this->tablename . '.`description`,
    ' . $this->tablename . '.`id_type`,
    ' . $this->tablename . '.`id_products`,
    `NCV9fL8njjsAB9Me_products`.`id`,
    `NCV9fL8njjsAB9Me_products`.`name` AS product_name,
    `NCV9fL8njjsAB9Me_type`.`id`,
    `NCV9fL8njjsAB9Me_type`.`type`
FROM
    (
        ' . $this->tablename . '
    LEFT JOIN
        `NCV9fL8njjsAB9Me_products`
    ON
        ' . $this->tablename . '.`id_products` = `NCV9fL8njjsAB9Me_products`.`id`
        LEFT JOIN
        `NCV9fL8njjsAB9Me_type`
    ON
        ' . $this->tablename . '.`id_type` = `NCV9fL8njjsAB9Me_type`.`id`
    )
WHERE
    ' . $this->tablename . '.`id` = :id';
        $getComponent = $this->db->prepare($query);
        $getComponent->bindValue(':id', $this->id, PDO::PARAM_STR);
        $getComponent->execute();
        if ($getComponent->execute()) {
            $componentList = $getComponent->fetch(PDO::FETCH_OBJ);
        }
        return $componentList;
    }

    public function getComponentDescription() {
        $query = 'SELECT `id`, `description` FROM ' . $this->tablename . ' WHERE id = :id';
        $getComponentDescription = $this->db->prepare($query);
        $getComponentDescription->bindValue(':id', $this->id, PDO::PARAM_STR);
        $getComponentDescription->execute();
        if ($getComponentDescription->execute()) {
            $componentListDescription = $getComponentDescription->fetch(PDO::FETCH_OBJ);
        }
        return $componentListDescription;
    }

    /*
     * Cette méthode permet d'effectuer une recherche dans la table components en fonction des informations entrées par l'utilisateur dans la vue.
     */

    function componentSearch() {
        $query = 'SELECT `id`, `name`, `description`, `id_type`, `id_products` FROM ' . $this->tablename . ' WHERE name = :name AND id_type = :id_type';
        $componentSearch = $this->db->prepare($query);
        $componentSearch->bindValue(':name', $this->name, PDO::PARAM_STR);
        $componentSearch->bindValue(':id_type', $this->type, PDO::PARAM_STR);
        $componentSearch->execute();
        if ($componentSearch->execute()) {
            $componentList = $componentSearch->fetch(PDO::FETCH_OBJ);
        }
        return $componentList;
    }

    public function updateName() {
        $query = 'UPDATE ' . $this->tablename . ' SET `name` = :name, id_user = :id_user WHERE `id` = :id';
        $updateName = $this->db->prepare($query);
        $updateName->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateName->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateName->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $updateName->execute();
    }

    public function updateDescription() {
        $query = 'UPDATE ' . $this->tablename . ' SET `description` = :description, id_user = :id_user WHERE `id` = :id';
        $updateDescription = $this->db->prepare($query);
        $updateDescription->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateDescription->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateDescription->bindValue(':description', $this->description, PDO::PARAM_STR);
        return $updateDescription->execute();
    }

    public function updateProduct() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_product` = :id_product, id_user = :id_user WHERE `id` = :id';
        $updateProduct = $this->db->prepare($query);
        $updateProduct->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateProduct->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateProduct->bindValue(':id_product', $this->id_products, PDO::PARAM_INT);
        return $updateProduct->execute();
    }

    public function updateType() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_type` = :id_type, id_user = :id_user WHERE `id` = :id';
        $updateType = $this->db->prepare($query);
        $updateType->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateType->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $updateType->bindValue(':id_type', $this->id_type, PDO::PARAM_INT);
        return $updateType->execute();
    }

    function deleteComponent() {
        $query = 'DELETE FROM ' . $this->tablename . ' WHERE id = :id';
        $deleteComponent = $this->db->prepare($query);
        $deleteComponent->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deleteComponent->execute();
        return $deleteComponent;
    }

    function __destruct() {
        
    }

}
