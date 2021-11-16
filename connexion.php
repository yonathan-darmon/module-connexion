<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
if (!isset($_POST['submit'])) {
    echo 'Veuillez entrer votre Nom et Mot de passe';
}
/*ce qu il se passe quand on clique sur submit*/
elseif (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $mdp = $_POST['password'];
    $req = mysqli_query($connect, 'SELECT * FROM `utilisateurs`');
    $table = mysqli_fetch_all($req, MYSQLI_ASSOC);
    foreach ($table as $key => $value) { /*on parcours les donnée de la bdd*/
        if ($value['login'] == $login && $value['password'] == $mdp) {/* si le mot de passe et le login sont les memes*/
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $mdp;

            header("location:profil.php");
            exit;
        }

    }
    if ($value['login'] != $login || $value['password'] != $mdp) {
        echo 'Erreur de login/Mot de passe';
    }
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
    <form action="#" method="post">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login">
        <label for="password">Mot de passe</label>
        <input type="password" name="password">
        <input type="submit" name="submit" value="Connexion">
    </form>
    <a href="inscription.php">Pas encore inscrit?</a>
</main>
<footer></footer>
</body>
</html>