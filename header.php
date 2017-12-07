<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
  <title>Gemini</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/libs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <!-- CSS perso -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Gemini</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Accueil <span class="sr-only"></span></a></li>
          <li><a href="search.php">Rechercher <span class="sr-only"></span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Communauté<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="forum.php">Forum</a></li>
              <li><a href="articles.php">Articles</a></li>
              <li><a href="advise.php">Conseils</a></li>
              <li class="divider"></li>
              <li><a href="#">Publier un article</a></li>
              <li class="divider"></li>
              <li><a href="#">Proposer un ajout</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profil<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="register.php">S'inscrire</a></li>
              <li><a href="#">Profil</a></li>
              <li><a href="options.php">Options</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input class="form-control" type="text">
          </div>
          <button type="submit" class="btn btn-default">Chercher</button>
        </form>
      </div>
    </div>
  </nav>
  <div id="center" align="center">
    <div id="earth_holder">
      <div id="earth_ball"></div>
      <div id="earth_glow"></div>
      <div id="earth"></div>
    </div>
  </div>
