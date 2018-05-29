<?php $mysqli= new mysqli("localhost", "root", "root", "Indeciebis");
	if($mysqli->connect_error) die("Un problème est survenu lors de la tentative de connexion à la Base de donnée : ".$mysqli->connect_error);
	if(!$mysqli->set_charset('utf8')) die("Erreur lors du chargement de l'encodage utf8 : ".$mysqli->error);

	// SESSION
	session_start();

	//CHEMIN
	define("RACINE_SITE", "/site/");

?>