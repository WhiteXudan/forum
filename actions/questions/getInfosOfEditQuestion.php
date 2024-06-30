<?php
require ("./actions/database.php ");

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $connexion->prepare("SELECT * FROM questions WHERE id = ?");
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){
        
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos["idAuteur"] == $_SESSION['id']){
            $questionSubject = $questionInfos["sujet"];
            $question = $questionInfos["question"];

            $questionSubject = str_replace("<br />", "", $questionSubject) ;
            $question = str_replace("<br />", "", $question);
            $questionAuteurId = $questionInfos["idAuteur"];

        }else{
            $errorMsg = "Vous n'avez pas des droits pour modifier cette question...";
        }
    }else{
        $errorMsg = "Aucune question indexée...";
    }

} else {
    $errorMsg = "Aucune question indexée...";
}