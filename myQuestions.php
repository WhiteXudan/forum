<?php 
    require("./actions/users/securityAction.php");
    require("./actions/questions/myQuestionsAction.php");
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
        //Formatter le temps (Heure Minutes Secondes)
        $time = $MyQuestions['temps'];
        list($hours, $minutes, $seconds) = explode(':', $time);
        $formattedTime = sprintf("%02dh %02dmin %02ds", $hours, $minutes, $seconds);

        echo '<div class="card">';
            echo '<h5 class="card-header">'.$MyQuestions['date'].' à '.$formattedTime.'</h5>';
            echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$MyQuestions['sujet'].' :</h5>';
                echo '<p class="card-text">'.$MyQuestions['question'].'</p>';
                echo '<a href="./actions/questions/deleteQuestionAction.php?id='.$MyQuestions["id"].'" style="margin-right: 5px;" class="btn btn-danger">Supprimer</a>';
                echo '<a href="./editQuestion.php?id='.$MyQuestions["id"].'" class="btn btn-warning">Modifier</a>';
            echo '</div>';
        echo '</div><br>';

    }

    ?>
    </div>


</body>

</html>