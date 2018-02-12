<?php

$insertSuccess = false;
$formError = array();
$user = new user();
if (isset($_POST['connect'])) {
    if (isset($_POST['login'])) {
        $user->login = strip_tags($_POST['login']);
    } else if (empty($_POST['login'])) {
        $formError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur';
    }
    if (isset($_POST['password'])) {
        $user->password = strip_tags($_POST['password']);
    } else if (empty($_POST['password'])) {
        $formError['emptyPassword'] = 'Veuillez entrer un mot de passe';
    }

    $userConnect = $user->userConnect();

    if (!$userConnect) {
        $formError['submit'] = 'Erreur lors de la connexion';
    } else if (empty($userConnect)) {
        echo 'vide';
    } else {
        $insertSuccess = true;
        $user->login = '';
        $user->password = '';
        $_SESSION['connect'] = $_POST['connect'];
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['birthdate'] = $userConnect->birthdate;
        $_SESSION['mail'] = $userConnect->mail;
    }
}
    