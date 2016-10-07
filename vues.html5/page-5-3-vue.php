<?php

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8">
<title>TP 5.3 / Validation de formulaire en PHP</title>
<link rel="stylesheet"href="page-5-3.css" type="text/css">
<script language="javascript"type="text/javascript" src="page-5-3.js"></script>
	
	<script>
		window.onload = initialisations;

		function initialisations() {
			document.getElementById("caseAfficherMdp").onchange = afficherMdp;
			document.getElementById("txtNouveauMdp").focus();

			<?php if ($typeMessage == 'avertissement') {?>
				afficher_avertissement("<?php echo $message; ?>");
			<?php } ?>

			}

		function afficherMdp()
		{ 	if (document.getElementById("caseAfficherMdp").checked == true)
			{ 
				document.getElementById("txtNouveauMdp").type="text";
				document.getElementById("txtConfirmation").type="text";			
			}
		else
			{
				document.getElementById("txtNouveauMdp").type="password";
				document.getElementById("txtConfirmation").type="password";			
			}
		}
		
		function validationGenerale() {
			if (document.getElementById("txtNouveauMdp").value =="") {
				afficher_avertissement("Le nouveau mot de passe doit être obligatoirement saisi !");
				document.getElementById("txtNouveauMdp").focus();
				return false;
			}
			if (document.getElementById("txtConfirmation").value =="") {
				afficher_avertissement("La confirmation du nouveau mot de passe doit être obligatoirement saisie !");
				document.getElementById("txtConfirmation").focus();
				return false;
			}
			
			if ( estUnMdpCorrect(document.getElementById("txtNouveauMdp").value)==false){
				afficher_avertissement("Le mot de passe doit comporter au moins 8 caractères, dont au moins une lettre minuscule et un chiffre !");
				document.getElementById("txtNouveauMdp").focus();
				return false;
			}
			
			if (document.getElementById("txtNouveauMdp").value!= document.getElementById("txtConfirmation").value) {
				afficher_avertissement("Les 2 valeurs saisies sont différentes !");
				document.getElementById("txtNouveauMdp").focus();
				return false;
			}
			
			return true;
		}
	
		function estUnMdpCorrect(leMdpAtester) {
			EXPRESSION = "^.+$";
			
			monExprRegul = new RegExp(EXPRESSION);
			
			if ( monExprRegul.test (leMdpAtester) == true && leMdpAtester.length >= 8 ) return true;
			else return false;
		}	

	</script>
</head>

<body>
	<div id="page">
		<h3>Modifier mon mot de passe</h3>
		<p><i>(8 caractères minimum avec au moins un chiffre,une lettre minuscule et une lettre majuscule)</i></p>
		<form id="formModificationMdp" name="formModificationMdp" method="post" action="#">
			<p>
				<label for="txtNouveauMdp">Nouveau mot de passe* :</label>
				<input type="<?php if ($afficherMdp == 'off') echo 'password'; else echo 'text'; ?>" 
							id="txtNouveauMdp" name="txtNouveauMdp" required pattern="^.{8;}$"
								value="<?php echo $nouveauMdp; ?>">
			</p>
			<p>
				<label for="txtConfirmation">Confirmation* :</label>
				<input type="<?php if ($afficherMdp == 'off') echo 'password'; else echo 'text'; ?>" 
							id="txtConfirmation" name="txtConfirmation" required pattern="^.{8;}$"
								value="<?php echo $nouveauMdp; ?>">
			</p>
			<p>
				<label for="caseAfficherMdp">Afficher en clair :</label>
				<input type="checkbox" name="caseAfficherMdp" id="caseAfficherMdp" <?php if ($afficherMdp =='on') echo 'checked';?>>
			</p>
			<p>
				<input type="submit" id="btnEnvoyer" name="btnEnvoyer" value="Envoyer"/>
			
		</form>
	</div>
	
	<aside id="affichage_message" class="classe_message">
		<div>
			<h2 id="titre_message" class="classe_information">Message</h2>
			<p id="texte_message" class="classe_texte_message">Voici le texte du message</p>
			<a href="#close" title="Fermer">Fermer</a>
		</div>
	</aside>		
</body>
</html>

			