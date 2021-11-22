<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
if (isset($_POST['deco'])) {
    header("location:index.php");
    session_destroy();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Parisienne&display=swap');
    </style>
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="stylesheet" href="asset/css/header.css">
    <?php
    if (isset($_SESSION['login'])) {
        echo '<link rel="stylesheet" href="asset/css/session.css">';
    } else {
        echo '<link rel="stylesheet" href="asset/css/passess.css">';
    }
    ?>
</head>
<body>
<header>
    <nav>
        <div class="wrapper">
            <ul class="mainMenu">
                <li class="item" id="account">
                    <a href="#account" class="btn"><i class="fas fa-user-circle"></i>Mon compte</a>
                    <div class="subMenu">
                        <a href="index.php">Accueil</a>
                        <a href="php/profil.php">Mes données</a>

                        <?php
                        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                            $login = $_SESSION['login'];
                            $mdp = $_SESSION['password'];
                            echo "<a href='php/book.php'>Mon Livre</a>";
                            if ($login== 'admin' && $mdp == 'admin') {
                                echo "<a href='php/admin.php'> Page admin</a>";

                            } else {
                                echo "";
                            }
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
                    </div>
                </li>
                <form action="#" method="post" id="deco">
                    <input type="submit" value="Deconnexion" name="deco">
                </form>
            </ul>
        </div>


    </nav>
</header>
<main>

    <?php
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        $req = mysqli_query($connect, "SELECT nom,prenom FROM utilisateurs WHERE login='$login' AND password='$password' ");
        $table = mysqli_fetch_all($req, MYSQLI_ASSOC);
        foreach ($table as $key => $value) ;
        $nom = $value['nom'];
        $prenom = $value['prenom'];
        echo "<div class='container'>";
        echo "<div class='card'>";
        echo "<div class='text'> <p>  La carte de membre de <b> $login </b> </p>
                                     <p>$nom </p>
                                     <p>$prenom</p>";
        echo " <div class='bouton'><p><a href='php/book.php'>Aller au livre!</a></p></div></div>";
        echo "<img src='asset/image/book-library-with-open-textbook.jpg' alt='bibliotheque' class='book'>";

        echo "</div>";

    } else {
        echo "<div class='container'>";
        echo "<div class='card'>";
        echo "<div class='text'>  <p> Le classeur</p>
                                     <p>de </p>
                                     <p>Madame Darmon</p>
                                     <div class='bouton'><p><a href='php/connexion.php'>Ouvrir le classeur</a></p></div></p></div>";
        echo "<img src='asset/image/book-library-with-open-textbook.jpg' alt='bibliotheque' class='book'>";
        echo "</div>";

    }
    ?>


</main>
<footer></footer>

</body>
</html>
