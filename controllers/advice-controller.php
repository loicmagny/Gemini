<?php
//On instancie la classe advice()
$advice = new advice();
//On appelle la méthode getAdvicesList() afin d'afficher les conseils présent en base de données
$adviceList = $advice->getAdvicesList();
