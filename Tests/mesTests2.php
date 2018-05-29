<?php

session_start();

var_dump(isset($_SESSION['IDAbonne']));
var_dump($_SESSION);

if(isset($_SESSION['IDAbonne'])){
	echo "Bienvenue ".$_SESSION['IDAbonne'];
}
/*else{
	header('Location:./MesTests.php');
}*/

?>