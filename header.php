<?php
session_start();
include 'models/dataBase.php';
include 'models/user.php';
include 'models/components.php';
include 'models/products.php';
include 'models/definition-model.php';
include 'controllers/connexion-controller.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Gemini</title>
        <link href="assets/libs/materialize/dist/css/materialize.css" rel="stylesheet">
        <!-- CSS perso -->
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Montserrat+Subrayada" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Iceberg" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nova+Cut" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <div class="col s12 m4 l3">
                <ul id="slide-out" class="side-nav">
                    <li class="center"><img class="brand" src="assets/img/logo.png" alt="logo Gemini" /></li>
                    <li class="divider"></li>
                    <?php
                    if (isset($_SESSION['connect'])) {
                        ?>
                        <li><div class="user-view">
                                <span class="black-text name center"><?= $_SESSION['login']; ?></span></a>
                                <span class="black-text email center"><?= $_SESSION['mail']; ?></span></a>
                            </div>
                        </li>
                        <div class="row line">
                            <a href="options.php"<i class="material-icons md-36 dark settings">settings</i></a>
                            <a href="deconnexion.php"><i class = "material-icons">cancel</i></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <li><div class="user-view">
                                <a href="connexion.php">Se connecter</a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="divider"></li>
                    <li class="center"><a href="index.php">Accueil</a></li>
                    <li class="center"><a href="search.php">Rechercher</a></li>
                    <li class="center"><a href="definition.php">Glossaire</a></li>
                    <li class="no-padding center">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Communauté<i class="material-icons">expand_more</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="forum.php">Forum</a></li>
                                        <li><a href="advise.php">Conseils</a></li>
                                        <li><a href="articles.php">Articles</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#!">Publier un article</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#!">Soumettre un ajout</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding center">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Profil<i class="material-icons">expand_more</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="profile.php">Profil</a></li>
                                        <li><a href="register.php">S'inscrire</a></li>
                                        <li><a href="options.php">Options</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
            </div>
        </ul>
    </div>
    <a href="#" data-activates="slide-out" class="button-collapse btn-floating btn-large cyan pulse right"><i class="material-icons">menu</i></a>