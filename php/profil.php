<?php
session_start();
if (isset($_POST['deco'])) {
    header("location:connexion.php");
    session_destroy();
}
if (!isset($_SESSION['login'])) {
    header("location: connexion.php");
}

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
    <form action="#" method="post" id="form">
        <?php
        echo '<h1>Bienvenue ' . $_SESSION['login'] . '</h1>';
        $login = $_SESSION['login'];
        $mdp = $_SESSION['password'];

        $connect = mysqli_connect("localhost:3306", "yoni", "Marseille,13", "yonathan-darmon_moduleconnexion"); /*connexion a la base*/
        $req = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE password='$mdp' AND login='$login' ");
        $table = mysqli_fetch_all($req, MYSQLI_ASSOC);
        foreach ($table as $key => $value) ;
        if (isset($_POST['submit']) && $_POST['password'] === $_POST['confirm']) {
            $util = $_POST['login'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $password = $_POST['password'];
            $update = mysqli_query($connect, "UPDATE utilisateurs SET login = '$util', password = '$mdp', prenom = '$prenom',nom = '$nom',password = '$password' WHERE login = '$login' AND password = '$mdp'");
            mysqli_query($connect, $update);
            header("location: book.php");
        }
        ?>
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" value=<?php echo $value['login']; ?>>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value=<?php echo $value['prenom']; ?>>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value=<?php echo $value['nom']; ?>>
        <label for="password">Mot de passe</label>
        <input type="text" name="password" value=<?php echo $value['password']; ?>>
        <label for="confir">Confirmer votre mot de passe</label>
        <input type="text" name="confirm" value=<?php echo $value['password']; ?>>
        <input type="submit" value="modifier" name="submit">
    </form>
    <?php
    if ($login == 'admin' && $mdp == 'admin') {
        echo "<a href='admin.php'>Acces à la page admin</a>";
    }
    ?>
</main>
<footer></footer>
</body>
</html>
