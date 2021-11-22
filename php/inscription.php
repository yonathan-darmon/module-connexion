<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
$req = mysqli_query($connect, 'SELECT * FROM utilisateurs');
$table = mysqli_fetch_all($req, MYSQLI_ASSOC);
foreach ($table as $key => $value) ;
/*On commence le formulaire*/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/css/connexion.css">
    <link rel="stylesheet" href="../asset/css/header.css">
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
    <!--le formulaire-->
    <form action="#" method="post" id="form">
        <?php
        if (!isset($_POST['submit'])) {
            echo '<h1>Inserer vos données personnels</h1>';
        }
        /*Ce qu il se passe quand on clique sur envoyer en ayant le meme mdp a chaque fois*/
        if (isset($_POST['submit'])) {

            $login = $_POST['login'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $password = $_POST['password'];
            if ($_POST['login'] != $value['login'] && $_POST['password'] != $value['password'] && !empty($login) && !empty($prenom) && !empty($nom) && !empty($password)) {
                if ($_POST['password'] === $_POST['confirm']) {
                    $insert = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password')";
                    mysqli_query($connect, $insert);
                    header("location:connexion.php");
                    exit;
                }
            } elseif ($_POST['login'] == $value['login'] && $_POST['password'] == $value['password']) {
                echo '<h1>utilisateur déjà existant</h1>';
            }

        }
        if (empty($login) || empty($prenom) || empty($nom) || empty($password)) {
            echo 'Veuillez remplir tous les champs';
        } /*Si le mdp et la confirmation du mdp n est pas la meme*/
        elseif (isset($_POST['submit']) && $_POST['password'] != $_POST['confirm']) {
            echo '<h1>verifier votre mot de passe/login</h1>';
        }
        ?>
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
