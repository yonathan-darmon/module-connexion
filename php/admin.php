<?php
$connect = mysqli_connect("localhost:3306", "yoni", "Marseille,13", "yonathan-darmon_moduleconnexion"); /*connexion a la base*/
$req = mysqli_query($connect, 'SELECT * FROM utilisateurs');
$table = mysqli_fetch_all($req, MYSQLI_ASSOC);
foreach ($table as $key => $value) ;
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
    <link rel="stylesheet" href="../asset/css/index.css">
    <title>Document</title>
</head>
<body>
<header>
    <?php require "header.php"; ?>
</header>
<main id="admin">
    <table>
        <?php
        echo "<thead><tr>";
        foreach ($table[0] as $key => $value) {
            echo " <th>$key</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "</tbody>";

        foreach ($table as $key => $value) {
            echo "<tr>";
            foreach ($value as $value2) {

                echo "<td>$value2</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";

        ?>
    </table>
    <a href="profil.php">Page de profil</a>
</main>
<footer></footer>
</body>
</html>
