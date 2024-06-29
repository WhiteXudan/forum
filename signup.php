<?php require("./actions/signupAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>

<body>
    <br><br>
    <form class="container" action="" method="post">

        <?php if(isset($errorMsg)){echo '<p>'. $errorMsg .'</p>';} ?>

        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="lastname">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="firstname">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="validate" class="btn btn-primary">S'inscrire</button>
        <br><br>
        <p>J'ai déjà un compte.<a href="./login.php">Connexion</a></p>
    </form>
</body>

</html>