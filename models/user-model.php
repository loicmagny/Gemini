<?php

class user extends dataBase {

    public $id = 0;
    public $login = '';
    public $password = '';
    public $birthdate = '01/01/1900';
    public $mail = '';
    public $profilePic = '';

    public function __construct() {
        parent::__construct();
    }

    public function addUser() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'user`(`login`, `password`, `birthdate`, `mail`, `profilePic`) VALUES (:login, :password, :birthdate, :mail, :profilePic)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':profilePic', $this->profilePic, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addUser->execute();
    }

    public function userConnect() {
        $query = 'SELECT `id`, `login`, `password`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `mail`, `profilePic` FROM `' . self::PREFIX . 'user` WHERE `login` = :login AND `password` = :password';
        $userConnect = $this->db->prepare($query);
        $userConnect->bindValue(':login', $this->login, PDO::PARAM_STR);
        $userConnect->bindValue(':password', $this->password, PDO::PARAM_STR);
        $userConnect->execute();
        if ($userConnect->execute()) {
            $userList = $userConnect->fetch(PDO::FETCH_OBJ);
        }
        return $userList;
    }

    public function getCryptedPassword() {
        $isCorrect = false;
        $query = 'SELECT `password` FROM `' . self::PREFIX . 'user` WHERE `login` = :login';
        $getPassword = $this->db->prepare($query);
        $getPassword->bindValue(':login', $this->login, PDO::PARAM_STR);
        $getPassword->execute();
        if ($getPassword->execute()) {
            if (is_object($getPassword)) {
                $passwordObtained = $getPassword->fetch(PDO::FETCH_OBJ);
                if (!empty($passwordObtained)) {
                    $this->password = $passwordObtained->password;
                    $isCorrect = true;
                }
            }
            return $isCorrect;
        }
    }

    function __destruct() {
        
    }

}
