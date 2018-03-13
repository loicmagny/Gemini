<?php

$user = new user();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';
$insertSuccess = false;
$formError = array();
if (isset($_POST['register'])) {
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
    if (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $user->mail = htmlspecialchars($_POST['mail']);
    } else if (empty($_POST['mail'])) {
        $formError['emptyMail'] = 'Veuillez saisir une adresse mail';
    } else {
        $formError['mail'] = 'L\'adresse mail n\'est pas correcte';
    }
    if (!empty($_POST['colorNav'])) {
        $user->colorNav = htmlspecialchars($_POST['colorNav']);
        $updateColorNav = $user->updateColorNav();
    } else {
        $user->colorNav = '';
    }
    if (!empty($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
        $updateColorUserNav = $user->updateColorUserNav();
    } else {
        $user->colorUserNav = '';
    }
//On vérifie que le formulaire a bien été soumis et qu'il n'y a pas eu d'erreur
    if (!$user->addUser()) {
        $formError['submit'] = 'Erreur lors de l\'ajout';
    } else if (count($formError) == 0) {
        $insertSuccess = true;
        if($insertSuccess){
            function chaine_aleatoire($nb_car, $chaine = 'ABCDEFGHIJQLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789') {
                $nb_lettres = strlen($chaine) - 1;
                $generation = '';
                for ($i = 0; $i < $nb_car; $i++) {
                    $pos = mt_rand(0, $nb_lettres);
                    $car = $chaine[$pos];
                    $generation .= $car;
                }
                return $generation;
            }

            $confirmCode = chaine_aleatoire(8);
            $user->confirmCode = $confirmCode;
            $userMail = $_POST['mail'];
            $userName = $_POST['login'];
// Mail
            $object = 'Confirmation de votre inscription';
            $content = '
<html>
<head>
   <title>Vous vous êtes inscrit sur Gemini</title>
</head>
<body>
   <p>Bonjour ' . $userName . '</p>
   <p>Voici le code nécéssaire à la validation de l\'inscription : ' . $confirmCode . '</p>
       <p> Rendez vous <a href="http://gemini/confirm.php">ici</a> pour confirmer votre adresse</p>
       <p>Gardez ce code bien précieusement, il vous servira à réinitialiser votre mot de passe si vous perdez celui-ci</p>
       </body>
</html>';
            $header = 'MIME-Version: 1.0' . "\r\n";
            $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $header .= 'From: no-reply@gemini.fr' . "\r\n";
//Envoi du mail
            $confirmMail = mail($userMail, $object, $content, $header);
            if (!$confirmMail) {
                $formError['confirmMail'] = 'Un problème est survenu lors de l\'envoi du mail, veuillez réessayer';
            }
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