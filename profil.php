<?php
session_start();
echo '<h1>Bienvenue ' . $_SESSION['login'] .'</h1>';
$login=$_SESSION['login'];
$mdp=$_SESSION['mdp'];
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
$req= mysqli_query($connect,'SELECT * FROM utilisateurs WHERE '') ;
$table=mysqli_fetch_all($req,MYSQLI_ASSOC);

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
        <input type="text" name="login" value="login">
        <p>Nom d'utilisateur</p>
        <input type="text" name="prenom" value="prenom">
        <p>Prénom</p>
        <input type="text" name="nom" value="nom">
        <p>Nom</p>
        <input type="text" name="password" value="password">
        <p>Mot de passe</p>
        <input type="text" name="confirm" value="confirm">
        <p>Confirmer votre mot de passe</p>
        <input type="submit" value="envoyer" name="submit">
    </form>
</main>
<footer></footer>
</body>
</html>
