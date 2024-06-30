<?php
    require ("./actions/users/securityAction.php");
    require ("./actions/questions/getInfosOfEditQuestion.php");
    require ("./actions/questions/editQuestionAction.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php include ("./includes/head.php"); ?>

<body>
    <?php include ("./includes/navbar.php"); ?>

    <br><br>
    <div class="container">
        <?php
            if(isset($errorMsg)){ 
                echo '<p>'. $errorMsg .'</p>'; 
            }
        ?>

        <?php if(isset($questionAuteurId)): ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Sujet</label>
                <input type="text" class="form-control" id="pseudo" name="subject" value="<?= $questionSubject ?>">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Question</label>
                <textarea type="text" rows="6" class="form-control" id="prenom"
                    name="question"><?= $question ?></textarea>
            </div>
            <button type="submit" name="publier" class="btn btn-primary">Modifier la question</button>
        </form>
        <?php endif; ?>

    </div>

</body>

</html>