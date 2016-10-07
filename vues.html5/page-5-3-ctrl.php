<?php
// traiter la demande de changement de mot de passe
// écrit le 07/10/2016 par Bienvenu Erwann

if (! isset($_POST ["txtNouveauMdp"]) && !isset ($_POST["txtConfirmation"])){
	$nouveauMdp = '';
	$confirmationMdp = '';
	$afficherMdp= 'off';
	$message= '';
	$typeMessage = '';
	include_once ('page-5-3-vue.php');
}
else {
	if (empty ($_POST ["txtNouveauMdp"]) == true ) $nouveauMdp = "";else $nouveauMdp = $_POST["txtNouveauMdp"];
	if (empty ($_POST ["txtConfirmation"]) == true ) $confirmationMdp = "";else $confirmationMdp = $_POST["txtConfirmation"];
	if (empty ($_POST ["caseAfficherMdp"]) == true ) $afficherMdp = "";else $afficherMdp = $_POST["caseAfficherMdp"];

	if ($nouveauMdp != $confirmationMdp)
	{
		
		$message = "Le nouveau mot de passe et sa confirmation sont différents !";
		$typeMessage = 'avertissement';
		include_once ('page-5-3-vue.php');
	}
	else if (strlen($nouveauMdp) < 8) 
		{
			$message = "Le mot de passe doit faire au moins 8 caractères!";
			$typeMessage = 'avertissement';
			include_once ('page-5-3-vue.php');
		}
		else if(preg_match('/[A-Z]/', $nouveauMdp) == false)
			{
				$message = "Le mot de passe doit contenir au moins une majuscule !";
				$typeMessage = 'avertissement';
				include_once ('page-5-3-vue.php');
			}
			else if(preg_match('/[a-z]/', $nouveauMdp) == false)
				{
					$message = "Le mot de passe doit contenir au moins une minuscule !";
					$typeMessage = 'avertissement';
					include_once ('page-5-3-vue.php');
				}
				else if(preg_match('/[1-9]/', $nouveauMdp) == false)
					{
						$message = "Le mot de passe doit contenir au moins un chiffre !";
						$typeMessage = 'avertissement';
						include_once ('page-5-3-vue.php');
					}
	
					$sujet = "Modification de votre mot de passe";
					$message = "Votre mot de passe a été modifié \n\n";
					$message .= "Votre nouveau mot de passe est :".$nouveauMdp;
					$adresseEmetteur="delasalle.sio.eleves@gmail.com";
					
					$adresseDestinataire = "delasalle.sio.causer.a@gmail.com";
					
					if (preg_match ("#^.+@gmail\.com$#",$adresseDestinataire) == true)
					{
						$adresseDestinataire = str_replace(".","",$adresseDestinataire);
						$adresseDestinataire = str_replace("@gmailcom","@gmail.com",$adresseDestinataire);	
					}
					$ok = mail($adresseDestinataire, $sujet, $message, "From:".$adresseEmetteur);
					
					if ($ok) {
						$message = "Enregistrement effectué.<br>Vous allez recevoir un mail de confirmation.";
						$typeMessage = 'information';
					}
					else {
						$message = "Enregistrement effectué.<br>L'envoi du mail de confirmation a rencontré un problème.";
						$typeMessage = 'avertissement';
					}
					include_once ('page-5-3-vue.php');
			}
	
?>