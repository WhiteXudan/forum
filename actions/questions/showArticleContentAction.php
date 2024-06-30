<?php
    require ("./actions/database.php");

    if (isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfQuestion = $_GET['id'];

        $checkIfQuestionExists = $connexion->prepare("SELECT * FROM questions WHERE id =?");
        $checkIfQuestionExists->execute(array($idOfQuestion));

        if($checkIfQuestionExists->rowCount() > 0){
            //Récuperation de données
            $questionInfos = $checkIfQuestionExists->fetch();

            //Initialisation des variables
            $questionAuteurId = $questionInfos["idAuteur"];
            $questionAuteurPseudo = $questionInfos["pseudoAuteur"];
            $questionSubject = $questionInfos["sujet"];
            $question = $questionInfos["question"];
            $questionDate = $questionInfos["date"];
            $formattedQuestionDate = str_replace("-", "/", $questionDate);
            $questionTime = $questionInfos["temps"];
            $time = $questionInfos['temps'];
            list($hours, $minutes, $seconds) = explode(':', $questionTime);
            $formattedQuestionTime = sprintf("%02dh %02dmin %02ds", $hours, $minutes, $seconds);
        }else{
            $errorMsg = "Question not found...";
        }
    }else{
        $errorMsg = "Question not identified...";
    }