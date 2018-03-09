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
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link href="assets/libs/materialize/dist/css/materialize.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="fixed-action-btn toolbar">
            <a class="btn-floating btn-large userToolbar black" >
                <i class="material-icons">account_circle</i>
            </a>
            <ul>
                <li class="black-text center hoverable"><a href="profile.php">Profil</a></li>
                <li class="black-text center hoverable"><a href="historic.php">Historique</a></li>
                <li class="black-text center hoverable"><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </div>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="forum.php">Forum</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="advice.php">Conseils</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper red">
                <a href="index.php" class="brand-logo center">Gemini</a>
                <a href="#" data-activates="slide-out" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="search.php">Recherche</a></li>
                    <li><a href="definition.php?letter=a">Glossaire</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Communauté<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="search.php">Recherche</a></li>
        <li><a href="definition.php?letter=a">Glossaire</a></li>
        <li class="divider"></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="articles.php">Articles</a></li>
        <li><a href="advice.php">Conseils</a></li>
    </ul>
    <div id="modal1" class="modal modal-fixed-footer">
        <form class="col s12" action="#" method="POST">
            <div class="modal-content">
                <div class="row">
                    <h2>Se connecter</h2>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="login" type="text" name="login" class="validate">
                            <label for="login">Nom d'utilisateur</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Mot de passe</label>
                        </div>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Mot de passe oublié?</a>
                        <a href="register.php" class="modal-action modal-close waves-effect waves-green btn-flat ">Pas encore inscrit?</a>
                    </div>
                    <div id="resultat">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input name="connect" id="connect" type="submit" class="waves-effect waves-light btn-flat" value="Valider"/>
            </div>
        </form>
    </div>
    <!----><div class="section white black-text container formOptions">
        <h1>Premier Topic</h1>
        <div class="row">
            <div id="posts">
                <ul class="collection">
                    <li class="collection-item avatar post">
                        <div class="rowpostInfo">
                            <div class="col s12 m6">
                                <i class="medium material-icons postMaker">account_circle</i>
                                <a href="user-profile.php?user=1"class="postMaker">magnyficence</a>
                            </div>
                            <div class="col s12 offset-s12 m12 offset-m12">
                                <span class="postDate">26/02/2018</span>
                            </div>
                        </div>
                        </div>
                    <li class="divider"></li>
                    <li class="postContent">Ceci est le premier post du premier topic du forum</li>
                </ul>
                <ul class="collection">
                    <li class="collection-item avatar post">
                        <div class="rowpostInfo">
                            <div class="col s12 m6">
                                <i class="medium material-icons postMaker">account_circle</i>
                                <a href="user-profile.php?user=1"class="postMaker">magnyficence</a>
                            </div>
                            <div class="col s12 offset-s12 m12 offset-m12">
                                <span class="postDate">27/02/2018</span>
                            </div>
                        </div>
                        </div>
                    <li class="divider"></li>
                    <li class="postContent">Ceci est le deuxième post du premier topic du forum</li>
                </ul>
                <ul class="collection">
                    <li class="collection-item avatar post">
                        <div class="rowpostInfo">
                            <div class="col s12 m6">
                                <i class="medium material-icons postMaker">account_circle</i>
                                <a href="user-profile.php?user=1"class="postMaker">magnyficence</a>
                            </div>
                            <div class="col s12 offset-s12 m12 offset-m12">
                                <span class="postDate">27/02/2018</span>
                            </div>
                    </li>
            </div>
        </div>
        <li class="divider"></li>
        <li class="postContent">Ceci est le troisième post du premier topic du forum</li>
    </ul>
    <ul class="collection">
        <li class="collection-item avatar post">
            <div class="rowpostInfo">
                <div class="col s12 m6">
                    <i class="medium material-icons postMaker">account_circle</i>
                    <a href="user-profile.php?user=1"class="postMaker">magnyficence</a>
                </div>
                <div class="col s12 offset-s12 m12 offset-m12">
                    <span class="postDate">02/03/2018</span>
                </div>
            </div>
            </div>
        <li class="divider"></li>
        <li class="postContent">Salut</li>
    </ul>
</div>
</div>
<form class="col s12" method="POST" action="#" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
            <input type="date" hidden class="form-control" name="date"  id="date" value="2018-03-05" />
            <input type="text" hidden class="form-control" name="id_author"  id="topicid" value="0" />
            <input type="text" hidden class="form-control" name="topicid"  id="id_author" value="1" />
            <input type="text" hidden class="form-control" name="postmaker"  id="postmaker" value="magnyficence" />
            <textarea id="post" class="materialize-textarea" name="post" data-length="300"></textarea>
            <label for="textarea1">Contenu</label>
            <a id="send" onclick="Materialize.toast('Message posté', 2000)" class="btn btn-flat">send</a>
        </div>
    </div>
</form>
<div id="result"></div>
<ul class="pagination">
    <li class="waves-effect"><a class="btn-flat" href="topic.php?page=0&topic=1&name=Premier Topic" disabled>Précédente</a></li>
    <li class="waves-effect"><a href="topic.php?page=1&topic=1&name=Premier Topic" class="btn-flat" disabled>1</a></li>
    <li class="waves-effect"><a class="btn-flat" href="topic.php?page=2&topic=1&name=Premier Topic" >Suivante</a></li>
</ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/libs/materialize/dist/js/materialize.min.js"></script>
<script src="assets/js/materializeDOMElements.js"></script>
<script src="assets/js/post.js"></script>
</body>
</html>