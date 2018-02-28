<?php

$updateSuccess = false;
$updateError = array();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$user = new user();
if (isset($_POST['update'])) {
    if (!empty($_POST['login'])) {
        $user->login = htmlspecialchars($_POST['login']);
    } else if (!preg_match($regUser, $_POST['login'])) {
        $updateError['loginCheck'] = 'Le nom d\utilisateur est incorrect';
    }
    if (!empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_POST['mail']);
    } else if (!preg_match($regMail, $_POST['mail'])) {
        $updateError['mailCheck'] = 'L\'adresse mail est incorrecte.';
    }
    if (isset($_POST['colorNav'])) {
        $user->colorNav = htmlspecialchars($_POST['colorNav']);
    }
    if (isset($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
    }
    if (count($updateError) == 0) {
        $userConnect = $user->updateProfile();
        $updateSuccess = true;
        if (!$updateSuccess) {
            $updateError['submit'] = 'Erreur lors de la connexion';
        }
    }
}
    