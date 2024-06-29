<?php require("./actions/loginAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body>
    <br><br>
    <form class="container" action="" method="post">

        <?php if(isset($errorMsg)){echo '<p>'. $errorMsg .'</p>';} ?>

        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="validate" class="btn btn-primary">Se connecter</button>
        <br><br>
        <p>Je n'ai pas de compte.<a href="./signup.php">Inscription</a></p>
    </form>
</body>


</html>