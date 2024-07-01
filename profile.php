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
        echo '<h1 style="text-transform: uppercase; text-align:center;">'.$errorMsg.'...</h1>';
    }

    if(isset($userInfos)){
        ?>
    <br><br>
    <div class="card container" style="padding : 0 !important; border-radius: 0 !important;">

        <h1 class="card-header" style="display: flex; align-items:center;">
            <div class="" <?php if (isset($userProfil)){ ?>
                style="width:70px;height:70px; border: 3px solid blue; border-radius:50%; background: white; margin-right:10px; overflow:hidden;">
                <img src="data:image/png;base64, <?= $userProfil; ?>" alt="" style="width:70px; height:70px;">
                <?php } else {
                echo '<p style="text-align:center; text-transform:uppercase; color:white; margin-bottom:4px !important; font-size:30px; font-weight:800;">' . $profil . '</p>';
            }?>

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