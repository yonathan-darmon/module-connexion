<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/css/book.css">
    <link rel="stylesheet" href="../asset/css/header.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Parisienne&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap');
    </style>
    <title>Document</title>
</head>
<body>
<header>
    <?php require "header.php"; ?>
</header>
<main>
    <div class="component">
        <ul class="align">
            <!-- Book 1 -->
            <li>
                <figure class='book'>
                    <!-- Front -->
                    <ul class='hardcover_front'>
                        <li>
                            <img src='../asset/image/camus.jpeg' alt="camus" width="100%" height="100%">
                        </li>
                        <li></li>
                    </ul>
                    <!-- Pages -->
                    <ul class='page'>
                        <li></li>
                        <li>
                            <a class="btn, inside" href="profil.php">Mes
                                </br>données
                            </a>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- Back -->
                    <ul class='hardcover_back'>
                        <li></li>
                        <li></li>
                    </ul>
                    <ul class='book_spine'>
                        <li></li>
                        <li></li>
                    </ul>
                    <figcaption>
                        <h1>Bienvenue sur ta page du classeur</h1>
                        <p>Le site est encore en développement, bientot tu auras acces à tes cours et divers
                            documents.</p>
                        <p>En attendant n'hésite pas à ouvrir le livre pour modifier tes données.</p>
                    </figcaption>
                </figure>
            </li>
</main>
<footer></footer>
</body>
</html>
