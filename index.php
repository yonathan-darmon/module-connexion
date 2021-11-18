<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/


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
    <?php
    if (isset($_SESSION['login'])) {
        echo '<link rel="stylesheet" href="asset/css/session.css">';
    } else {
        echo '<link rel="stylesheet" href="asset/css/passess.css">';
    }
    ?>
</head>
<body>
<header></header>
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
                                     <p>$prenom</p></div>";
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
