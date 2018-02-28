<?php
session_start();
include 'models/dataBase.php';
include 'models/user-model.php';
include 'models/components-model.php';
include 'models/products-model.php';
include 'models/definition-model.php';
include 'models/forum-model.php';
include 'models/post-model.php';
include 'models/advice-model.php';
include 'models/article-model.php';
include 'models/historic-model.php';
include 'controllers/connection-controller.php';
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
        <?php
        if (isset($_SESSION['connect'])) {
            include_once 'header-profile.php';
        }
        ?>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="forum.php">Forum</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="advice.php">Conseils</a></li>
        </ul>
        <nav>
            <?php if (isset($_SESSION['connect'])) { ?>
                <div class="nav-wrapper <?= $_SESSION['colorNav']; ?>">
                <?php } else { ?>
                    <div class="nav-wrapper">
                    <?php } ?>
                    <a href="index.php" class="brand-logo center">Gemini</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="search.php">Recherche</a></li>
                        <li><a href="definition.php?letter=a">Glossaire</a></li>
                        <?php if (!isset($_SESSION['connect'])) { ?>
                            <li><a class="modal-trigger" href="#modal1">Se connecter</a></li>
                        <?php } ?>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Communauté<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="search.php">Recherche</a></li>
                        <li><a href="definition.php?letter=a">Glossaire</a></li>
                        <?php if (!isset($_SESSION['connect'])) { ?>
                            <li><a class="modal-trigger" href="#modal1">Se connecter</a></li>
                        <?php } ?>
                        <li class="divider"></li>
                        <li><a href="forum.php">Forum</a></li>
                        <li><a href="articles.php">Articles</a></li>
                        <li><a href="advice.php">Conseils</a></li>
                    </ul>
                </div>
        </nav>
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="row">
                    <h2>Se connecter</h2>
                    <form class="col s12" action="#" method="POST">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="login" type="text" name="login" class="validate">
                                <label for="login">Nom d'utilisateur</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="password" type="password" name="password" class="validate">
                                <label for="password">Mot de passe</label>
                            </div>
                            <input name="connect" id="connect" type="submit" class="waves-effect waves-light btn-flat" value="Valider"/>
                        </div>
                        <div id="resultat">
                        </div>
                        <?php
                        foreach ($formError as $error) {
                            ?>
                            <p><?= $error ?></p>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Mot de passe oublié?</a>
                <a href="register.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Pas encore inscrit?</a>
            </div>
        </div>
