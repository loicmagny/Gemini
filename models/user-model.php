<?php

/*
 * La class user contient toutes les méthodes qui permettent de récupérer les informations liées aux utilisateurs. 
 * Elle est enfant de dataBase.
 */

class user extends dataBase {

    public $id = 0;
    public $login = '';
    public $password = '';
    public $birthdate = '01/01/1900';
    public $mail = '';
    public $profilePic = '';
    //Couleur de la barre de navigation, peut être modifiée par l'utilisateur
    public $colorNav = '';
    //Couleur de la barre de navigation utilisateur, peut être modifiée par l'utilisateur
    public $colorUserNav = '';
    //Code de confirmation envoyé par mail à l'utilisateur.
    public $confirmCode = '';
    //Booléen qui détermine si un compte utilisateur est activé ou non
    public $activate = 0;
    //Booléen qui détermine si un compte utilisateur détermine si un compte à les droits d'administration ou non
    public $id_role = '';
    private $tablename = TABLEPREFIX . 'user';

    public function __construct() {
        parent::__construct();
    }

    /*
     * La méthode addUser() permet d'insérer un nouvel utilisateur dans la base de données.
     * On insère le login, le mot de passe, la date de naissance, le mail, la couleur de la barre de navigation (optionnel),
     * la couleur de la barre de navigation utilisateur (otpionnel) et le code de confirmation envoyé par mail
     */

    private function addUser() {
        $query = 'INSERT INTO ' . $this->tablename . ' (`login`, `password`, `birthdate`, `mail`, `colorNav`, `colorUserNav`, `confirmCode`) VALUES (:login, :password, :birthdate, :mail, :colorNav, :colorUserNav, :confirmCode)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':colorUserNav', $this->colorUserNav, PDO::PARAM_STR);
        $addUser->bindValue(':colorNav', $this->colorNav, PDO::PARAM_STR);
        $addUser->bindValue(':confirmCode', $this->confirmCode, PDO::PARAM_STR);
        return $addUser->execute();
    }

    /*
     * La méthode confirmUser() permet d'activer le compte d'un utilisateur récemment inscrit
     * à l'aide du code de confirmation evoyé par mail. L'activation du compte permet d'utiliser le compte en question
     */

    private function confirmUser() {
        $query = 'UPDATE ' . $this->tablename . ' SET `activate` = 1 WHERE `login` = :login AND `confirmCode` = :confirmCode AND `password` = :password ';
        $confirmUser = $this->db->prepare($query);
        $confirmUser->bindValue(':confirmCode', $this->confirmCode, PDO::PARAM_STR);
        $confirmUser->bindValue(':login', $this->login, PDO::PARAM_STR);
        $confirmUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $confirmUser->execute();
    }

    /*
     * Cette transaction permet d'ajouter le compte de l'utilisateur uniquement si 
     * l'utilisateur rentre le code de confirmation qu'il a reçu par mail
     */

