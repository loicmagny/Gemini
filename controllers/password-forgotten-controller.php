<?php
//On instancie la classe user()
$user = new user();
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';
$formError = array();
$correctInfos = false;
if (isset($_POST['forget'])) {
    if (!empty($_POST['login'])) {
        $user->login = htmlspecialchars($_POST['login']);
    } else {
        $formError['emptyLogin'] = 'Nous ne pouvons pas vous aider sans votre nom d\'utilisateur';
    }
    if (!empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_POST['mail']);
    } else {
        $formError['emptyMail'] = 'Nous ne pouvons pas vous aider sans votre adresse mail';
    }
    if (isset($_POST['password'])) {
        if (!preg_match($regPassword, $_POST['password'])) {
            $formError['password'] = 'Le mot de passe n\'est pas correct';
        } else if (empty($_POST['password'])) {
            $formError['emptyPassword'] = 'Veuillez saisir un nom mot de passe';
        } else {
            //Si le mot de passe correspond à la regex et si l'input n'est pas vide, on chiffre le mot de passe
            $cryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //On attribue le mot de passe chiffré à l'attribut password
            $user->password = $cryptedPassword;
        }
    }
    if (isset($_POST['confirm'])) {
        if ($_POST['password'] != $_POST['confirm']) {
            $formError['confirm'] = 'Les mots de passe sont différents';
        } else if (empty($_POST['confirm'])) {
            $formError['emptyConfirm'] = 'Veuillez confirmer votre mot de passe';
        }
    }
    if (isset($_POST['confirmCode'])) {
        $user->confirmCode = htmlspecialchars($_POST['confirmCode']);
    } else {
        $confirmError['invalidCode'] = 'Le code entré n\'est pas valide';
    }
    if (count($formError) == 0) {
        //On appelle la méthode passwordForgotten()
        $forgottenPassword = $user->passwordForgotten();
        $user->login = '';
        $user->password = '';
        $user->mail = '';
        $user->confirmCode = '';
        $correctInfos = true;
    }
}


