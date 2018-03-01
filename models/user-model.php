<?php

class user extends dataBase {

    public $id = 0;
    public $login = '';
    public $password = '';
    public $birthdate = '01/01/1900';
    public $mail = '';
    public $profilePic = '';
    public $colorNav = '';
    public $colorUserNav = '';

    public function __construct() {
        parent::__construct();
    }

    public function addUser() {
//On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'user` (`login`, `password`, `birthdate`, `mail`, `profilePic`, colorNav, colorUserNav) VALUES (:login, :password, :birthdate, :mail, :profilePic, :colorNav, :colorUserNav)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':profilePic', $this->profilePic, PDO::PARAM_STR);
        $addUser->bindValue(':colorUserNav', $this->colorUserNav, PDO::PARAM_STR);
        $addUser->bindValue(':colorNav', $this->colorNav, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée on retourne vrai
        return $addUser->execute();
    }

    public function userConnect() {
        $query = 'SELECT `id`, `login`, `password`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `mail`, `profilePic`, `colorNav`, `colorUserNav` FROM `' . self::PREFIX . 'user` WHERE `login` = :login AND `password` = :password';
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

    public function getUserInfo($user_id) {
        $isCorrect = false;
        $query = 'SELECT `id`, `login`, `password`, `birthdate`, `mail`, `profilePic`, `colorNav`, `colorUserNav` FROM `' . self::PREFIX . 'user` WHERE `id` = :id';
        $getUserInfo = $this->db->prepare($query);
        $getUserInfo->bindValue(':id', $user_id, PDO::PARAM_INT);
        $getUserInfo->execute();
        if ($getUserInfo->execute()) {
            if (is_object($getUserInfo)) {
                $userInfoObtained = $getUserInfo->fetch(PDO::FETCH_OBJ);
                if (!empty($userInfoObtained)) {
                    $this->login = $userInfoObtained->login;
                    $this->password = $userInfoObtained->password;
                    $this->mail = $userInfoObtained->mail;
                    $this->birthdate = $userInfoObtained->birthdate;
                    $this->profilePic = $userInfoObtained->profilePic;
                    $this->colorNav = $userInfoObtained->colorNav;
                    $this->colorUserNav = $userInfoObtained->colorUserNav;
                    $isCorrect = true;
                }
            }
            return $isCorrect;
        }
    }

    public function updateLogin() {
//On prépare la requête SQL pour les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `login` = :login WHERE `id` = :id';
        $updateLogin = $this->db->prepare($query);
        $updateLogin->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateLogin->bindValue(':login', $this->login, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updateLogin->execute();
    }

    public function updateMail() {
//On prépare la requête SQL pour les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `mail` = :mail WHERE `id` = :id';
        $updateMail = $this->db->prepare($query);
        $updateMail->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updateMail->execute();
    }

    public function updatePic() {
//On prépare la requête SQL pour les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `profilePic` = :profilePic WHERE `id` = :id';
        $updatePic = $this->db->prepare($query);
        $updatePic->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePic->bindValue(':profilePic', $this->profilePic, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updatePic->execute();
    }

    public function updateColorNav() {
//On prépare la requête SQL pour les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `colorNav` = :colorNav WHERE `id` = :id';
        $updateColorNav = $this->db->prepare($query);
        $updateColorNav->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateColorNav->bindValue(':colorNav', $this->colorNav, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updateColorNav->execute();
    }

    public function updateColorUserNav() {
//On prépare la requête SQL pour les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'UPDATE `' . self::PREFIX . 'user` SET `colorUserNav` = :colorUserNav WHERE `id` = :id';
        $updateColorUserNav = $this->db->prepare($query);
        $updateColorUserNav->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateColorUserNav->bindValue(':colorUserNav', $this->colorUserNav, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updateColorUserNav->execute();
    }

    function __destruct() {
        
    }

}
