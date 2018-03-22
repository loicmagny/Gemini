<?php
//On instancie la classe tips()
$tips = new tips();
//On appelle la méthode getAdvicesList() afin d'afficher les conseils présent en base de données
$tipsList = $tips->getTipsList();
