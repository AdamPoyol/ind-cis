<?php

if (isset($_SESSION['IDAbonne'])) {
    $connecte = true;
}
else{
    $connecte=false;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta name="description" content="Ce site vous propose d'écouter de la musique en la téléchargeant légalement !">
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta charset="UTF-8">
  <title>Accueil</title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

    <!-- contenu du site -->
<body>

    <!-- header -->
    <header class="container-fluid header">
        <div class="container">
            <a href="#" class="logo">Les indécis</a>
            <nav class="menu">
                <a href=Accueil.php>Accueil</a>
                <a href="radio.php">Radio</a>
                <a href="">Playlist</a>
                <a href="topFrance.php">Top France</a>
                <a href="profil.php">Profil</a>
            </nav>
            <div class="clear"></div>
                <form class="FormRecherche" action="./Recherche.php" method="get">
                  <input class="BarreRecherche" type="text" name="recherche" id="recherche">
                  <input type="submit" name="Rechercher" id="buttonRechercher" value="Rechercher">
                </form>
            <div class="clear"></div>
        </div>
    </header>
    <!-- end header -->
