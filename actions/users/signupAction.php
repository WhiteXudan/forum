<?php

require("./actions/database.php");

//Validation du formulaire
if(isset($_POST['validate'])){
    //Verifier si l'User a bien remplit tous les champs
    if (!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])) {
        
        //Les données de l'User
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        //Verifer si l'User existe déjà sur le site
        $checkIfUserIsAlreadyExists = $connexion->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserIsAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserIsAlreadyExists->rowCount() == 0) {
            
            //Insérer l'User dans la base de données
            $insertUser = $connexion->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
            $insertUser->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));

            //Recupérer les informations de l'User
            $getInfosOfThisUser = $connexion->prepare('SELECT id, pseudo, nom,, prenom FROM users WHERE pseudo = ? AND nom = ? AND prenom = ?');
            $getInfosOfThisUser->execute(array($user_pseudo, $user_lastname, $user_firstname));

            /*$UsersInfos = $getInfosOfThisUser->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales SESSION
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $UsersInfos['id'];
            $_SESSION['pseudo'] = $UsersInfos['pseudo'];
            $_SESSION['lastname'] = $UsersInfos['nom'];
            $_SESSION['firstname'] = $UsersInfos['prenom'];*/

            //Rediriger l'utilisateur vers la page d'accueil    
            header('Location: login.php');
        } else{
            $errorMsg = "Ce pseudo est déjà utilisé!";
        }
    } else{
        $errorMsg = "Veuillez remplir tous les champs!";
    }
}