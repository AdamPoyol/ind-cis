<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

if (isset($_POST)) 
{
	$contenu = ""; 

	//echo "Il y a un POST\n\n";
	if(isset($_POST['nomAuteur']) && isset($_POST['paysAuteur']))
	{
		//echo "Tout a été entré\n\n";

		if($contenu == "")
		{
			    $nom = $_POST['nomAuteur'];
			    $pays = $_POST['paysAuteur'];

			    var_dump($nom);
			    var_dump($pays);

		$req = executeRequete("INSERT INTO Auteur (Nom, pays) VALUES ('".$nom."', '".$pays."')");
			

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
		Ajouter un Auteur
	</h1>

	<form class="formulaire" method="post" action="<?php echo$_SERVER["PHP_SELF"];?>">

		<input class="inputForm" type="text" name="nomAuteur" id="nomAuteur" placeholder="ex : Imagine Dragon">
		<label class="labelsForm">Nom Auteur *</label>
		<div class="clear"></div>

		<input class="inputForm" type="text" name="paysAuteur" id="paysAuteur" placeholder="ex : France">
		<label class="labelsForm">Pays</label>
		<div class="clear"></div>

		<a class="buttonForm" href="./ajouterMusique">Ajouter une Musique</a>
		<a class="buttonForm" href="./ajouterAlbum">Ajouter un Album</a>
		<div class="clear"></div>

		<input class="buttonForm" type="submit" value="Valider" id="ajouterAuteur">

		<?php
			echo $contenu;
		?>
	</form>

	

<?php
require_once("./inc/footer.inc.html");
?>