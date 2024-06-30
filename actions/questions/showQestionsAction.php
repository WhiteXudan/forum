<?php

    require ("./actions/database.php");

    $getAllQuestions = $connexion->prepare("SELECT * FROM questions ORDER BY id DESC");
    $getAllQuestions->execute();
    $allQuestions = $getAllQuestions->fetchAll();

    if(empty($allQuestions)){
        $errMsg = "Aucune question n'a été publiée pour l'instant...";
    }
    
    if(isset($_GET['search']) AND !empty($_GET['search'])){

        $userSearch = $_GET['search'];

        $getAllQuestions = $connexion->prepare("SELECT * FROM questions WHERE sujet LIKE ? OR question LIKE ? ORDER BY id DESC");
        $getAllQuestions->execute(array("%$userSearch%", "%$userSearch%"));
        $allQuestions = $getAllQuestions->fetchAll();

        if(empty($allQuestions)){
            $errMsg = "No results found...";
        }
    }

    