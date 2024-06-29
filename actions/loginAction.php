<?php

require ("./actions/database.php");

//Validation du formulaire
if(isset($_POST['validate'])){
    //Verifier si l'User a bien remplit tous les champs
    if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
        
        //Les données de l'User
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //Si l'utilisateur existe
        $checkIfUserExists = $connexion->prepare("SELECT * FROM users  WHERE pseudo = ?");
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {
            
            //Récupérer les données de l'utilisateur
            $UsersInfos = $checkIfUserExists->fetch();

            //Vérifier  si le mot de pass est correct
            if(password_verify($user_password, $UsersInfos['mdp'])){

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales SESSION
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $UsersInfos['id'];
            $_SESSION['pseudo'] = $UsersInfos['pseudo'];
            $_SESSION['lastname'] = $UsersInfos['nom'];
            $_SESSION['firstname'] = $UsersInfos['prenom'];

            //Rediriger vers la page d'acceuil
            header('Location : index.php');

            }else {
                $errorMsg = "Mot de pass incorrect...";
            }
        } else {
            $errorMsg = "Pseudo introuvable...";
        }
        
    } else{
        $errorMsg = "Veuillez remplir tous les champs!";
    }
}