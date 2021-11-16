<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
/*On commence le formulaire*/
if (!isset($_POST['submit'])) {
    echo '<h1>Inserer vos données personnels</h1>';
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
    echo '<h1>verifier votre mot de passe</h1>';
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
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
        <label for="nom">Nom</label>
        <input type="text" name="nom">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <label for="confirm">Confirmation de mot de passe</label>
        <input type="password" name="confirm">
        <input type="submit" value="envoyer" name="submit">
    </form>
</main>
<footer></footer>
</body>
</html>
