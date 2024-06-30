<?php
require ("./actions/database.php");

if (isset($_POST["publier"])) {
    if (!empty($_POST["subject"]) AND !empty($_POST["question"])) {

        $questionSubject = htmlspecialchars($_POST["subject"]);
        $question = nl2br(htmlspecialchars($_POST["question"]));
        $questionDate = date("Y-m-d");
        $questionHour = date("H:i:s");
        $questionAuthorId = $_SESSION['id'];
        $questionAuthorPseudo = $_SESSION['pseudo'];

        $insertQuestion = $connexion->prepare("INSERT INTO questions(idAuteur, pseudoAuteur, sujet, question, date, temps) VALUES (?, ?, ?, ?, ?, ?)");
        $insertQuestion->execute(
            array(
                $questionAuthorId,
                $questionAuthorPseudo,
                $questionSubject,
                $question,
                $questionDate,
                $questionHour
            )
        );
        $successMsg = "Publiée!";

    }else {
        $Msg = "Veuillez remplir tous les champs!";
    }
}