    public function activateAccount() {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $this->confirmUser();
            $addUser = $this->addUser();
            $this->db->commit();
            return $addUser;
        } catch (Exception $e) {
            $this->db->rollBack();
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    /*
     * La méthode deactivateUser() permet de désactiver le compte d'un utilisateur en vue de sa suppression.
     * Une fois le mot de passe entré le compte est désactivé et l'utilisateur est déconnecté
     */

    public function deactivateUser() {
        $query = 'UPDATE ' . $this->tablename . ' SET `activate` = 0 WHERE `id` = :id AND `password` = :password';
        $deactivateUser = $this->db->prepare($query);
        $deactivateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deactivateUser->bindValue(':password', $this->password, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $deactivateUser->execute();
    }

    /*
     * La méthode userConnect() permet à un utilisateur de se connecter via les variables de session.
     * Cette méthode permet de transporter, via les variables de session, les informations de l'utilisateur à travers tout le site.
     * La connexion est nécéssaire afin de pouvoir interagir sur le site (poster des commentaires).
     */

    public function userConnect() {
        $query = 'SELECT `id`, `login`, `password`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `mail`, `profilePic`, `colorNav`, `colorUserNav`, `confirmCode`, `activate`, `id_role` FROM ' . $this->tablename . ' WHERE `login` = :login AND `password` = :password';
        $userConnect = $this->db->prepare($query);
        $userConnect->bindValue(':login', $this->login, PDO::PARAM_STR);
        $userConnect->bindValue(':password', $this->password, PDO::PARAM_STR);
        $userConnect->execute();
        if ($userConnect->execute()) {
            $userList = $userConnect->fetch(PDO::FETCH_OBJ);
        }
        return $userList;
    }

    /*
     * La méthode getCryptedPassword() permet de récupérer le mot de passé chiffré de l'utilisateur souhaitant se connecter
     * en vue de le comparer au mot de passé entré par l'utilisateur.
     * Cette méthode utilise l'hydratation,
     * C'est une technique qui permet de remplir les attributs de la classe avec les données renvoyées par la requête à la base de données.
     */

    public function getCryptedPassword() {
        $query = 'SELECT `password` FROM ' . $this->tablename . ' WHERE `login` = :login';
        $getPassword = $this->db->prepare($query);
        $getPassword->bindValue(':login', $this->login, PDO::PARAM_STR);
        $getPassword->execute();
        if ($getPassword->execute()) {
            if (is_object($getPassword)) {
                $passwordObtained = $getPassword->fetch(PDO::FETCH_OBJ);
                if (!empty($passwordObtained)) {
                    $this->password = $passwordObtained->password;
                }
            }
            return $passwordObtained;
        }
    }

    public function getUserList() {
        $userListResult = array();
        $query = 'SELECT `id`, `login` FROM ' . $this->tablename . '';
        $userList = $this->db->query($query);
        if (is_object($userList)) {
            $userListResult = $userList->fetchAll(pdo::FETCH_OBJ);
        }
        return $userListResult;
    }

    /*
     * La méthode getUserProfile() permet l'affichage du profil de l'utilisateur grâce à son id
     */

    public function getUserProfile() {
        $query = 'SELECT `id`, `login`, `password`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `mail`, `profilePic`, `colorNav`, `colorUserNav` FROM ' . $this->tablename . ' WHERE `id` = :id';
        $getUserProfile = $this->db->prepare($query);
        $getUserProfile->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getUserProfile->execute();
        if ($getUserProfile->execute()) {
            $userProfile = $getUserProfile->fetch(PDO::FETCH_OBJ);
        }
        return $userProfile;
    }

    public function grantRole() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_role` = :id_role WHERE `id` = :id';
        $grantRole = $this->db->prepare($query);
        $grantRole->bindValue(':id', $this->id, PDO::PARAM_INT);
        $grantRole->bindValue(':id_role', $this->id_role, PDO::PARAM_INT);
        return $grantRole->execute();
    }

    public function removeRole() {
        $query = 'UPDATE ' . $this->tablename . ' SET `id_role` = NULL WHERE `id` = :id';
        $removeRole = $this->db->prepare($query);
        $removeRole->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $removeRole->execute();
    }

    /*
     * La méthode passwordForgotten() permet à un utilisateur de modifier son mot de passe dans le cas où il l'a perdu/oublié,
     * le code de confirmation envoyé lors de l'inscription est nécéssaire ainsi que le login et l'adresse mail.
     */

    public function passwordForgotten() {
        $query = 'UPDATE ' . $this->tablename . ' SET `password` = :password WHERE `login` = :login AND `mail` = :mail AND confirmCode = :confirmCode';
        $passwordForgotten = $this->db->prepare($query);
        $passwordForgotten->bindValue(':password', $this->password, PDO::PARAM_STR);
        $passwordForgotten->bindValue(':login', $this->login, PDO::PARAM_STR);
        $passwordForgotten->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $passwordForgotten->bindValue(':confirmCode', $this->confirmCode, PDO::PARAM_STR);
        return $passwordForgotten->execute();
    }

    /*
     * La méthode updateLogin() permet à un utilisateur de modifier son nom d'utilisateur.
     */

    public function updateLogin() {
        $query = 'UPDATE ' . $this->tablename . ' SET `login` = :login WHERE `id` = :id';
        $updateLogin = $this->db->prepare($query);
        $updateLogin->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateLogin->bindValue(':login', $this->login, PDO::PARAM_STR);
        return $updateLogin->execute();
    }

    /*
     * La méthode updateMail() permet à un utilisateur de modifier son adresse mail.
     */

    public function updateMail() {
        $query = 'UPDATE ' . $this->tablename . ' SET `mail` = :mail WHERE `id` = :id';
        $updateMail = $this->db->prepare($query);
        $updateMail->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $updateMail->execute();
    }

    /*
     * La méthode updatePic() permet  à un utilisateur de modifier sa photo de profil.
     */

    public function updatePic() {
        $query = 'UPDATE ' . $this->tablename . ' SET `profilePic` = :profilePic WHERE `id` = :id';
        $updatePic = $this->db->prepare($query);
        $updatePic->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePic->bindValue(':profilePic', $this->profilePic, PDO::PARAM_STR);
        return $updatePic->execute();
    }

    /*
     * La méthode updateColorNav() permet à un utilisateur de modifier la couleur de la barre de navigation à sa guise.
     */

    public function updateColorNav() {
        $query = 'UPDATE ' . $this->tablename . ' SET `colorNav` = :colorNav WHERE `id` = :id';
        $updateColorNav = $this->db->prepare($query);
        $updateColorNav->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateColorNav->bindValue(':colorNav', $this->colorNav, PDO::PARAM_STR);
        return $updateColorNav->execute();
    }

    /*
     * La méthode updateColorUserNav() permet à un utilisateur de modifier la couleur de la barre de navigation utilisateur à sa guise.
     */

    public function updateColorUserNav() {
        $query = 'UPDATE ' . $this->tablename . ' SET `colorUserNav` = :colorUserNav WHERE `id` = :id';
        $updateColorUserNav = $this->db->prepare($query);
        $updateColorUserNav->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateColorUserNav->bindValue(':colorUserNav', $this->colorUserNav, PDO::PARAM_STR);
//Si l'insertion s'est correctement déroulée, on retourne vrai
        return $updateColorUserNav->execute();
    }

    /*
     * La méthode getUserInfo() permet de récupérer les informations insérées dans la base de données
     * dans le but de mettre à jour le contenu de la variable de session aprés qu'un utilisateur ait modifié son profil.
     * Cette méthode utilise l'hydratation,
     * C'est une technique qui permet de remplir les attributs de la classe avec les données renvoyées par la requête à la base de données.
     * Grâce à l'hydratation il est possible de récupérer les données entrées en base de données dans le but de mettre à jour les varaibles de session.
     * La méthode getUserInfo() intervient aprés les méthodes de mises à jour du profil tel que updateLogin() ou updateColorNav()
     */

    public function getUserInfo() {
        $isCorrect = false;
        $query = 'SELECT `id`, `login`, `password`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS birthdate, `mail`, `profilePic`, `colorNav`, `colorUserNav` FROM ' . $this->tablename . ' WHERE `id` = :id';
        $getUserInfo = $this->db->prepare($query);
        $getUserInfo->bindValue(':id', $this->id, PDO::PARAM_INT);
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

    public function checkLoginUnique() {
        $query = 'SELECT COUNT(`login`) AS nbLogin'
                . ' FROM ' . $this->tablename . ' WHERE `login` = :login';
        $checkLoginUnique = $this->db->prepare($query);
        $checkLoginUnique->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($checkLoginUnique->execute()) {
            //return $checkLoginUnique->fetch(PDO::FETCH_OBJ)->nbLogin;
            $checkLoginUniqueResult = $checkLoginUnique->fetch(PDO::FETCH_OBJ);
            return $checkLoginUniqueResult->nbLogin;
        } else {
            return false;
        }
    }

    /**
     * Méthode permettant de savoir si une adresse mail est déjà prise
     * @return boolean
     */
    public function checkMailUnique() {
        $query = 'SELECT COUNT(`mail`) AS nbMail'
                . ' FROM ' . $this->tablename
                . ' WHERE `mail` = :mail';
        $checkMailUnique = $this->db->prepare($query);
        $checkMailUnique->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($checkMailUnique->execute()) {
            //return $checkMailUnique->fetch(PDO::FETCH_OBJ)->nbMail;
            $checkMailUniqueResult = $checkMailUnique->fetch(PDO::FETCH_OBJ);
            return $checkMailUniqueResult->nbMail;
        } else {
            return false;
        }
    }

    function __destruct() {
        
    }

}
