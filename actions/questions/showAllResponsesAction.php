<?php
    require ("./actions/database.php");

    $getAllAnswersOfThisQuestion = $connexion->prepare("SELECT * FROM reponses WHERE idQuestion = ?");
    $getAllAnswersOfThisQuestion->execute(array($idOfQuestion));