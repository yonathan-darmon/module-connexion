<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
$req = mysqli_query($connect, 'SELECT nom,prenom FROM utilisateurs');
$table = mysqli_fetch_all($req, MYSQLI_ASSOC);
foreach ($table as $key => $value) ;
foreach ($value as $value2);
var_dump($value);
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

  <!--  --><?php
/*    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];

        if ($_SESSION['login']==$value2['login']){
        echo '<p>La carte de membre de ' . $login . '</p>';
        echo "<div class=card>";
        echo "<div class=text>
                 <p>$nom </p>
                 <p>$prenom</p>

               </div>";
        echo " <img src= alt=>";
        echo "</div>";
    }
    */?>


</main>
<footer></footer>

</body>
</html>
