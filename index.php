<?php
include 'header.php'
?>
<ul class="nav nav-tabs center">
  <li class="active"><a href="#home" data-toggle="tab">Bienvenue</a></li>
  <li><a href="#news" data-toggle="tab">News</a></li>
  <li><a href="#profile" data-toggle="tab">Se connecter</a></li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gemini<span class="caret"></span>
    </a>
    <ul class="dropdown-menu center">
      <li><a href="#dropdown1" data-toggle="tab">Qu'est ce que c'est?</a></li>
      <li class="divider"></li>
      <li><a href="#dropdown2" data-toggle="tab">Comment ça marche?</a></li>
    </ul>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
    <div class="jumbotron">
      <h1 class="display-3">Bienvenue</h1>
      <p>Ceci est un message de bienvenue.</p>
    </div>
  </div>
  <div class="tab-pane fade in" id="news">
    <div class="jumbotron">
      <h2 class="display-3">News</h2>
      <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>News</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>News 1</td>
            <td>Date</td>
          </tr>
          <tr>
            <td>News 2</td>
            <td>Date</td>
          </tr>
          <tr class="table-info">
            <td>News 3</td>
            <td>Date</td>
          </tr>
          <tr class="table-success">
            <td>News 4</td>
            <td>Date</td>
          </tr>
          <tr class="table-danger">
            <td>News 5</td>
            <td>Date</td>
          </tr>
          <tr class="table-warning">
            <td>News 6</td>
            <td>Date</td>
          </tr>
          <tr class="table-active">
            <td>News 7</td>
            <td>Date</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="tab-pane fade" id="profile">
    <div class="jumbotron">
      <h2 class="display-3">Se connecter</h2>
      <form>
        <p><label for="username"><input type="text" name="username"> Nom d'utilisateur</label></p>
        <p><label for="password"><input type="text" name="password"> Mot de passe</label></p>
        <p><a href="#" class="btn btn-primary">Se connecter</a></p>
        <p><a href="#">Mot de passe oublié?</a></p>
        <p><a href="#">Pas encore inscrit? C'est par ici!</a></p>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="dropdown1">
    <div class="jumbotron info">
      <h2 class="display-3">Gemini, qu'est ce que c'est?</h2>
      <p>Gemini est un site qui vous permet de connaitre la composition des produits que vous pouvez acheter en supermarché, en pharmacie et égalament dans les boutiques de cosmétiques.</p>
      <p>Le site est entièrement gratuit, et comporte une partie communautaire dans laquelle vous trouverez des articles, un forum et quelques conseils santé ou alimentation.</p>
    </div>
  </div>
  <div class="tab-pane fade" id="dropdown2">
    <div class="jumbotron info">
      <h2>Gemini, comment ça marche?</h2>
      <ul>
        <li>Lorsque vous effectuez une recherche sur Gemini, que ce soit un produit ou un composant, vous trouverez toujours le même type d'informations.</li>
        <li>Pour un produit vous trouverez le nom, la photo du produit, le code couleur (que vous pouvez consulter <a data-toggle="modal" href="#" data-target="#myModal">ici</a>) et un paragraphe présentant les différents composants présents dans le produit afin que vous puissiez les consulter</li>
        <li>Pour un composant vous trouverez le nom, le code couleur, le type de composant, et l'explication de ses effets dans le produit et sur le corps.</li>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Code couleur</h4>
              </div>
              <div class="modal-body">
                <p><div class="green"></div>Sain</p>
                <p><div class="blue"></div>Inoffensif</p>
                <p><div class="orange"></div>Dangereux</p>
                <p><div class="red"></div>Nocif</p>
                <p><div class="black"></div>Cancerigène</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include 'footer.php'
    ?>
