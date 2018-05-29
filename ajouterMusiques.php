<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

if (isset($_POST)) 
{
	$contenu = ""; 

	//echo "Il y a un POST\n\n";
	if(isset($_POST['titreMusique']) && isset($_POST['albumMusique']) && isset($_POST['audioMusique']))
	{
		//echo "Tout a été entré\n\n";

		// Vérification du .mp3

		$fichierAudio = explode(".", $_POST['audioMusique']);
		$extension = $fichierAudio[sizeof($fichierAudio)-1];
		if($extension!="mp3")
		{
			//echo "L'extension audio est pas bonne";
			$contenu.= "Le fichier de l'audio doit être un .mp3 .\n";
		}

		if($contenu == "")
		{
			    
			    $titre = $_POST['titreMusique'];
			    $album = executeRequete("SELECT IDAlbum FROM Album WHERE Nom=".$_POST['Album']);
			    $audio = $_POST['audioMusique'];


				$req = executeRequete("INSERT INTO musiques (Titre, IDAlbum, LienAudio) VALUES ($titre, $album, $audio)");
				

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
		Ajouter une Musique
	</h1>

	<form class="formulaire" method="post" action="<?php echo$_SERVER["PHP_SELF"];?>">

		<input class="inputForm" type="text" name="titreMusique" id="titreMusique" placeholder="ex : Beliver">
		<label class="labelsForm">Titre Musique *</label>
		<div class="clear"></div>

		<!--<input class="inputForm" type="text" name="albumMusique" id="albumMusique" placeholder="ex : Evolve">-->
		<select class="inputForm" name="albumMusique" id="albumMusique">
			<?php 
			$toutNomsAlbum = executeRequete('SELECT IDAlbum, Nom FROM Album'); 
			if($toutNomsAlbum->num_rows <= 0){
				echo "Vous devez créer au moins un album";
			}
			else{
				while ($donnees = $toutNomsAlbum->fetch_assoc())
				{
					echo "<option>";
					echo $donnees['IDAlbum']." : ".$donnees['Nom'];
					echo "</option>";
				}
			}?>
		</select>
		<label class="labelsForm" for="albumMusique">Album Musique</label>
		<div class="clear"></div>

		<input class="inputForm" type="file" name="audioMusique" id="audioMusique">
		<label class="labelsForm">Audio Musique *</label>
		<div class="clear"></div>

		<a class="buttonForm" href="./ajouterMusique">Ajouter une Musique</a>
		<a class="buttonForm" href="./ajouterAuteur">Ajouter un Auteur</a>
		<div class="clear"></div>

		<input class="buttonForm" type="submit" value="Valider" id="ajouterMusique">

		<?php
			echo $contenu;
		?>
	</form>

	
<?php
require_once("./inc/footer.inc.html");
?>