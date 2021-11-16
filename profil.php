<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: connexion.php");
}
echo '<h1>Bienvenue ' . $_SESSION['login'] . '</h1>';
$login = $_SESSION['login'];
$mdp = $_SESSION['password'];

$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
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
        <input type="text" name="login" value=<?php echo $value['login']; ?>>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value=<?php echo $value['prenom']; ?>>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value=<?php echo $value['nom']; ?>>
        <label for="password">Mot de passe</label>
        <input type="text" name="password" value=<?php echo $value['password']; ?>>
        <label for="confir">Confirmer votre mot de passe</label>
        <input type="text" name="confirm" value=<?php echo $value['password']; ?>>
        <input type="submit" value="envoyer" name="submit">
    </form>
</main>
<footer></footer>
</body>
</html>
