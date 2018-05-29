<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

?>

<?php


if (isset($_GET['recherche'])) {
	if($_GET['recherche'] != ""){
		$recherche = $_GET['recherche'];
		echo "<h1>Résultat de la recherche pour : ".$recherche."</h1>";
		echo "<h2>Titres : </h2>";
		$resultatTitre = executeRequete('SELECT m.IDMusique AS ID, m.Titre AS Titre, au.Nom AS Auteur, al.Nom AS Album FROM Musique m, Auteur au, Album al WHERE m.Titre LIKE "%'.$recherche.'%" AND m.IDAlbum = al.IDAlbum AND al.IDAuteur=au.IDAuteur');
		if($resultatTitre->num_rows <= 0){
			echo "Nous n'avons trouvé aucun titre correspondant à votre recherche.";
		}
		else{
			while ($donnees = $resultatTitre->fetch_assoc())
			{
				echo "<div class='Musique'>";
				echo "<span> ".$donnees['ID']." </span>";
				echo "<span> ".$donnees['Titre']." </span>";
				echo "<span> ".$donnees['Auteur']." </span>";
				echo "<span> ".$donnees['Album']." </span>";
				echo "</div>";
			}
		}

		echo "<h2>Albums : </h2>";
		$resultatAlbum = executeRequete('SELECT al.Nom AS Album, al.cover AS Cover, au.Nom AS Auteur FROM Album al, Auteur au WHERE au.IDAuteur = al.IDAuteur AND al.Nom LIKE "%'.$recherche.'%"');
		if($resultatAlbum->num_rows <= 0){
			echo "Nous n'avons trouvé aucun album correspondant à votre recherche.";
		}
		else{
			while ($donnees = $resultatAlbum->fetch_assoc())
			{
				echo '<div class="song" style="border: solid 3px black; border-radius: 2em; width: 15em;height: 15em; float:left; margin : 3em">
            <br><img src="'.$donnees['Cover'].'" style="width: 50%;margin-left: 26%; border-radius: 6em">
            <br><br><label style="color: white; margin-left: 12% ;text-align: center">'.$donnees['Album'].'<br>by '.$donnees['Auteur'].'</label><br>
        </div>';
			}
		echo '<div class="clear"></div>';
		}


		echo "<h2>Auteurs : </h2>";
		$resultatAuteur = executeRequete('SELECT IDAuteur AS ID, ImageAuteur AS Image, Nom FROM Auteur WHERE Nom LIKE "%'.$recherche.'%"');
		if($resultatAuteur->num_rows <= 0){
			echo "Nous n'avons trouvé aucun auteur correspondant à votre recherche.";
		}
		else{
			while ($donnees = $resultatAuteur->fetch_assoc())
			{
				echo '<div class="song" style="border: solid 3px black; border-radius: 2em; width: 15em;height: 15em; float:left; margin : 3em">
            <br><img src="'.$donnees['Image'].'" alt="guetta" style="width: 50%;margin-left: 26%; border-radius: 6em">
            <br><br><label style="color: white; margin-left: 12% ;text-align: center">'.$donnees['Nom'].'</label><br>
        </div>';
			}
		echo '<div class="clear"></div>';
		}

	}
	else
	{
		echo "Vous devez entrer une recherche valide.";
	}
}
else
	{
		echo "Vous devez entrer une recherche.";
	}

?>

<?php
require_once("./inc/footer.inc.html");
?>