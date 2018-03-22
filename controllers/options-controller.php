<?php

$sessionUpdated = false;
$updateError = array();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
$user = new user(); //On instancie la classe user()
$userInfo = new user(); //On instancie la classe user()
//Si on veut mettre à jour le profil
if (isset($_POST['update'])) {
    $user->id = $_POST['id_user'];
    $userInfo->id = $_POST['id_user'];
    if (!empty($_POST['login'])) {
        $user->login = htmlspecialchars($_POST['login']);
        $updateLogin = $user->updateLogin(); //On appelle la méthode updateLogin()
    } else if (empty($_POST['login'])) {
        $user->login = $_SESSION['login'];
    } else if (!preg_match($regUser, $_POST['login'])) {
        $updateError['loginCheck'] = 'Le nom d\utilisateur est incorrect';
    }
    if (!empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_POST['mail']);
        $updateMail = $user->updateMail(); //On appelle la méthode updateMail()
    } else if (empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_SESSION['mail']);
    } else if (!preg_match($regMail, $_POST['mail'])) {
        $updateError['mailCheck'] = 'L\'adresse mail est incorrecte.';
    }
    if ($_FILES['file']['error'] != 4) {
        if ($_FILES['file']['size'] <= 10000000) {
            $fileInfo = pathinfo($_FILES['file']['name']);
            $upload = $fileInfo['extension'];
            $extentions = array('jpg', 'jpeg', 'gif', 'png'); //Tableau des extensions non autorisées
            if (in_array($upload, $extentions)) {
                if (!file_exists('uploads/' . $user->id)) {
                    mkdir('uploads/' . $user->id, 0777, true);
                } else {
                    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $user->id . '/' . basename($_FILES['file']['name']));
                    $user->profilePic = 'uploads/' . $user->id . '/' . $_FILES['file']['name'];
                    $updatePic = $user->updatePic(); //On appelle la méthode updatePic()
                }
            } else {
                $updateError['fileExt'] = 'L\'extension du fichier n\'est pas correcte';
            }
        } else {
            $updateError['fileSize'] = 'L\'image est trop grosse';
        }
    }
    if (!empty($_POST['colorNav'])) {
        $user->colorNav = htmlspecialchars($_POST['colorNav']);
        $updateColorNav = $user->updateColorNav(); //On appelle la méthode updateColorNav()
    } else if (empty($_POST['colorNav'])) {
        $user->colorNav = $_SESSION['colorNav'];
    }
    if (!empty($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
        $updateColorUserNav = $user->updateColorUserNav(); //On appelle la méthode updateColorUserNav()
    } else if (empty($_POST['colorUserNav'])) {
        $user->colorUserNav = $_SESSION['colorUserNav'];
    }
    if (count($updateError) == 0) {
        $userOptions = $userInfo->getUserInfo(); //On appelle la méthode getUserInfo()
        $_SESSION['connect'] = $_POST['update'];
        $_SESSION['id'] = $userInfo->id;
        $_SESSION['login'] = $userInfo->login;
        $_SESSION['password'] = $userInfo->password;
        $_SESSION['birthdate'] = $userInfo->birthdate;
        $_SESSION['mail'] = $userInfo->mail;
        $_SESSION['profilePic'] = $userInfo->profilePic;
        $_SESSION['colorNav'] = $userInfo->colorNav;
        $_SESSION['colorUserNav'] = $userInfo->colorUserNav;
        $sessionUpdated = true;
    }
}
//Si on veut supprimer le profil
if (isset($_POST['deletionPassword'])) {
    $user = new user(); //On instancie la classe user();
    $password = new user(); //On instancie la classe user();
    $password->login = $_SESSION['login'];
    $user->id = $_SESSION['id'];
    if (isset($_POST['deletionPassword'])) {
        //On appelle la méthode getCryptedPassword()
        $password->getCryptedPassword();
        //On vérifie que le mot de passe entré par l'utilisateur correspond au mot de passe haché présent en base de données
        $passwordVerified = password_verify($_POST['deletionPassword'], $password->password);
        if ($passwordVerified) {//Si les mots de passe correspondent on attribue la valeur de l'input password à l'attriut password
            $user->password = $password->password;
        }
    } else if (empty($_POST['deletionPassword'])) {
        $updateError['emptyPassword'] = 'Veuillez entrer un mot de passe';
    } else {
        $updateError['passwordCheck'] = 'Le mot de passe est incorrect.';
    }
    //On appelle la méthode deactivateUser()
    $deactivateUser = $user->deactivateUser();
    //Si le compte utilisateur est désactivé
    var_dump($deactivateUser);
    if ($deactivateUser) {
        //On déconnecte l'utilisateur
        session_destroy();
        //Et on le renvoit à l'acceuil
//        header('location: index.php');
        exit;
    }
}
