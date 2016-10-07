/* ce fichier contient les 2 fonctions d'affichage de message avec une fenêtre modale
 * il suppose qu'on a placé le bloc suivant juste avant la balise </body> :
 * 
	<aside id="affichage_message" class="classe_message">
		<div>
			<h2 id="titre_message" class="classe_information">Message</h2>
			<p id="texte_message" class="classe_texte_message">Voici le texte du message</p>
			<a href="#close" title="Fermer">Fermer</a>
		</div>
	</aside>
	
*/

// la fonction d'affichage d'une information
function afficher_information(msg) {
	document.getElementById("titre_message").innerHTML = "Information...";
	document.getElementById("titre_message").className = "classe_information";
	document.getElementById("texte_message").innerHTML = msg;
	window.open ("#affichage_message", "_self");
}

// la fonction d'affichage d'un avertissement
function afficher_avertissement(msg) {
	document.getElementById("titre_message").innerHTML = "Avertissement...";
	document.getElementById("titre_message").className = "classe_avertissement";
	document.getElementById("texte_message").innerHTML = msg;
	window.open ("#affichage_message", "_self");
}