<?php 

require ("./actions/database.php");

if (isset($_POST["publier"])) {
    if (!empty($_POST["subject"]) AND !empty($_POST["question"])) {

        $questionSubject = htmlspecialchars($_POST["subject"]);
        $question = nl2br(htmlspecialchars($_POST["question"]));
        $questionDate = date("Y-m-d");
        $questionAuthorId = $_SESSION['id'];
        $questionAuthorPseudo = $_SESSION['pseudo'];

        $insertQuestion = $connexion->prepare("INSERT INTO questions(idAuteur, pseudoAuteur, sujet, question, date) VALUES (?, ?, ?, ?, ?)");
        $insertQuestion->execute(
            array(
                $questionAuthorId,
                $questionAuthorPseudo,
                $questionSubject,
                $question,
                $questionDate
            )
        );
        $successMsg = "Publiée!";

    }else {
        $errorMsg = "Veuillez remplir tous les champs!";
    }
}