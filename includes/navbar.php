<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"
            style="display:flex; justify-content:space-between !important;">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <div style="display: flex;">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Questionnaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./myQuestions.php">Mes Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./publishQuestion.php">Publier une question</a>
                    </li>
                </div>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <div style="display:flex; align-items:center;">

                    <?php if(isset($_SESSION['auth'])):
                        require ("./actions/database.php");

                        if(isset($_GET['id']) && !empty($_GET['id'])){

                            $idOfUser = $_GET['id'];

                            $checkIfUserExists = $connexion->prepare("SELECT pseudo, profil FROM users WHERE id = ?");
                            $checkIfUserExists->execute(array($idOfUser));

                            if($checkIfUserExists->rowCount() > 0){

                                $userInfos = $checkIfUserExists->fetch();
                                $userPseudo = $userInfos['pseudo'];
                                $userProfil = base64_encode($userInfos['profil']);

                            }else{
                                $profil = substr($userPseudo, 0, 1);
                            }
                        }
                        ?>
                    <!--
                    <div
                        style="width:50px;height:50px; border: 2px solid blue; border-radius:50%; background:green; margin-right:10px; overflow:hidden">
                        <a href="./profile.php?id=<?= $_SESSION['id']; ?>">
                            <?php if(!empty($userProfil)){
                                echo '<img src="data:image/jpeg;base64,'.$userProfil.'" alt="" style="width:50px; height:100px;">';
                            } else {
                                echo '<p style="text-align:center; text-transform:uppercase; color:white;">' . $profil . '</p>';
                            }
                            ?>
                        </a>
                    </div>
                        -->
                    <li class="nav-item">
                        <a class="nav-link" href="./actions/users/logoutAction.php">Deconnexion</a>
                    </li>
                    <?php else:?>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Connexion</a>
                    </li>
                    <?php endif;?>
                </div>
            </ul>
        </div>
    </div>
</nav>