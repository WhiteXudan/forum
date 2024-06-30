<?php
session_start();
    if (!isset($_SESSION["auth"])){
        header("Location: ./login.php");
    }
    require ("../database.php");

    if(isset($_GET['id']) AND !empty($_GET['id'])){

        $idOfQuestion = $_GET['id'];

        $checkIfQuestionExists = $connexion->prepare("SELECT idAuteur FROM questions WHERE id = ?");
        $checkIfQuestionExists->execute(array($idOfQuestion));
        if($checkIfQuestionExists->rowCount() > 0){

            $userInfos = $checkIfQuestionExists->fetch();
            
            if($userInfos['idAuteur'] == $_SESSION['id']){

                $deleteQuestion = $connexion->prepare("DELETE FROM questions WHERE id = ?");
                $deleteQuestion->execute(array($idOfQuestion));

                //Rediriger vers la page des questions.
                header("Location: ../../myQuestions.php");

            }else {
                $errorMsg = "Vous n'avez pas les droits pour supprier cette question!";
            }
        }else{
            $errorMsg = "Aucune question n'est indexée";
        }

    }else{
        $errorMsg = "Aucune question n'est indexée";
    }