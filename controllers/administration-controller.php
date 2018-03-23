<?php

$role = new role();
$user = new user();
$roleList = $role->getRoleList();
$userList = $user->getUserLIst();
$formError = array();
$creationSucces = false;
if (isset($_POST['create'])) {
    if (isset($_POST['createRole'])) {
        $role->role = htmlspecialchars($_POST['createRole']);
    } else if (empty($_POST['createRole'])) {
        $formError['emptyRole'] = 'Il faut renseigner un rôle';
    }
    if (!$role->addRole()) {
        $formError['creationFailed'] = 'La création du rôle a échoué, veuillez réessayer';
    } else {
        $creationSucces = true;
        $role->role = '';
    }
}
if (isset($_POST['grant'])) {
    if (isset($_POST['userSelect'])) {
        $user->id = htmlspecialchars($_POST['userSelect']);
    } else if (empty($_POST['userSelect'])) {
        $formError['emptyUser'] = 'Il faut renseigner un utilisateur';
    }
    if (isset($_POST['roleSelect'])) {
        $user->id_role = htmlspecialchars($_POST['roleSelect']);
    } else if (empty($_POST['roleSelect'])) {
        $formError['emptyRole'] = 'Il faut renseigner un rôle pour';
    }
    if (count($formError) == 0) {
        $roleGranted = $user->grantRole();
        $user->id = '';
        $user->id_role = '';
    }
}
if (isset($_POST['remove'])) {
    if (isset($_POST['userSelect'])) {
        $user->id = htmlspecialchars($_POST['userSelect']);
    } else if (empty($_POST['userSelect'])) {
        $formError['emptyUser'] = 'Il faut renseigner un utilisateur';
    }
    if (count($formError) == 0) {
        $roleRemoved = $user->removeRole();
        $user->id = '';
    }
}