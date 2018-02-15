<?php

$insertSuccess = false;
$formError = array();
if (isset($_POST['ajax'])) {
    include '../models/dataBase.php';
    include '../models/user.php';
    $user = new user();
    if (isset($_POST['connect'])) {
        if (isset($_POST['login'])) {
            $user->login = strip_tags($_POST['login']);
        } else if (empty($_POST['login'])) {
            $formError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur';
        }
        if (isset($_POST['password'])) {
            $user->password = $_POST['password'];
        } else if (empty($_POST['password'])) {
            $formError['emptyPassword'] = 'Veuillez entrer un mot de passe';
        }
        if (count($formError) == 0) {
            $userConnect = $user->userConnect();
            $insertSuccess = true;
            $user->login = '';
            $user->password = '';
            session_start();
            $_SESSION['connect'] = $_POST['connect'];
            $_SESSION['login'] = $userConnect->login;
            $_SESSION['password'] = $userConnect->password;
            $_SESSION['id'] = $userConnect->id;
            $_SESSION['birthdate'] = $userConnect->birthdate;
            $_SESSION['mail'] = $userConnect->mail;
            echo 'Success';
        } else {
            $formError['submit'] = 'Erreur lors de la connexion';
        }
    }
} else {
    echo '';
}
