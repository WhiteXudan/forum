<?php
require ("./actions/database.php");

if(isset($_POST['envoyer'])){
    if(!empty($_POST['answer'])){
        $answer = nl2br(htmlspecialchars($_POST['answer']));
        $answerDate = date("Y-m-d");
        $answerTime = date("H:i:s");
        $answerAuthorId = $_SESSION['id'];
        $answerAuthorPseudo = $_SESSION['pseudo'];

        $insertAnswer = $connexion->prepare("INSERT INTO reponses(idAuteur, pseudoAuteur, idQuestion, reponse, date, temps) VALUES (?,?,?,?,?,?)");
        $insertAnswer->execute(
            array(
                $answerAuthorId,
                $answerAuthorPseudo,
                $idOfQuestion,
                $answer,
                $answerDate,
                $answerTime
            )
        );
    }else{
        $errorAnswerMsg = "Veuillez remplir le champs";
    }
}