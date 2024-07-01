<?php 
    require("./actions/users/securityAction.php"); 
    require("./actions/questions/publishQuestionAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php'); ?>

<body>

    <?php include('./includes/navbar.php');?>

    <br><br>
    <form style="margin:0% 30% 0% 30%" action="" method="post">

        <?php
            if(isset($Msg)){
                echo '<p style="text-align:center; color:red;">'. $Msg .'</p>';
            }elseif(isset($successMsg)){
                echo '<p style="text-align:center; color:green;">'. $successMsg .'</p>';
            }
        ?>

        <div class="mb-3">
            <label for="pseudo" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="pseudo" name="subject">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Question</label>
            <textarea type="text" rows="6" class="form-control" id="prenom" name="question"></textarea>
        </div>
        <button type="submit" name="publier" class="btn btn-primary">Publier la question</button>
    </form>
</body>

</html>