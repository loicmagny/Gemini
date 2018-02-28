<?php

$connectSuccess = false;
$formError = array();
if (isset($_POST['ajax'])) {
    include '../models/dataBase.php';
    include '../models/user-model.php';
    $user = new user();
    $password = new user();
    if (isset($_POST['connect'])) {
        if (isset($_POST['login'])) {
            $password->login = htmlspecialchars($_POST['login']);
            $user->login = htmlspecialchars($_POST['login']);
        } else if (empty($_POST['login'])) {
            $formError['emptyLogin'] = 'Veuillez entrer votre nom d\'utilisateur.';
        }
        if (isset($_POST['password'])) {
            $password->getCryptedPassword();
            $passwordVerified = password_verify($_POST['password'], $password->password);
            if ($passwordVerified) {
                $user->password = $password->password;
            }
        } else if (empty($_POST['password'])) {
            $formError['emptyPassword'] = 'Veuillez entrer un mot de passe';
        } else {
            $formError['passwordCheck'] = 'Le mot de passe est incorrect.';
        }
        if (count($formError) == 0) {
            $userConnect = $user->userConnect();
            if ($userConnect) {
                session_start();
                $_SESSION['connect'] = $_POST['connect'];
                $_SESSION['id'] = $userConnect->id;
                $_SESSION['login'] = $userConnect->login;
                $_SESSION['birthdate'] = $userConnect->birthdate;
                $_SESSION['mail'] = $userConnect->mail;
                $_SESSION['profilePic'] = $userConnect->profilePic;
                $_SESSION['colorNav'] = $userConnect->colorNav;
                $_SESSION['colorUserNav'] = $userConnect->colorUserNav;
                $connectSuccess = true;
                echo 'Success';
            } else {
                $formError['submit'] = 'Erreur lors de la connexion';
                echo 'fail';
            }
        }
    } else {
        echo '';
    }
}    