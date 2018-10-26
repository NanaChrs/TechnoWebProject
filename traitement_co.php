<?php
		
		//se connecter à la BDD

if(empty($_SESSION["client"])){
	$mail=getParam("mail");
	$donneesClient=getClient(getParam("mail"));
	if ($donneesClient!=""){						
		if($donneesClient['Password']!=getParam("password")){
			echo '<div class="container">';
			include("connexion.php");
			include("inscription.php");
			echo 'Mauvais mot de passe ou adresse mail inconnue';
			echo '</div>';
		}
		else {
			$_SESSION["client"]=$donneesClient;
			echo '<meta http-equiv="refresh" content="0; URL=index.php"/> ';
			}				
	}
	else {
		echo '<div class="container">';
		include("connexion.php");
		include ("inscription.php");
		echo '</div>';
	}
}
else{ 
	echo'Vous êtes déjà connecté nulos<input type="button" name="page" value="Deconnexion"/>';

	}
?>