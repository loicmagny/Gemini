<?php

$user = new user();
$user->id = $_GET['user'];
$userProfile = $user->getUserProfile();
