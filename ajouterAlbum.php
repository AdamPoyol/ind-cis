<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

if (isset($_POST)) 
{
	$contenu = ""; 

	//echo "Il y a un POST\n\n";
	if(isset($_POST['nomAlbum']) && isset($_POST['auteurAlbum']) && isset($_POST['coverAlbum'])  && isset($_POST['genreAlbum']))
	{
		//echo "Tout a été entré\n\n";

		//Vérification de l'image
		$fichierImage = explode(".", $_POST['coverAlbum']);
		$extension = end($fichierImage);
		if($extension!="jpg" and $extension!="png")
		{
			//echo "L'extension image est pas bonne";
			$contenu.= "Le fichier de l'image doit être un .jpg ou un .png .\n";
		}

		if($contenu == "")
		{
			    $nom = $_POST['nomAlbum'];
			    $auteur = $_POST['auteurAlbum'];
			    $genre = $_POST['genreAlbum'];
			    $cover = $_POST['coverAlbum'];
		
			$req = executeRequete("INSERT INTO Album (Nom, IDAuteur, genre, cover) VALUES ($nom, $auteur, $genre, $cover)");
				

			$contenu.="La musique a été ajoutée avec succès ! \n";
		}
		
	}
	else
	{
		//echo "Il manque au moins un champ";
		$contenu.="Vous devez renseigner tout les champs ! \n";
	}

}

?>

	<h1 style="text-align: center;margin-top: 7%;color: #5E5E5E;">
		Ajouter un Album
	</h1>

	<form class="formulaire" method="post" action="<?php echo$_SERVER["PHP_SELF"];?>">

		<input class="inputForm" type="text" name="nomAlbum" id="nomAlbum" placeholder="ex : Evolve">
		<label class="labelsForm">Nom Album *</label>
		<div class="clear"></div>

		<select class="inputForm" name="auteurAlbum" id="auteurAlbum">
			<?php 
			$toutNomsAuteur = executeRequete('SELECT IDAuteur, Nom FROM Auteur'); 
			if($toutNomsAuteur->num_rows <= 0){
				echo "Vous devez ajouter au moins un auteur au site";
			}
			else{
				while ($donnees = mysql_fetch_assoc($toutNomsAuteur))
				{
					echo "<option>";
					echo "coucou";
					echo $donnees['IDAuteur']." : ".$donnees['Nom'];
					echo "</option>";
				}
			}?>
		</select>
		<label class="labelsForm" for="auteurAlbum">Auteur *</label>
		<div class="clear"></div>

		<input class="inputForm" type="text" name="genreAlbum" id="genreAlbum" placeholder="ex : Evolve">
		<label class="labelsForm">Genre Musique</label>
		<div class="clear"></div>

		<input class="inputForm" type="file" name="coverAlbum" id="coverAlbum">
		<label class="labelsForm">Image Musique</label>
		<div class="clear"></div>

		<a class="buttonForm" href="./ajouterMusique">Ajouter une Musique</a>
		<a class="buttonForm" href="./ajouterAuteur">Ajouter un Auteur</a>
		<div class="clear"></div>

		<input class="buttonForm" type="submit" value="Valider" id="ajouterAlbum">

		<?php
			echo $contenu;
		?>
	</form>

	
<?php
require_once("./inc/footer.inc.html");
?>