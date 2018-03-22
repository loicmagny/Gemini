<?php

$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^'; //Regex permettant de contrôler la forme des logins
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/'; //Regex permettant de contrôler la forme de la date naissance
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i'; //Regex permettant de contrôler la forme du mot de passe
$insertSuccess = false;
$formError = array();
if (isset($_POST['checkLogin'])) {
    include_once '../configuration.php';
    include_once '../models/dataBase.php';
    include_once '../models/user-model.php';
    $user = new user();
    $user->login = htmlspecialchars($_POST['checkLogin']);
    $checkLogin = $user->checkLoginUnique();
//On vérifie que $checkLogin est différent de false mais pas de 0 ou 1
    if ($checkLogin !== false) {
        if ($checkLogin == 1) {
            $formError['takenLogin'] = 'Ce nom d\'utilisateur existe déjà';
        }
        echo json_encode($checkLogin);
    }
}
if (isset($_POST['checkMail'])) { //On vérifie que nous sommes dans l'appel AJAX pour le mail
    include_once '../configuration.php';
    include_once '../models/dataBase.php';
    include_once '../models/user-model.php';
    $user = new user();
    $user->mail = htmlspecialchars($_POST['checkMail']);
    $checkMail = $user->checkMailUnique();
//On vérifie que $checkMail est différent de false mais pas de 0 ou 1
    if ($checkMail !== false) {
        echo json_encode($checkMail);
    }
}

if (isset($_POST['register'])) {
    $user = new user();

//La fonction random_string génère le code de confirmation à envoyer par mail
    function random_string($charNumber, $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZazertyuiopqsdfghjklmwxcvbn123456789') {
        $letterNumber = strlen($string) - 1;
        $generation = '';
        for ($maxLetter = 0; $maxLetter < $charNumber; $maxLetter++) {
            $random = mt_rand(0, $letterNumber);
            $character = $string[$random];
            $generation .= $character;
        }
        return $generation;
    }

    if (isset($_POST['login'])) {
//On attibue à l'attribut login la valeur de l'input nommé login
        $user->login = htmlspecialchars($_POST['login']);
//Si la valeur de l'input login ne correspond pas à la regex,
        if (!preg_match($regUser, $_POST['login'])) {
//On affiche un message d'erreur
            $formError['login'] = 'Le nom d\'utilisateur n\'est pas correct';
        } else if (empty($_POST['login'])) {
//Si l'input login est vide on affiche un message d'erreur
            $formError['emptyLogin'] = 'Veuillez saisir un nom d\'utilisateur';
        }
    }
    if (isset($_POST['password'])) {
        if (!preg_match($regPassword, $_POST['password'])) {
            $formError['password'] = 'Le mot de passe n\'est pas correct';
        } else if (empty($_POST['password'])) {
            $formError['emptyPassword'] = 'Veuillez saisir un nom mot de passe';
        } else {
//Si l'input password n'est pas vide et que la valeur correspond à la regex 
            $cryptedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
//On chiffre le mot de passe et on le lie à l'attribut password
            $user->password = $cryptedPassword;
        }
    }
    if (isset($_POST['confirm'])) {
//Si les valeurs des input confirm et password diffèrent,
        if ($_POST['password'] != $_POST['confirm']) {
//On affiche une erreur
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
//Si l'adresse mail n'est pas vide et est bien une adresse mail, 
    if (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $user->mail = htmlspecialchars($_POST['mail']); // on attribue la valeur de l'input à l'attribut mail
    } else if (empty($_POST['mail'])) {
        $formError['emptyMail'] = 'Veuillez saisir une adresse mail';
    } else {
        $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
    }
//Si la couleur de la barre de navigation est selectionné
    if (!empty($_POST['colorNav'])) {
//On la lie à l'attribut ColorNav
        $user->colorNav = htmlspecialchars($_POST['colorNav']);
    } else {
//Sinon on laisse l'attribut vide
        $user->colorNav = '';
    }
    if (!empty($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
    } else {
        $user->colorUserNav = '';
    }
//Si l'ajout ne se fait pas,
    if (count($formError) == 0) {
        $insertSuccess = true;
        if ($insertSuccess) {
//On attribue le résultat de random_string à la variale $confirmCode qu'on lie à l'attribut confirmCode
            $user->confirmCode = random_string(8);
//On définit les différents éléments du mail à envoyer à l'utilisateur
//            $userMail = $_POST['mail'];
//            $userName = $_POST['login'];
//            $object = 'Confirmation de votre inscription';
////On écrit le contenu HTML du mail
//            $content = '
//<html>
//<head>
//   <title>Vous vous êtes inscrit sur Gemini</title>
//</head>
//<body>
//   <p>Bonjour ' . $userName . '</p>
//   <p>Voici le code nécéssaire à la validation de l\'inscription : ' . $user->confirmCode . '</p>
//       <p> Rendez vous <a href="http://gemini/confirm.php">ici</a> pour confirmer votre adresse</p>
//       <p>Gardez ce code bien précieusement, il vous servira à réinitialiser votre mot de passe si vous perdez celui-ci</p>
//       </body>
//</html>';
//            $header = 'MIME-Version: 1.0' . "\r\n";
//            $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//            $header .= 'From: no-reply@gemini.fr' . "\r\n";
////On envoie le mail
//            $confirmMail = mail($userMail, $object, $content, $header);
//            if (!$confirmMail) {//Si le mail ne s'envoie pas on affiche une erreur
//                $formError['confirmMail'] = 'Un problème est survenu lors de l\'envoi du mail, veuillez réessayer';
//            }
        }
        if (!$user->activateAccount()) {
//On affiche une erreur
            $formError['submit'] = 'Erreur lors de l\'ajout';
        } else {
            $user->login = '';
            $user->password = '';
            $user->birthdate = '';
            $user->mail = '';
            $user->colorNav = '';
            $user->colorUserNav = '';
            $user->confirmCode = '';
        }
    }
}