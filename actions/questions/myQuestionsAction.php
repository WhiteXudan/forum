<?php
require ("./actions/database.php ");

$getAllMyQuestions = $connexion->prepare("SELECT id, sujet, question, date, temps FROM questions WHERE idAuteur = ? ORDER BY id DESC");
$getAllMyQuestions->execute(array($_SESSION['id']));
$allMyQuestions = $getAllMyQuestions->fetchAll();