<?php 
  include '../fichier_inc/header.inc.php';
?>
<br><br>

<!--/////////////////////////////////////////CONNEXION////////////////////////////////////// -->
  <div class="DivCon_Insc">
    <div class="divTitreDiv"><p class="titreDiv">Connexion</p></div>

    <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
      <table class="tableauFormulaire">
        <tr><!-- /////PSEUDO///// -->
          <td><label for="nom" class="label">Pseudo:</label></td>
          <td><input type="text" name="pseudoConn" placeholder="Pseudo" /></td>

          <td><label for="mdp">Mot de passe: </label></td><!-- /////MOT DE PASSE///// -->
          <td><input type="password" id="mdp" name="mdpConn" placeholder="Mot de passe" /></td>

          <td><input class="btnCouleur" type="submit" name="valider" value="Valider"></td>
        </tr>

      </table>
    </form>
    <br>
  </div>

  <?php 
    if (isset($_POST['valider'])) {
      if (isset($_POST['pseudoConn']) && isset($_POST['mdpConn']) && $_POST['pseudoConn']!== '' && $_POST['mdpConn']!== '') {
       
        $rechercheLogMdp = $pdo -> query('SELECT CliPseudo, CliMdp FROM client ');
        while ($donnees = $rechercheLogMdp -> fetch()) {
          if ($_POST['pseudoConn'] == $donnees['CliPseudo']) {
            $cryptMdpConn= $_POST['mdpConn'];
            $cryptSalt = 'Jetestlesaltdesfonctionscrypt';
            $mdpCryptéConn= crypt($cryptMdpConn, $cryptSalt);
            if ($mdpCryptéConn == $donnees['CliMdp']) {
              echo "<p class='confirmation'>Test: Vous êtes connectés !</p>";
              session_start();
              $_SESSION['Login']= $_POST['pseudoConn'];
              header("Location:../index.php");
              break;
            }
            else {echo "<p class='erreur'>Mauvais mot de passe pour ".$_POST['pseudoConn']."</p>"; }
          }
        }
      }
      else {
        echo "<p class='erreur'>Veuillez remplir tous les formulaires.</p>";
      }
    }

  ?>
<!--////////////////////////////////////////////////////////////////////////////////////////// -->


