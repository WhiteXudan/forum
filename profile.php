<?php
    session_start();
    require ("actions/users/showUserProfileAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body>
    <?php include("./includes/navbar.php"); ?>

    <?php 
    if (isset($errorMsg)){
        echo '<p>' . $errorMsg . '</p>';
    }

    if(isset($userInfos)){
        ?>
    <br><br>
    <div class="card container" style="padding : 0 !important; border-radius: 0 !important;">

        <h1 class="card-header" style="display: flex; align-items:center;">
            <div class=""
                style="width:70px;height:70px; border: 3px solid blue; border-radius:50%; background:green; margin-right:10px; overflow:hidden">
                <img src="./assets/PSX_20240418_000057.jpg" alt="" style="width:70px; height:140px;">
            </div>
            <div>
                @<?= $userPseudo; ?>
            </div>

        </h1>



        <div class="card-body">
            <h5 class="card-title">Nom : <?= $userLastname; ?></h5>
            <h5 class="card-title">Prenom : <?= $userFirstname; ?></h5>

        </div>

    </div>
    <br>
    <?php

    }

    ?>

</body>

</html>