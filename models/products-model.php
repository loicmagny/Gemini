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
