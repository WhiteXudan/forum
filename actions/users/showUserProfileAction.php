<?php
require ("./actions/database.php");

if(isset($_GET['id']) && !empty($_GET['id'])){

    $idOfUser = $_GET['id'];

    $checkIfUserExists = $connexion->prepare("SELECT pseudo, nom, prenom, profil FROM users WHERE id = ?");
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){

        $userInfos = $checkIfUserExists->fetch();

        $userPseudo = $userInfos["pseudo"];
        $userLastname = $userInfos["nom"];
        $userFirstname = $userInfos["prenom"];
        $userProfil = base64_encode($userInfos['profil']);

    }else{
        $errorMsg = "User Not Found...";
    }
}else{
    $errorMsg = "User Not Found...";
}