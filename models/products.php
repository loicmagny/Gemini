<?php

class products extends dataBase {

    public $id = 0;
    public $productname = '';
    public $description = '';
    public $type = 0;
    public $brand = '';

    public function __construct() {
        parent::__construct();
    }

    public function productSearch() {
        $query = 'SELECT `products`.`id`, `products`.`productname`, `products`.`description`, `products`.`type`, `products`.`brand`, `components`.`id`, `components`.`componentsname`, `components`.`description` AS description, `components`.`type`,`components`.`productId` FROM (`products` LEFT JOIN `components` ON `products`.`id` = `components`.`productId`) WHERE `products`.`productname` = :productname AND `products`.`type` = :type AND `products`.`brand` = :brand';
        $productSearch = $this->db->prepare($query);
        $productSearch->bindValue(':productname', $this->productname, PDO::PARAM_STR);
        $productSearch->bindValue(':type', $this->type, PDO::PARAM_INT);
        $productSearch->bindValue(':brand', $this->brand, PDO::PARAM_STR);
        $productSearch->execute();
        if ($productSearch->execute()) {
            if (is_object($productSearch)) {
                $productList = $productSearch->fetch(PDO::FETCH_OBJ);
            }
            return $productList;
        }
    }

    function __destruct() {
        
    }

}
