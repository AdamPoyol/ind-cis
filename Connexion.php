<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

$messageErreur ="";


if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    if($_POST['pseudo'] != "" && $_POST['pseudo']!=""){
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['password'];
        $abonne = executeRequete('SELECT * FROM Abonne WHERE pseudo="'.$pseudo.'" AND password="'.$mdp.'"'); 

        if ($abonne->num_rows != 1) {
            $messageErreur = "Le pseudo ou le mot de passe n'est pas correct";
        }
        else{
            echo 'ca marche';
            $utilisateur = $abonne->fetch_assoc();
            $_SESSION['IDAbonne']=$abonne;
            header('Location:./Accueil.php');
        }
    }
    else{
    $messageErreur="Vous devez remplir tout les champs";
    }
}
else{
    $messageErreur="Vous devez remplir tout les champs";
}

?>

    <h1 style="text-align: center;margin-top: 7%;color: #5E5E5E;">
        <b>Formulaire de connexion</b>
    </h1>

    <form class="formulaire" method="post" style="margin-top: 6.5%; margin-bottom: 10%">

        <input class="inputForm" type="text" name="pseudo" id="pseudo" style="color: #5E5E5E">
        <label class="labelsForm">Pseudo / Adresse e-mail</label>
        <div class="clear"></div>

        <input class="inputForm" type="password" name="password" id="password" style="color: #5E5E5E">
        <label class="labelsForm">Mot de passe</label>
        <div class="clear"></div>

        <input class="buttonForm" type="submit" name="Entrer">
        <div class="clear"></div>

        <?php echo $messageErreur; ?>

    </form>
    
<?php
require_once("./inc/footer.inc.html");
?>