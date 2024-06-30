<?php 
    session_start();
    require("./actions/questions/showArticleContentAction.php"); 
    require("./actions/questions/reponseAction.php");
    require("./actions/questions/showAllResponsesAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("./includes/head.php"); ?>

<body>
    <?php include ("./includes/navbar.php"); ?>
    <br><br>

    <div class="container">


        <?php if (isset($errorMsg)){
            echo '<p>'.$errorMsg.'</p>';
        } else { ?>
        <section class="showContent">
            <h3><?= $questionSubject; ?></h3>
            <hr>
            <p><?= $question; ?></p>
            <hr>
            <small><?= 'Publié par ' . $questionAuteurPseudo . ' le ' . $formattedQuestionDate . ' à ' . $formattedQuestionTime; ?></small>
        </section>
        <br>
        <section class="showAnswers">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-8" style="display: flex; flex-direction:column; justify-content:end;">
                    <form class="form-group" method="post">
                        <label for="answer" class="mb-2">
                            <h4>Réponse :</h4>
                        </label>
                        <?php if (isset($errorAnswerMsg)):echo '<p>'.$errorAnswerMsg.'</p>';endif; ?>
                        <textarea name="answer" placeholder="Réponse..." id="answer" rows="4"
                            class="form-control"></textarea>
                        <br>
                        <button type="submit" class="btn btn-success" style="width:100px; margin-bottom: 50px;"
                            name="envoyer">Envoyer</button>
                    </form>

                    <?php while ($allAnswers = $getAllAnswersOfThisQuestion->fetch()) {
                        $formattedAnswerDate = str_replace("-", "/", $allAnswers['date']);
                        $answerTime = $allAnswers["temps"];
                        list($hours, $minutes, $seconds) = explode(':', $answerTime);
                        $formattedAnswerTime = sprintf("%02dh %02dmin %02ds", $hours, $minutes, $seconds);
                    ?>
                    <h3><?= 'Réponse de : ' . $allAnswers['pseudoAuteur'] ?></h3>
                    <p><?= $allAnswers['reponse']; ?></p>
                    <small><?= $formattedAnswerDate . ' à ' . $formattedAnswerTime; ?></small>
                    <hr>
                    <?php } ?>
                </div>
            </div>

        </section>


        <?php } ?>
    </div>

</body>

</html>