<?php

$definition = new definition();
$searchError = array();
$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
if (isset($_GET['letter'])) {
    $definitionList = $definition->definitionList($_GET['letter']);
} else
if (empty($_GET['letter'])) {
    $searchError['noDefinition'] = 'Il n\'y a aucune définition';
}
?>