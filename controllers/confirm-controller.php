<?php

$user = new user();
$password = new user();
$confirmSuccess = false;
$confirmError = array();
if (isset($_POST['confirm'])) {
    if (isset($_POST['login'])) {
        $password->login = htmlspecialchars($_POST['login']);
        $user->login = htmlspecialchars($_POST['login']);
    } else if (empty($_POST['login'])) {
        $confirmError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur.';
    }
    if (isset($_POST['password'])) {
        $password->getCryptedPassword();
        $passwordVerified = password_verify($_POST['password'], $password->password);
        if ($passwordVerified) {
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
        $userConfirm = $user->confirmUser();
        if ($userConfirm) {
            $confirmError['accountConfirmed'] = 'Votre compte est activé';
        }
    }
}
