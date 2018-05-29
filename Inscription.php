<?php 

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

$messageErreur = "";

if(isset($_POST['pseudo']) && isset($_POST['mdp']) &&  isset($_POST['validationMdp']) &&  isset($_POST['nom']) &&  isset($_POST['prenom']) && isset($_POST['dateNaissance']) &&  isset($_POST['email']) && isset($_POST['sexe'])){
	// On vérifie que tout les champs sont remplis correctement
	
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	$validationMdp = $_POST['validationMdp'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dateNaissance = $_POST['dateNaissance'];
	$email = $_POST['email'];
	$sexe = $_POST['sexe'];

	if(isset($_POST['pays']) && $_POST['pays'] != ""){
		$pays = $_POST['pays'];
		$paysCorrect = false;
	}

	else{
		$paysCorrect = true;
	}

	if(isset($_POST['avatar']) && $_POST['avatar'] != ""){
		$avatar = $_POST['avatar'];
		$avatarCorrect = false;
	}

	else{
		$avatarCorrect = true;
	}

	$pseudoCorrect = false;
	$mdpCorrect = false;
	$nomCorrect = false;
	$prenomCorrect = false;
	$dateNaissanceCorrecte = false;
	$emailCorrect = false;
	$sexeCorrect = false;

	// Le pseudo contient les caracteres autorises et contient entre 3 et 25 caracteres
	if(preg_match('#^[a-zA-Z0-9._-]+$#', $pseudo) && strlen($pseudo) >= 3 && strlen($pseudo) <= 25){
		$pseudoCorrect = true;
		}
		else
		{
		$messageErreur.="Votre pseudo doit contenir entre 3 et 25 caracteres.<br>";
		}

	// Le mot de passe contient au moins une majuscule, un chiffre, les caracteres autorises et contient entre 7 et 40 caracteres
	if($mdp==$validationMdp){
		if(preg_match('/[A-Z]/', $mdp) && preg_match('/[0-9]/', $mdp) && preg_match('#^[a-zA-Z0-9._-]+$#', $mdp) && (strlen($mdp) >= 7) && (strlen($mdp) <= 40)){
			$mdpCorrect = true;
			}
			else
			{
			$messageErreur.="Votre mot de passe doit contenir entre 7 et 40 caracteres, dont au moins une majuscule et un chiffre.<br>";
			}
			}
	else{
		$messageErreur.="Les mots de passe doivent être identiques.</br>";
	}

	// Le nom contient des caracteres alphabetiques, des - ou des espaces uniquement, il contient entre 1 et 25 cracteres
	if(preg_match('/[a-z]/', $nom) && preg_match('#^[a-zA-Z- ]+$#', $nom) && (strlen($nom) >= 1) && (strlen($nom) <= 25)){
		$nomCorrect = true;
		}
		else
		{
		$messageErreur.="Votre nom doit contenir uniquement des lettres, des espaces ou des '-', et doit contenir entre 1 et 25 caractères.<br>";
		}

	// Le prenom contient des caracteres alphabetiques, des - ou des espaces uniquement, il contient entre 1 et 25 cracteres
	if(preg_match('/[a-z]/', $prenom) && preg_match('#^[a-zA-Z- ]+$#', $prenom) && (strlen($prenom) >= 1) && (strlen($prenom) <= 25)){
		$prenomCorrect = true;
		}
		else
		{
		$messageErreur.="Votre prenom doit contenir uniquement des lettres, des espaces ou des '-', et doit contenir entre 1 et 25 caractères.<br>";
		}

	// la date de naissance doit être du type 'aaaa-mm-jj' et doit etre inferieure a la date d'aujourd'hui moins dix ans 
	$tabDate = explode("-", $dateNaissance);
	if (sizeof($tabDate)==3) {
		if((intval($tabDate[0])<=(intval(date('Y')-10))) && (intval($tabDate[1])<=12) && (intval($tabDate[1])>=01) && (intval($tabDate[2])<=31) && (intval($tabDate[2])>=01)){
				$dateNaissanceCorrecte = true;
				}
				else
				{
					$messageErreur.="Votre date de naissance doit etre sous format jj/mm/aaaa, et vous devez avoir plus de dix ans pour acceder au site.<br>";
				}
		}
		else
		{
		$messageErreur.="Votre date de naissance doit etre sous format jj/mm/aaaa, et vous devez avoir plus de dix ans pour acceder au site.<br>";
		}
	
	// l'Email contient un seul @, 
	if((substr_count($email, '@')==1) && (strlen($email) >= 7) && (strlen($email) <= 100) && preg_match('#^[a-zA-Z0-9._@-]+$#', $email)){
		$emailCorrect = true;
		}
		else
		{
		$messageErreur.="Votre email doit contenir un @ et entre 7 et 100 caractères.<br>";
	}


	// L'individu est soit masculin, soit féminin, soit non binaire
	if(($sexe=='F') xor ($sexe=='M') xor ($sexe=='A')){
		$sexeCorrect = true;
		}
		else
		{
		$messageErreur.="Vous devez choisir soit F (Femme), soit M (homme), soit A (non-binaire).<br>";
	}

	if(isset($pays)){
	// Le pays contient des caracteres alphabetiques, des - ou des espaces uniquement, il contient entre 1 et 50 cracteres
	if(preg_match('/[a-z]/', $pays) && preg_match('#^[a-zA-Z- ]+$#', $pays) && (strlen($pays) >= 1) && (strlen($pays) <= 50)){
		$paysCorrect = true;
		}
		else
		{
		$messageErreur.="Le nom du pays de doit contenir que des lettres, des - ou des espaces.<br>";
	}
	}

	// L'avatar doit avoir une extension .jpeg, .jpg ou .png
	if(isset($avatar)){

		$tabFile = explode(".", $avatar);
		if (sizeof($tabFile)>1) {
			if (($tabFile[sizeof($tabFile)-1] == "jpeg") || ($tabFile[sizeof($tabFile)-1] == "jpg") || ($tabFile[sizeof($tabFile)-1] == "png")) {
				$avatarCorrect=true;
			}
			else{
				$messageErreur.="L'extension du ficher de votre avatar doit etre .jpeg, .jpg ou .png .</br>";
			}
		}
		else{
			$messageErreur.="Votre fichier doit avoir une extension .jpeg, .jpg ou .png .</br>";
		}
	}

	// Si tout les champs ont été correctement remplis
	if ($pseudoCorrect && $mdpCorrect && $nomCorrect && $prenomCorrect && $dateNaissanceCorrecte && $emailCorrect && $sexeCorrect && $paysCorrect && $avatarCorrect) {
			// Si le pseudo et l'email n'ont pas déjà été pris
			$disponnible = true;
			$pseudoIdentique = executeRequete("SELECT * FROM Abonne WHERE pseudo='$pseudo'"); 
			if($pseudoIdentique->num_rows > 0)
			{
				$messageErreur .= "Le pseudo choisi est déjà utilisé.</br>";
				$disponnible = false;
			}
			$emailIdentique = executeRequete("SELECT * FROM Abonne WHERE email='$email'"); 
			if($emailIdentique->num_rows > 0)
			{
				$messageErreur .= "L'email choisie est déjà utilisée.</br>";
				$disponnible = false;
			}
			if($disponnible)
			{
				foreach($_POST as $indice => $valeur)
				{
					$_POST[$indice] = htmlEntities(addSlashes($valeur));
				}
				executeRequete("INSERT INTO Abonne (Pseudo, Nom, Prenom, DateNaissance, Email, Sexe, Password) VALUES ('$pseudo', '$nom', '$prenom', '$dateNaissance', '$email', '$sexe', '$mdp')");
				header("Location:./Connexion.php");
			}
	}

}
else{
	$messageErreur .= "Vous devez remplir tout les champs * obligatoires !<br/>";
}

?>

<form class="formulaire" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
	<input class="inputForm" type="text" name="pseudo" id="pseudo" required="required" placeholder="Pseudo" <?php if(isset($pseudo)){echo "value='".$pseudo."'";} ?>>
	<label for="pseudo" class="labelsForm">Pseudo *</label>
	<div class="clear"></div>

	<input class="inputForm" type="password" name="mdp" id="mdp" required="required">
	<label for="mdp" class="labelsForm">Mot de Passe *</label>
	<div class="clear"></div>

	<input class="inputForm" type="password" name="validationMdp" id="validationMdp" required="required">
	<label for="validationMdp" class="labelsForm">Validation du Mot de Passe *</label>
	<div class="clear"></div>

	<input class="inputForm" type="text" name="nom" id="nom" required="required" placeholder="Nom" <?php if(isset($nom)){echo "value='".$nom."'";} ?>>
	<label for="nom" class="labelsForm">Nom *</label>
	<div class="clear"></div>

	<input class="inputForm" type="text" name="prenom" id="prenom" required="required" placeholder="Prénom" <?php if(isset($prenom)){echo "value='".$prenom."'";} ?>>
	<label for="prenom" class="labelsForm">Prénom *</label>
	<div class="clear"></div>

	<input class="inputForm" type="date" name="dateNaissance" id="dateNaissance" required="required" <?php if(isset($dateNaissance)){echo "value='".$dateNaissance."'";} ?>>
	<label for="dateNaissance" class="labelsForm">Date de Naissance *</label>
	<div class="clear"></div>

	<input class="inputForm" type="email" name="email" id="email" required="required" placeholder="e-mail" <?php if(isset($email)){echo "value='".$email."'";} ?>>
	<label for="email" class="labelsForm">Email *</label>
	<div class="clear"></div>

	<div class="inputForm">
		<input type="radio" name="sexe" id="sexe" value="F" checked="checked" required="required"><span class="radioForm">Femme</span>
		<input type="radio" name="sexe" id="sexe" value="M" required="required"><span class="radioForm">Homme</span>
		<input type="radio" name="sexe" id="sexe" value="A" required="required"><span class="radioForm">Non Binaire</span>
	</div>
	<label for="sexe" class="labelsForm">Sexe *</label>
	<div class="clear"></div>

	<input class="inputForm" type="text" name="pays" id="pays" placeholder="France" <?php if(isset($pays)){echo "value='".$pays."'";} ?>>
	<label for="pays" class="labelsForm">Pays</label>
	<div class="clear"></div>

	<input class="inputForm buttonForm" type="file" name="avatar" id="avatar" value="Choisissez votre Avatar" <?php if(isset($avatar)){echo "value='".$avatar."'";} ?>>
	<label for="avatar" class="labelsForm">Avatar</label>
	<div class="clear"></div>

	<input class="buttonForm" type="submit" name="Entrer">
	<div class="clear"></div>

	<span class="labelsForm"><?php echo $messageErreur; ?></span>

</form>

<?php 
require_once("./inc/footer.inc.php");
?>