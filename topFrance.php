<?php

    require_once("./inc/init.inc.php");
    require_once("./inc/header.inc.php");
    require_once("./inc/fonction.inc.php");

	$topfrance = executeRequete('SELECT al.cover AS Cover, au.Nom AS Auteur, m.Titre AS Titre, m.LienAudio AS Audio FROM musique m, auteur au, album al WHERE m.IDAlbum=al.IDAlbum AND al.IDAuteur=au.IDAuteur AND au.pays="France" ORDER BY m.NombreEcoute DESC');
	$topmonde = executeRequete('SELECT al.cover AS Cover, au.Nom AS Auteur, m.Titre AS Titre, m.LienAudio AS Audio  FROM Musique m, Auteur au, Album al 
	WHERE m.IDAlbum=al.IDAlbum AND al.IDAuteur=au.IDAuteur ORDER BY m.NombreEcoute DESC;');
	
?>

<div id='lecteur'><audio controls controlsList='nodownload'><source src='' type='audio/mp3' id='Audio' /></audio></div>
<h1 style="text-align: center;margin-top: 7%;color: #5E5E5E;">
        <b>Top France</b>
    </h1>
<?php 

	while ($donnees = $topfrance->fetch_assoc())
	{
		echo '<div  onclick=Alecoute("'.$donnees['Audio'].'") class="song" style="cursor: pointer; background: #5e5e5e ; border: solid 3px #ff7a00; border-radius: 2em; width: 15em;height: 15em; float:left; margin : 3em">
            <br><img src="'.$donnees['Cover'].'" alt="guetta" style="width: 50%;margin-left: 26%; border-radius: 6em">
            <br><br><label style="color: black; margin-left: 12% ;text-align: center">'.$donnees['Titre'].'</label><br>
        	</div>';
	}
	echo "<div class='clear'></div>";
?>
	<h1 style="text-align: center;margin-top: 7%;color: #5E5E5E;">
        <b>Top Monde</b>
    </h1>
<?php 

	while ($resultatmonde = $topmonde->fetch_assoc())
	{
		echo '<div  onclick=Alecoute("'.$resultatmonde['Audio'].'") class="song" style="cursor: pointer; background: #5e5e5e ; border: solid 3px #ff7a00; border-radius: 2em; width: 15em;height: 15em; float:left; margin : 3em">
            <br><img src="'.$resultatmonde['Cover'].'" alt="guetta" style="width: 50%;margin-left: 26%; border-radius: 6em">
            <br><br><label style="color: black; margin-left: 12% ;text-align: center">'.$resultatmonde['Titre'].'</label><br>
        	</div>';
	}
	echo "<div class='clear'></div>";
?>
<script type="text/javascript">
	function Alecoute(audio) {	
		document.getElementById("lecteur").innerHTML = "<audio controls controlsList='nodownload'><source src='./Audio/"+audio+"' type='audio/mp3' id='Audio' /></audio>";
		
	}
</script>

<?php
require_once("./inc/footer.inc.php");
?>