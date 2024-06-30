<?php 
    session_start();
    require ("./actions/questions/showQestionsAction.php");
?>

<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body>
    <?php include("./includes/navbar.php"); ?>
    <br><br>

    <div class="container">
        <form method="get">
            <div class="form-group row">
                <div class="col-7"></div>
                <div class="col-3">
                    <input type="search" name="search" id="" class="form-control">
                </div>
                <div class="col-2">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>

        <?php foreach ($allQuestions as $questions){ 
            //Formatter le temps (Heure Minutes Secondes)
            $time = $questions['temps'];
            $date = $questions['date'];
            list($hours, $minutes, $seconds) = explode(':', $time);
            $formattedTime = sprintf("%02dh %02dmin %02ds", $hours, $minutes, $seconds);
            $formattedDate = str_replace("-", "/", $date);
        ?>
        <div class="card">

            <div class="card-body">
                <a href="./article.php?id=<?= $questions['id']; ?>">
                    <h5 class="card-title"><?= $questions['sujet'] ?></h5>
                </a>

                <p class="card-text"><?= $questions['question'] ?></p>
            </div>
            <h5 class="card-header">Publié par <?= $questions['pseudoAuteur'] ?> le <?= $formattedDate ?> à
                <?= $formattedTime ?></h5>
        </div>
        <br>
        <?php } ?>

    </div>

</body>

</html>