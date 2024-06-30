<?php
require ("./actions/database.php");

if(isset($_POST["publier"])){
    //Verifier si le champs sont bien remplient
    if(!empty($_POST["subject"]) AND !empty($_POST["question"])){

        $newQuestionSubject = htmlspecialchars($_POST["subject"]);
        $newQuestion = nl2br(htmlspecialchars($_POST["question"]));

        //Mise à jour des questions
        $editQuestion = $connexion->prepare("UPDATE questions SET sujet = ?, question = ? WHERE id = ?");
        $editQuestion->execute(array($newQuestionSubject, $newQuestion, $idOfQuestion));

        //Redirection vers la ses questions
        header("Location: ./myQuestions.php");
    }else{
        $errorMsg = "Veuillez remplir tous les champs!";
    }
}