<!--/////////////////////////////////////////INSCRIPTION////////////////////////////////////// -->
<div class="DivCon_Insc">
  <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?> id="formInscription">
    <div class="divTitreDiv"> <p class="titreDiv">Pas encore inscrit ? Rejoignez-nous!</p></div>

    <table class="tableauFormulaire">
      <tr>
        <td><label for="nom" class="label">Nom*:</label></td><!-- /////NOM///// -->
        <td><input type="text" id="nom" name="nom" placeholder="Nom" value=<?php if (isset($_POST['nom'])) { echo "'".$_POST['nom']."'";
      }?>></td>

        <td rowspan="4" class="tabEspaceInscri"><!-- /////ADRESSE///// -->
          <label for="ville" class="label">Ville* :</label>
          <br>
          <label for="codePostal" class="label">Code postal* :</label>
          <br>
          <label for="rue" class="label">Nom de la rue* :</label>
          <br>
          <label for="rueNum" class="label">Numéro de la rue* :</label>
          <br>
          <label for="complementAdresse" class="label">Complément d'adresse:</label>
        </td>
        <td rowspan="4">
          <input type="text" name="ville" placeholder="Ville" value=<?php if (isset($_POST['ville'])) { echo "'".$_POST["ville"]."'";
      }?>>
          <br>
          <input type="text" name="codePostal" placeholder="Code postal" value=<?php if (isset($_POST['codePostal'])) { echo "'".$_POST["codePostal"]."'";
      }?>>
          <br>
          <input type="text" name="rue" placeholder="Nom rue" value=<?php if (isset($_POST['rue'])) { echo "'".addslashes($_POST["rue"])."'";
      }?>>
          <br>
          <input type="text" name="rueNum" placeholder="Numéro rue" value=<?php if (isset($_POST['rueNum'])) { echo "'".$_POST['rueNum']."'";
      }?>>
          <br>
          <textarea class='textareaIns' name="cplmAdresse" form="formInscription" placeholder="Complément d'adresse"></textarea>
        </td>
      </tr>

      <tr><!-- /////PRENOM///// -->
        <td><label for="prenom" class="label">Prénom*:</label></td>
        <td> <input type="text" id="prenom" name="prenom" placeholder="Prénom" value=<?php if (isset($_POST["prenom"])) { echo "'".addslashes($_POST["prenom"])."'";
      }?>></td>
      </tr>

      <tr> <!-- /////DATE DE NAISSANCE///// -->
        <td><label for="dateNaissance" class="label">Date de naissance* : </label></td>
        <td><input type="date" id="dateNaissance" name="dateNaissance" value=<?php if (isset($_POST["dateNaissance"])) { echo "'".$_POST["dateNaissance"]."'";
      }?>/></td>
      </tr>

      <tr><!-- /////SEXE///// -->
        <td><label for="sexe" class="label">Sexe*:</label></td>
        <td><input id="Homme" type="radio" name="sexe" value="H" checked/>Homme
            <input id="Femme" type="radio" name="sexe" value="F"/>Femme
        </td>
      </tr>

      <tr>
        <td><label for="pseudoconn" class="label">Pseudo*:</label></td><!-- /////PSEUDO///// -->
        <td><input type="text" id="pseudoinscr" name="pseudoinscr" placeholder="Pseudo" value=<?php if (isset($_POST["pseudoinscr"])) { echo "'".addslashes($_POST["pseudoinscr"])."'";
      }?>></td>

        <td class="tabEspaceInscri"><label for="email" class="label">Adresse mail*:</label></td><!-- /////ADRESSE MAIL///// -->
        <td><input type="email" id="email" name="email" placeholder="Pikabook@gmail.com" value=<?php if (isset($_POST["email"])) { echo "'".$_POST["email"]."'";
      }?>></td>
      </tr>

      <tr> <!-- /////MOT DE PASSE///// -->
        <td><label for="mdp" class="label">Mot de passe*:</label></td>
        <td><input type="password" id="mdpinscr" name="mdpinscr" placeholder="Mot de passe"/></td>

        <td class="tabEspaceInscri"><label for="confirmdp" class="label">Confirmation mot de passe*:</label></td><!-- /////CONFIRMATION MOT DE PASSE///// -->
        <td><input type="password" id="confirmdp" name="confirmdp" placeholder="Confirmer mot de passe" /></td>
      </tr>

    </table>

    <br>
    <p class="btnAlign"><input class="btnCouleur" type="submit" name="inscrire" value="S'inscrire"></p>
    <p class="note"> *Champs obligatoires </p>
    <p class="note italique"> Note: Votre mot de passe doit contenir exactemement 7 caractères avec une majuscule, un chiffre et un caractère spécial.</p>

  </form>
  <br>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
  if (isset($_POST['inscrire'])){ /*s'active uniquement quand tu appuies sur le bouton s'inscrire*/        
    if (isset($_POST['nom']) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["pseudoinscr"]) && isset($_POST["mdpinscr"]) && isset($_POST["confirmdp"]) && $_POST['nom']!== '' && $_POST['prenom']!== '' && $_POST['email']!== '' && $_POST['pseudoinscr']!== '' && $_POST['mdpinscr']!== '' && $_POST['confirmdp']!== '' && $_POST['dateNaissance']!== '' && isset($_POST['ville']) && $_POST['ville']!== '' && isset($_POST['codePostal']) && $_POST['codePostal']!== '' && isset($_POST['rue']) && $_POST['rue']!== '' && isset($_POST['rueNum']) && $_POST['rueNum']!== '') /* on vérifie que tous les critères sont remplis*/{

      if (preg_match("#^[A-Za-z]+#", $_POST['nom']) && preg_match("#^[A-Za-z]+#", $_POST['prenom']) && preg_match("#^[A-Za-z]+#", $_POST['ville']) && preg_match("#^[0-9]+#", $_POST['codePostal']) && preg_match("#^[0-9]#", $_POST['rueNum'])) {/*VERIFICATION DES DONNEES SAISIES (dans l'ordre: Le nom, le prenom, la ville ne contiennent que des lettres / le code postal et le numéro de la rue que des chiffres*/

        $dateAuj= date("Y-m-d");
        $dateUti = $_POST['dateNaissance'];
        $diffDate= $dateAuj - $dateUti;

        if ($diffDate>17 && preg_match("#^[1|2][0|9][0-9]{2}-([0][1-9]|[1][0-2])-([0][0-9]|[1-2][0-9]|[3][0-1])#", $_POST['dateNaissance'])) {/*VERIFICATION DATE (dans l'ordre l'utilisateur doit être majeur et la date ne doit pas être supérieure à celle d'aujourd'hui*/
          $longueurMdp= strlen($_POST['mdpinscr']);

          if ($_POST['mdpinscr'] === $_POST['confirmdp'] && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#',$_POST['mdpinscr']) && $longueurMdp==7) {/* VERIFICATION DES MOTS DE PASSE (dans l'ordre: Si les deux mdp rentrés sont identiques / S'il y a la présence de chiffre, majuscule et caractère spécial / la longueur du mdp = à 7*/
            /*VERIFICATION DE LA DISPONIBILITE D'UN PSEUDO*/
            $rechercheLogo = $pdo -> query('SELECT CliPseudo FROM client ');
            $verifPseudo=true;/*Par défaut le pseudo est disponible...*/
            while ($donneesLog = $rechercheLogo -> fetch()) {
              if ($_POST['pseudoinscr'] == $donneesLog['CliPseudo']) {
              $verifPseudo = false;/*...mais devient faux lorsque durant le parcours de la BDD il rencontre un pseudo similaire*/
              }
            }
            if ($verifPseudo== false) {/*Provoque une erreur*/ 
            echo "<p class='erreur'>Ce pseudo est déjà pris par un autre utilisateur !</p>";
            }
           else {/*Inscrit l'utilisateur*/
            $nomCli = ucwords($_POST['nom']);
            $prenomCli = ucwords ($_POST['prenom']);
             $villeCli = ucwords ($_POST['ville']);

             $cryptMdpIns= addslashes(utf8_decode($_POST['mdpinscr']));
             $cryptSalt = 'Jetestlesaltdesfonctionscrypt';
             $mdpCrypté= crypt($cryptMdpIns, $cryptSalt);

             $nouveauClient= $pdo -> exec("INSERT INTO client (CliNom, CliPrenom, CliSex, CliMail, CliPseudo, CliMdp, CliBirthDate) VALUES ('".addslashes(utf8_decode($nomCli))."', '".addslashes(utf8_decode($prenomCli))."', '".$_POST['sexe']."', '".$_POST['email']."', '".addslashes(utf8_decode($_POST['pseudoinscr']))."', '".$mdpCrypté."', '".$_POST['dateNaissance']."')");

             $dernierID = $pdo -> lastInsertId();
             $nouveauClientAdr = $pdo -> exec("INSERT INTO adresse(AdrVille, AdrPostal, AdrRue, AdrRueNum, AdrComplement, CliID) VALUES ('".addslashes(utf8_decode($villeCli))."', '".$_POST['codePostal']."', '".addslashes(utf8_decode($_POST['rue']))."', '".$_POST['rueNum']."', '".addslashes(utf8_decode($_POST['cplmAdresse']))."' , '".$dernierID."')");
             echo "<div class='confirmation'><p>Bienvenue chez Pikabook! Connectez-vous dès maintenant avec votre login et mot de passe ! </p></div>";
              
            }
          }
            
          else { /* SI LES MOTS DE PASSE NE SONT PAS IDENTIQUES ET NE RESPECTENT PAS LES CONDITIONS*/
            echo "<div class='erreur'><p>Erreur avec les mots de passe. Vérifiez qu'ils soient identiques et respectent les conditions.</p></div>";
          }  
        }  

        else{ /* SI L'UTILISATEUR EST MINEUR*/
          echo "<p class='erreur'> La date n'est pas conforme. Vérifiez les données saisies. Pour rappel: Vous devez être agé d'au moins 18 ans pour vous inscrire.</p>";
        } 
      }  
      else {/* SI L'UTILISATEUR N'A PAS RESPECTE LES FORMULAIRES*/
        echo "<p class='erreur'>Une erreur est survenue. Veuillez vérifier les données rentrées.</p>";
      }            
    } 
    else {/* SI LES FORMULAIRES NE SONT PAS TOUS REMPLIES (formulaire de copmlément d'adresse n'est pas obligatoire*/
      echo "<p class='erreur'>Veuillez remplir tous les formulaires</p>";
    }      
  }
?>

<?php include '../fichier_inc/footer.inc.php'; ?>
