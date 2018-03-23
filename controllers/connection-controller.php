<?php

$connectSuccess = false;
$formError = array();
//On instancie la classe user()
$user = new user();
//On instancie la classe user()
$password = new user();
if (isset($_POST['connect'])) {
    if (isset($_POST['login'])) {
        //On récupère le login et on le lie aux aux attributs login des deux instances de user()
        $password->login = htmlspecialchars($_POST['login']);
        $user->login = htmlspecialchars($_POST['login']);
    } else if (empty($_POST['login'])) {
        $formError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur.';
    }
    if (isset($_POST['password'])) {
        //On récupère le mot de passe chiffré dans la base de données
        $password->getCryptedPassword();
        //On vérifie que le mot de passe saisi dans l'input correspond au mot de passe chiffré contenu dans la base de données
        $passwordVerified = password_verify($_POST['password'], $password->password);
        if ($passwordVerified) {
            //Si le mot de passe saisi correspond au mot de passe chiffré alors on lie le mot de passe chiffré à l'attribut mot de passe de $user
            $user->password = $password->password;
        }
    } else if (empty($_POST['password'])) {
        $formError['emptyPassword'] = 'Veuillez entrer un mot de passe';
    } else {
        $formError['passwordCheck'] = 'Le mot de passe est incorrect.';
    }
    if (count($formError) == 0) {
        //Si le formulaire n'a aucune erreur, on exécute la méthode userConnect()
        $userConnect = $user->userConnect();
        if ($userConnect) {
            //Si la méthode retourne true on lie le contenu des attributs aux variables de session
            $_SESSION['connect'] = $_POST['connect'];
            $_SESSION['id'] = $userConnect->id;
            $_SESSION['login'] = $userConnect->login;
            $_SESSION['birthdate'] = $userConnect->birthdate;
            $_SESSION['mail'] = $userConnect->mail;
            $_SESSION['profilePic'] = $userConnect->profilePic;
            $_SESSION['colorNav'] = $userConnect->colorNav;
            $_SESSION['colorUserNav'] = $userConnect->colorUserNav;
            $_SESSION['activate'] = $userConnect->activate;
            $_SESSION['role'] = $userConnect->id_role;
            $connectSuccess = true;
        } else {
            $formError['submit'] = 'Erreur lors de la connexion';
        }
    }
}
