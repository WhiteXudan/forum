<?php session_start(); require ("./actions/questions/showQestionsAction.php"); ?>

<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body>
    <?php include("./includes/navbar.php"); ?>
    <br><br>

    <form method="get">
        <div class="form-group row">
            <div class="col-7"></div>
            <div class="col-3">
                <input type="search" name="search" id="" class="form-control" style="border-radius:0px !important;">
            </div>
            <div class="col-2">
                <button class="btn btn-success" type="submit" style="border-radius:0px !important;">Rechercher</button>
            </div>
        </div>
    </form>
    <br>
    <div style="background: #00a0df;">
        <h3 style="text-align:center; color:white; padding:10px;">FORUM</h3>
    </div>
    <br><br>
    <div class="container">
        <?php
        if(isset($errMsg)){
            echo '<h1 style="text-transform: uppercase; text-align:center;">'.$errMsg.'...</h1>';
        } else {
            foreach ($allQuestions as $questions) {
                //Formatter le temps (Heure Minutes Secondes)
                $time = $questions['temps'];
                $date = $questions['date'];
                list($hours, $minutes, $seconds) = explode(':', $time);
                $formattedTime = sprintf("%02dh %02dmin %02ds", $hours, $minutes, $seconds);
                $formattedDate = str_replace("-", "/", $date);
                if (isset($_SESSION['id'])) {
                    if ($questions['idAuteur'] == $_SESSION['id']) {
                        ?>
        <div class="row">
            <div class="col-9">
                <div class="card" style="border-radius:0px !important;">

                    <div class="card-body">
                        <a href="./article.php?id=<?= $questions['id']; ?>">
                            <h5 class="card-title"><?= $questions['sujet'] ?></h5>
                        </a>
                        <p class="card-text"><?= $questions['question'] ?></p>
                    </div>
                    <h5 class="card-header">Publié par <span
                            style="color:blueviolet;font-weight:500;">@<?= $questions['pseudoAuteur'] ?></span> le
                        <span style="color:#00a0df;"><?= $formattedDate ?></span> à
                        <span style="color:#00a0df;"><?= $formattedTime ?></span>
                    </h5>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
        <br>
        <?php } else{
        ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <div class="card" style="border-radius:0px !important;">

                    <div class="card-body">
                        <a href="./article.php?id=<?= $questions['id']; ?>">
                            <h5 class="card-title"><?= $questions['sujet'] ?></h5>
                        </a>
                        <p class="card-text"><?= $questions['question'] ?></p>
                    </div>
                    <h5 class="card-header">Publié par <span
                            style="color:blueviolet;font-weight:500;">@<?= $questions['pseudoAuteur'] ?></span> le
                        <span style="color:#00a0df;"><?= $formattedDate ?></span> à
                        <span style="color:#00a0df;"><?= $formattedTime ?></span>
                    </h5>
                </div>
            </div>
        </div>
        <br>
        <?php }
        } else {
        ?>
        <div class="card" style="border-radius:0px !important;">

            <div class="card-body">
                <a href="./article.php?id=<?= $questions['id']; ?>">
                    <h5 class="card-title"><?= $questions['sujet'] ?></h5>
                </a>
                <p class="card-text"><?= $questions['question'] ?></p>
            </div>
            <h5 class="card-header">Publié par <span
                    style="color:blueviolet;font-weight:500;">@<?= $questions['pseudoAuteur'] ?></span> le
                <span style="color:#00a0df;"><?= $formattedDate ?></span> à
                <span style="color:#00a0df;"><?= $formattedTime ?></span>
            </h5>
        </div>

        <br>
        <?php }
            }
        }?>
    </div>
    </div>
</body>

</html>