<?php
		
		//se connecter à la BDD

if(empty($_SESSION["client"])){
	$mail=getParam("mail");
	include("connexion.php");
	include("inscription.php");
	$donneesClient=getClient($mail);
	if ($donneesClient!=""){						
		if($donneesClient['Password']!=getParam("password")){
			echo '<div class="container">';
			
			echo 'Mauvais mot de passe ou adresse mail inconnue';
			echo '</div>';
		}
		else {
			$_SESSION["client"]=$donneesClient;
			echo 'Vous êtes connecté walla <meta http-equiv="refresh" content="0; URL=index.php"/> ';
			}				
	}
}
else{ 
	echo'Vous êtes déjà connecté nulos. Du coup je vous déconnecte';
	session_destroy();
	exit();	}
?>