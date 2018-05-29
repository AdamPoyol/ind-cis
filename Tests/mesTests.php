<?php

session_start();

var_dump($_SESSION);

if (isset($_GET['laDate'])) {
	var_dump($_FILE['laDate']);
}

if (isset($_GET['leFichier'])) {
	var_dump($_FILE['leFichier']);
}

$var = 'Coucou22';
echo $var;
var_dump(preg_match('/[A-Z]/', $var));
var_dump(preg_match('/[0-9]/', $var));
var_dump(preg_match('/[a-z]/', $var));
if(preg_match('/[A-Z]/', $var) && preg_match('/[0-9]/', $var) && preg_match('#^[a-zA-Z0-9._-]+$#', $var)){
	echo "C'est bon";
}

$var2 = 'Marie- Laure';
if (preg_match('#^[a-zA-Z- ]+$#', $var2)) {
	echo "Cc Marraine !";
}

if(isset($_GET['Valider'])=='OuvrirSession'){
	echo "string";
	$_SESSION['IDAbonne']=01;
	header("Location:./MesTests2.php");
}
if(isset($_GET['Valider'])=='Rien'){
	header("Location:./MesTests2.php");
}

?>

<form action="#" method="get">
	<label>La date</label>
	<input type="date" name="laDate" id="laDate">
	<label>fichier</label>
	<input type="file" name="leFichier" id="leFichier">
	<input type="submit" name="Valider" id="Valider">
</form>

<form action="#" method="get">
	
	<input type="submit" name="Valider" id="Valider" value="OuvrirSession">
	<input type="submit" name="Valider" id="Valider" value="Rien">
</form>