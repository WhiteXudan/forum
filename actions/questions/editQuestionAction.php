<?php
require ("./actions/database.php ");

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    $checkIfQuestionExists = $connexion->prepare("SELECT id FROM questions WHERE id = ?");
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

    }else{
        $errorMsg = "Aucune question indexée...";
    }

} else {
    $errorMsg = "Aucune question indexée...";
}