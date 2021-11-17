<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "moduleconnexion"); /*connexion a la base*/
$req=mysqli_query($connect, 'SELECT * FROM utilisateurs');
$table=mysqli_fetch_all($req,MYSQLI_ASSOC);
foreach ($table as $key=>$value);
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
<div class="card">

</div>
</main>
<footer></footer>

</body>
</html>
