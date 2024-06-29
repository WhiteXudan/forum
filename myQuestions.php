<?php 
    require("./actions/questions/myQuestionsAction.php");
    require("./actions/users/securityAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body>
    <?php include("./includes/navbar.php"); ?>

    <br><br>
    <div class="container">

        <?php
        foreach ($allMyQuestions as $MyQuestions) {
            echo '<div class="card">';
                echo '<h5 class="card-header">MES QUESTIONS</h5>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">'. $MyQuestions['sujet'].' :</h5>';
                    echo '<p class="card-text">'.$MyQuestions['question'].'</p>';
                    echo '<a href="#" style="margin-right: 5px;" class="btn btn-primary">Accéder au forum</a>';
                    echo '<a href="#" class="btn btn-warning">Modifier la question</a>';
                echo '</div>';
            echo '</div><br>';

        }

    ?>
    </div>


</body>

</html>