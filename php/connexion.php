<?php
session_start();
$connect = mysqli_connect("localhost:3306", "yoni", "Marseille,13", "yonathan-darmon_moduleconnexion"); /*connexion a la base*/
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
    <link rel="stylesheet" href="../asset/css/header.css">
    <link rel="stylesheet" href="../asset/css/connexion.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Parisienne&display=swap');
    </style>
    <title>Document</title>
</head>
<body>
<header>
    <?php require "header.php"; ?>
</header>
<main>

    <form action="#" method="post" id="form">
        <?php
        if (!isset($_POST['submit'])) {
            echo 'Veuillez entrer votre Nom et Mot de passe';
        } /*ce qu il se passe quand on clique sur submit*/
        elseif (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $mdp = $_POST['password'];
            $req = mysqli_query($connect, 'SELECT * FROM `utilisateurs`');
            $table = mysqli_fetch_all($req, MYSQLI_ASSOC);
            foreach ($table as $key => $value) { /*on parcours les donnée de la bdd*/
                if ($value['login'] == $login && $value['password'] == $mdp) {/* si le mot de passe et le login sont les memes*/
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $mdp;

                    header("location:book.php");
                    exit;
                }

            }
            if ($value['login'] != $login || $value['password'] != $mdp) {
                echo 'Erreur de login/Mot de passe';
            }
        }
        ?>
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="Connexion">
        <a href="inscription.php"></br>Pas encore inscrit?</a>
    </form>

</main>
<footer></footer>
</body>
</html>