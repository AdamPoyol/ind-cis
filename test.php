<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=indecie;charset=utf8', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$reponse = $bdd->query('SELECT * FROM musiques');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="testcss.css">
</head>
<body>
	<p id="Test">On test<p>
	<div id='lecteur'><audio controls controlsList='nodownload'><source src='' type='audio/mp3' id='Audio' /></audio></div>

<?php
while ($donnees = $reponse->fetch())
{?>
	
	<div class='chanson' onclick=Alecoute(<?php echo "'".$donnees['audio']."')"?>><?php
	echo "<img  class='imageCover' src='".$donnees['cover']."'></p>";
	//echo "<p>".$donnees['CodeChanson']."</p>";
	echo "<p>".$donnees['titre']."</p>";
	echo "<p>".$donnees['chanteur']."</p>";
	echo "<p>".$donnees['album']."</p>";
	//echo "<p>".$donnees['genre']."</p>";
		
	/*echo "<audio controls controlsList='nodownload'><source src='".$donnees['audio']."' type='audio/mp3'/> </audio>";*/
	echo "</div>";
}


/*putenv("TOTO=$toto");
$test=getenv($toto);
echo $toto;
echo $test;
$retest=$_SERVER['TOTO'];
echo $retest;

$reponse->closeCursor();

 ""*/

?>

<script type="text/javascript">
	function Alecoute(audio) {	
		document.getElementById("lecteur").innerHTML = "<audio controls controlsList='nodownload'><source src='"+audio+"' type='audio/mp3' id='Audio' /></audio>";
		
	}
</script>
</body>
</html>
