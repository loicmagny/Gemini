<?php
//On instancie la classe article()
$article = new articles();
//On appelle la méthode getArticlesList() afin d'afficher la liste des articles contenus en base de données
$articleList = $article->getArticlesList();

