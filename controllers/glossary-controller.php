<?php

//On instancie la classe definition()
$glossary = new glossary();
$searchError = array();
//On créé un tableau contenant les lettres de l'alphabet afin de mettre en place la pagination alphabétique
$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
if (isset($_GET['letter'])) {
    //On appelle la méthode definitionList afin d'afficher la totalité des définitions contenues dans la base de données
    $definitionList = $glossary->definitionList($_GET['letter']);
} else
if (empty($_GET['letter'])) {
    $searchError['noDefinition'] = 'Il n\'y a aucune définition';
} else if (!$definitionList) {
    $searchError['noDefinitionFound'] = "Nous n'avons rien trouvé";
}
?>