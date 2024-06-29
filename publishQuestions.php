<?php require("./actions/securityAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php'); ?>

<body>
    <br><br>
    <form class="container" action="" method="post">

        <?php if(isset($errorMsg)){echo '<p>'. $errorMsg .'</p>';} ?>

        <div class="mb-3">
            <label for="pseudo" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Question</label>
            <textarea type="text" rows="6" class="form-control" id="prenom" name="firstname"></textarea>
        </div>
        <button type="submit" name="validate" class="btn btn-primary">Publier la question</button>
    </form>
</body>

</html>