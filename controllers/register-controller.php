<?php

$user = new user();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$insertSuccess = false;
$formError = array();
if (isset($_POST['submit'])) {
    if (isset($_POST['login'])) {
        $user->login = htmlspecialchars($_POST['login']);
        if (!preg_match($regUser, $user->login)) {
            $formError['login'] = 'Le nom d\'utilisateur n\'est pas correct';
        } else if (empty($_POST['login'])) {
            $formError['emptyLogin'] = 'Veuillez saisir un nom d\'utilisateur';
        }
    }
    if (isset($_POST['password'])) {
        if (!preg_match($regPassword, $_POST['password'])) {
            $formError['password'] = 'Le mot de passe n\'est pas correct';
        } else if (empty($_POST['password'])) {
            $formError['emptyPassword'] = 'Veuillez saisir un nom mot de passe';
        } else {
            $cryptedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            password_verify($_POST['password'], $cryptedPassword);
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
    if (isset($_POST['birthdate'])) {
        $user->birthdate = htmlspecialchars($_POST['birthdate']);
        if (!preg_match($regBirthDate, $user->birthdate)) {
            $formError['birthdate'] = 'La date de naissance n\'est pas correcte';
        } else if (empty($_POST['birthdate'])) {
            $formError['emptyBirthdate'] = 'Veuillez rentrer votre date de naissance';
        }
    }
    if (isset($_POST['mail'])) {
        $user->mail = htmlspecialchars($_POST['mail']);
        if (!preg_match($regMail, $user->mail)) {
            $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
        } else if (empty($_POST['mail'])) {
            $formError['emptyMail'] = 'Veuillez saisir une adresse mail';
        }
    }
    if (!empty($_POST['colorNav'])) {
        $user->colorNav = htmlspecialchars($_POST['colorNav']);
        $updateColorNav = $user->updateColorNav();
    }
    if (!empty($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
        $updateColorUserNav = $user->updateColorUserNav();
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$user->addUser()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
        var_dump($user);
        echo 'non';
    } else if (count($formError) == 0) {
        var_dump($user);
        echo 'oui';
        $insertSuccess = true;
        $user->login = '';
        $user->password = '';
        $user->birthdate = '';
        $user->mail = '';
        $user->colorNav = '';
        $user->colorUserNav = '';
        if (isset($_FILES['file'])) {
            $user->ProfilePic = '';
        }
    }
}