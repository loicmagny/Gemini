<?php
session_start();
include_once 'configuration.php';
include 'models/dataBase.php';
include 'models/user-model.php';
include 'models/components-model.php';
include 'models/products-model.php';
include 'models/glossary-model.php';
include 'models/topic-model.php';
include 'models/post-model.php';
include 'models/tips-model.php';
include 'models/article-model.php';
include 'models/historic-model.php';
include 'models/role-model.php';
include 'controllers/connection-controller.php';
include 'controllers/historic-controller.php';
include 'controllers/options-controller.php';
include 'controllers/confirm-controller.php';
include 'controllers/forum-controller.php';
include_once 'assets/lang/' . (isset($_GET['lang']) ? $_GET['lang'] : 'FR_FR') . '.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php if ($clear) { ?>
            <meta http-equiv="refresh" content="0; url=historic.php" />
        <?php } ?>
        <?php if ($sessionUpdated) { ?>
            <meta http-equiv="refresh" content="0; url=profile.php" />
        <?php } ?>
        <?php if ($connectSuccess) { ?>
            <meta http-equiv="refresh" content="0; url=index.php" />
        <?php } ?>
        <?php if ($deletionSuccess) { ?>
            <meta http-equiv="refresh" content="0; url=forum.php" />
        <?php } ?>
        <link rel="icon" href="../../favicon.ico">
        <title><?= TITLE ?></title>
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link href="assets/libs/materialize/dist/css/materialize.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div id="container">
            <nav>
                <?php if (isset($_SESSION['connect'])) { ?>
                    <div class="nav-wrapper <?= $_SESSION['colorNav']; ?>">
                    <?php } else { ?>
                        <div class="nav-wrapper">
                        <?php } ?>
                        <a href="index.php" class="brand-logo center"><?= HEADER_TITLE ?></a>
                        <a href="#" data-activates="slide-out" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="index.php"><?= HEADER_HOME ?></a></li>
                            <li><a href="search.php"><?= HEADER_SEARCH ?></a></li>
                            <li><a href="definition.php?letter=a"><?= HEADER_GLOSSARY ?></a></li>
                            <?php if (!isset($_SESSION['connect'])) { ?>
                                <li><a class="modal-trigger" href="#modalConnect"><?= HEADER_CONNECTION ?></a></li>
                            <?php } ?>
                            <li><a class="dropdown-button" href="#!" data-activates="community"><?= HEADER_COMMUNITY ?><i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a class="dropdown-button" href="#!" data-activates="lang"><?= HEADER_LANGUAGES ?><i class="material-icons right">arrow_drop_down</i></a></li>
                        </ul>
                    </div>
                    <ul id="community" class="dropdown-content">
                        <li><a href="forum.php"><?= HEADER_COMMUNITY_FORUM ?></a></li>
                        <li><a href="articles.php"><?= HEADER_COMMUNITY_ARTICLES ?></a></li>
                        <li><a href="advice.php"><?= HEADER_COMMUNITY_TIPS ?></a></li>
                    </ul>
                    <ul id="lang" class="dropdown-content">
                        <li><a href="/FR_FR.html"><?= HEADER_LANGUAGES_FRENCH ?></a></li>
                        <li><a href="/EN_EN.html"><?= HEADER_LANGUAGES_ENGLISH ?></a></li>
                    </ul>
                    <?php
                    if (isset($_SESSION['connect'])) {
                        include_once 'header-profile.php';
                    }
                    ?>
            </nav>
            <ul id="slide-out" class="side-nav">
                <li><a href="index.php"><?= HEADER_HOME ?></a></li>
                <li><a href="search.php"><?= HEADER_SEARCH ?></a></li>
                <li><a href="definition.php?letter=a"><?= HEADER_GLOSSARY ?></a></li>
                <?php if (!isset($_SESSION['connect'])) { ?>
                    <li><a class="modal-trigger" href="#modalConnect"><?= HEADER_CONNECTION ?></a></li>
                <?php } ?>
                <li class="divider"><?= HEADER_COMMUNITY ?></li>
                <li><a href="forum.php"><?= HEADER_COMMUNITY_FORUM ?></a></li>
                <li><a href="articles.php"><?= HEADER_COMMUNITY_ARTICLES ?></a></li>
                <li><a href="advice.php"><?= HEADER_COMMUNITY_TIPS ?></a></li>
            </ul>
            <div id="modalConnect" class="modal modal-fixed-footer">
                <form class="col s12" action="#" method="POST">
                    <div class="modal-content">
                        <div class="row">
                            <h2><?= HEADER_CONNECTION ?></h2>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" name="login" required class="validate">
                                    <label for="login"><?= FORM_LOGIN ?></label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="password" name="password" required class="validate">
                                    <label for="password"><?= FORM_PASSWORD ?></label>
                                </div>
                                <a href="password-forgotten.php" class="modal-action modal-close waves-effect waves-green btn-flat "><?= HEADER_CONNECTION_MODAL_PASSWORD_FORGOTTEN ?></a>
                                <a href="register.php" class="modal-action modal-close waves-effect waves-green btn-flat "><?= HEADER_CONNECTION_MODAL_REGISTER ?></a>
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input name="connect" id="connect" type="submit" class="waves-effect waves-light btn-flat" value="<?= FORM_REGISTER ?>"/>
                    </div>
                </form>
            </div>
