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

                    <?php if(isset($_SESSION['auth'])): ?>
                    <div
                        style="width:50px;height:50px; border: 3px solid blue; border-radius:50%; background:green; margin-right:10px; overflow:hidden">
                        <a href="./profile.php?id=<?= $_SESSION['id']; ?>"><img src="./assets/PSX_20240418_000057.jpg"
                                alt="" style="width:50px; height:100px;"></a>
                    </div>
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