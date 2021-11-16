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
</head>
<body>
<header></header>
<main>
    <form action="#" method="post">
        <input type="text" name="login">
        <p>Nom d'utilisateur</p>
        <input type="text" name="password">
        <p>Mot de passe</p>
        <input type="submit" name="submit" value="Connexion">
    </form>
    <a href="inscription.php">Pas encore inscrit?</a>
</main>
<footer></footer>
</body>
</html>