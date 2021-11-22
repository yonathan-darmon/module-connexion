<nav>
    <div class="wrapper">
        <ul class="mainMenu">
            <li class="item" id="account">
                <a href="#account" class="btn"><i class="fas fa-user-circle"></i>Mon compte</a>
                <div class="subMenu">
                    <a href="../index.php">Accueil</a>
                    <a href="profil.php">Mes données</a>

                    <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                        $login = $_SESSION['login'];
                        $mdp = $_SESSION['password'];
                        echo "<a href='book.php'>Mon Livre</a>";


                    } else {
                        echo "";
                    }

                    ?>
                </div>
            </li>
            <li class="item" id="about">
                <a href="#about" class="btn"><i class="fas fa-address-card"></i>About</a>
                <div class="subMenu">
                    <a href="https://github.com/yonathan-darmon/module-connexion">Le Git</a>
                    <a href="https://students-laplateforme.io/">annuaire</a>
                </div>
            </li>
            <li class="item" id="support">
                <a href="#support" class="btn"><i class="fas fa-info"></i>Support</a>
                <div class="subMenu">
                    <a href="mailto:yonathan.darmon@laplateforme.io">Me contacter</a>
                    <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                        if ($login == 'admin' && $mdp == 'admin') {
                            echo "<a href='admin.php'> Page admin</a>";
                        }
                    }
                    ?>
                </div>
            </li>
            <form action="#" method="post" id="deco">
                <input type="submit" value="Deconnexion" name="deco">
            </form>
        </ul>
    </div>


</nav>