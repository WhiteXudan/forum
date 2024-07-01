<?php
session_start();
require("./actions/database.php");

//Validation du formulaire
if(isset($_POST['validate'])){
    //Verifier si l'User a bien remplit tous les champs
    if (!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) AND !empty($_FILES['profil'])) {
        
        //Les données de l'User
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Récupérer le fichier
        $file = $_FILES['profil'];
        
        // Récupérer les propriétés du fichier
        $fileName = $_FILES['profil']['name'];
        $fileTmpName = $_FILES['profil']['tmp_name'];
        $fileSize = $_FILES['profil']['size'];
        $fileError = $_FILES['profil']['error'];
        $fileType = $_FILES['profil']['type'];

        $profil = file_get_contents($fileTmpName);
        
        //Verifer si l'User existe déjà sur le site
        $checkIfUserIsAlreadyExists = $connexion->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserIsAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserIsAlreadyExists->rowCount() == 0) {
            
            //Insérer l'User dans la base de données
            $insertUser = $connexion->prepare('INSERT INTO users (pseudo, nom, prenom, mdp, profil) VALUES(?, ?, ?, ?, ?)');

            //Recupérer les informations de l'User
            $getInfosOfThisUser = $connexion->prepare('SELECT id, pseudo, nom,, prenom FROM users WHERE pseudo = ? AND nom = ? AND prenom = ?');
            $getInfosOfThisUser->execute(array($user_pseudo, $user_lastname, $user_firstname));

            //Rediriger l'utilisateur vers la page d'accueil
            if($insertUser->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, $profil))){
                header('Location: login.php');
            }    
        
        } else{
            $errorMsg = "Ce pseudo est déjà utilisé!";
        }
    } else{
        $errorMsg = "Veuillez remplir tous les champs!<br>Il se peut que Votre Photo de profil soit trop volumineux...";
    }
}