<?php

// On instancie la classe user();
$user = new user();
//On attribue, à l'attribut id de la classe user(), l'id de l'utilisateur contenu dans les variables de session et passés via l'url
$user->id = $_GET['user'];
//On appelle la méthode qui permet d'afficher le profil de l'utilisateur
$userProfile = $user->getUserProfile();
