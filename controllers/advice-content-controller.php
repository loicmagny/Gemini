<?php

$advice = new advice();
$advice->id = $_GET['advice'];
$adviceContent = $advice->getAdviceContent();

