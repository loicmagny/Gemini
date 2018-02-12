<?php

$user = new user();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPassword = '/[ -~]{4,63}$/i';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$insertSuccess = false;
$formError = array();
if (isset($_POST['login'])) {
    $user->login = htmlspecialchars($_POST['login']);
    if (!preg_match($regUser, $user->login)) {
        $formError['login'] = 'Le nom d\'utilisateur n\'est pas correct';
    }
}
if (isset($_POST['password'])) {
    $user->password = htmlspecialchars($_POST['password']);
    if (!preg_match($regPassword, $user->password)) {
        $formError['password'] = 'Le mot de passe n\'est pas correct';
    }
}
if (isset($_POST['confirm'])) {
    if (!preg_match($regPassword, $_POST['confirm']) || $_POST['password'] != $_POST['confirm']) {
        $formError['confirm'] = 'Les mots de passe sont différents';
    }
}
if (isset($_POST['birthdate'])) {
    $user->birthdate = htmlspecialchars($_POST['birthdate']);
    if (!preg_match($regBirthDate, $user->birthdate)) {
        $formError['birthdate'] = 'La date de naissance n\'est pas correcte';
    }
}
if (isset($_POST['mail'])) {
    $user->mail = htmlspecialchars($_POST['mail']);
    if (!preg_match($regMail, $user->mail)) {
        $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
    }
}
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
if (isset($_POST['submit']) && count($formError) == 0) {
    if (!$user->addUser()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else {
        $insertSuccess = true;
        $user->login = '';
        $user->password = '';
        $user->birthdate = '';
        $user->mail = '';
    }
}
