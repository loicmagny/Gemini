<?php

$sessionUpdated = false;
$updateError = array();
$regUser = '^(?=.{4,32}$)(?![_.-])(?!.*[_.]{2})[a-zA-Z0-9._-]+(?<![_.])$^';
$regBirthDate = '/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/';
$regPassword = '/(?=^.{8,32}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';
$regMail = '#[A-Z-a-z-0-9-.éàèîÏôöùüûêëç]{2,}@[A-Z-a-z-0-9éèàêâùïüëç]{2,}[.][a-z]{2,6}$#';
if (isset($_POST['update'])) {
    $user = new user();
    $userInfo = new user();
    $user->id = $_SESSION['id'];
    if (!empty($_POST['login'])) {
        $user->login = htmlspecialchars($_POST['login']);
        $updateLogin = $user->updateLogin();
    } else if (empty($_POST['login'])) {
        $user->login = $_SESSION['login'];
    } else if (!preg_match($regUser, $_POST['login'])) {
        $updateError['loginCheck'] = 'Le nom d\utilisateur est incorrect';
    }
    if (!empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_POST['mail']);
        $updateMail = $user->updateMail();
    } else if (empty($_POST['mail'])) {
        $user->mail = htmlspecialchars($_SESSION['mail']);
    } else if (!preg_match($regMail, $_POST['mail'])) {
        $updateError['mailCheck'] = 'L\'adresse mail est incorrecte.';
    }
    if ($_FILES['file']['error'] != 4) {
        if ($_FILES['file']['size'] <= 10000000) {
            $fileInfo = pathinfo($_FILES['file']['name']);
            $upload = $fileInfo['extension'];
            $extentions = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($upload, $extentions)) {
                if (!file_exists('uploads/' . $user->id)) {
                    mkdir('uploads/' . $user->id, 0777, true);
                } else {
                    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $user->id . '/' . basename($_FILES['file']['name']));
                    $user->profilePic = 'uploads/' . $user->id . '/' . $_FILES['file']['name'];
                    $updatePic = $user->updatePic();
                    var_dump($user->profilePic);
                    var_dump($updatePic);
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
        $updateColorNav = $user->updateColorNav();
    } else if (empty($_POST['colorNav'])) {
        $user->colorNav = $_SESSION['colorNav'];
    }
    if (!empty($_POST['colorUserNav'])) {
        $user->colorUserNav = htmlspecialchars($_POST['colorUserNav']);
        $updateColorUserNav = $user->updateColorUserNav();
    } else if (empty($_POST['colorUserNav'])) {
        $user->colorUserNav = $_SESSION['colorUserNav'];
    }
    if (count($updateError) == 0) {
        $userInfo->getUserInfo($user->id);
        var_dump($userInfo);
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
var_dump($_SESSION);
