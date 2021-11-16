<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
/*On commence le formulaire*/
if (!isset($_POST['submit'])) {
    echo 'Inserer vos données personnels';
}
/*Ce qu il se passe quand on clique sur envoyer en ayant le meme mdp a chaque fois*/
if (isset($_POST['submit']) && $_POST['password'] === $_POST['confirm']) {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $insert = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password')";
    mysqli_query($connect, $insert);
    header("location:connexion.php");
    exit;
}
/*Si le mdp et la confirmation du mdp n est pas la meme*/
elseif (isset($_POST['submit']) && $_POST['password'] != $_POST['confirm']) {
    echo 'verifier votre mot de passe';
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
</head>
<body>
<header></header>
<main>
    <!--le formulaire-->
    <form action="#" method="post">
        <input type="text" name="login">
        <p>Nom d'utilisateur</p>
        <input type="text" name="prenom">
        <p>Prénom</p>
        <input type="text" name="nom">
        <p>Nom</p>
        <input type="text" name="password">
        <p>Mot de passe</p>
        <input type="text" name="confirm">
        <p>Confirmer votre mot de passe</p>
        <input type="submit" value="envoyer" name="submit">
    </form>
</main>
<footer></footer>
</body>
</html>
