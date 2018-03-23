<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of role-model
 *
 * @author loic
 */
class role extends dataBase {

    public $id = 0;
    public $role = '';
    private $tablename = TABLEPREFIX . 'role';

    public function __construct() {
        parent::__construct();
    }

    public function addRole() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`role`) VALUES (:role)';
        $addRole = $this->db->prepare($query);
        $addRole->bindValue(':role', $this->role, PDO::PARAM_STR);
        return $addRole->execute();
    }

    public function getRoleList() {
        $roleListResult = array();
        $query = 'SELECT `id`, `role` FROM ' . $this->tablename . '';
        $roleList = $this->db->query($query);
        if (is_object($roleList)) {
            $roleListResult = $roleList->fetchAll(pdo::FETCH_OBJ);
        }
        return $roleListResult;
    }

}
