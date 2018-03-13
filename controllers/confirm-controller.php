<?php

//On instancie la classe user()
$user = new user();
//On instancie la classe user()
$password = new user();
$confirmSuccess = false;
$confirmError = array();
if (isset($_POST['confirm'])) {
    if (isset($_POST['login'])) {
        //On récupère le login et on le lie aux aux attributs login des deux instances de user()
        $password->login = htmlspecialchars($_POST['login']);
        $user->login = htmlspecialchars($_POST['login']);
    } else if (empty($_POST['login'])) {
        $confirmError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur.';
    }
    if (isset($_POST['password'])) {
        //On récupère le mot de passe chiffré dans la base de données
        $password->getCryptedPassword();
        //On vérifie que le mot de passe saisi dans l'input correspond au mot de passe chiffré contenu dans la base de données
        $passwordVerified = password_verify($_POST['password'], $password->password);
        if ($passwordVerified) {
            //Si le mot de passe saisi correspond au mot de passe chiffré alors on lie le mot de passe chiffré à l'attribut password de $user
            $user->password = $password->password;
        }
    } else if (empty($_POST['password'])) {
        $confirmError['emptyPassword'] = 'Veuillez entrer un mot de passe';
    } else {
        $confirmError['passwordCheck'] = 'Le mot de passe est incorrect.';
    }
    if (isset($_POST['confirmCode'])) {
        $user->confirmCode = htmlspecialchars($_POST['confirmCode']);
    } else {
        $confirmError['invalidCode'] = 'Le code entré n\'est pas valide';
    }
    if (count($confirmError) == 0) {
        $confirmSuccess = true;
        //Si le formulaire ne contient pas d'erreur, on appelle la méthode confirmuser() qui permet d'activer le compte utilisateur
        $userConfirm = $user->confirmUser();
    }
}
