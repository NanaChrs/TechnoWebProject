<?php

		//se connecter à la BDD

if(empty($_SESSION["client"])){
	$prenom=getParam("First_Name");
	$ins=getParam("Inscription");

	$connexion=getParam("connexion");

	echo $connexion;
	include("connexion.php");
	include("inscription.php");
	if ($connexion!=""){		
		$mail=getParam("mail");
		$donneesClient=getClient($mail);
		if($donneesClient!=""){
			if($donneesClient['Password']!=getParam("password")){
				echo '<div class="container">';
				
				echo 'Mauvais mot de passe ou adresse mail inconnue';
				echo '</div>';
			}
			else {
				$_SESSION["client"]=$donneesClient;
				echo '<meta http-equiv="refresh" content="0; URL=index.php?page=index"/> ';

			}
		}									
	}
	else if ($prenom!=""){
		$nom=getParam("Last_Name");
		$birth=getParam("Date_of_Birth");
		$phone=getParam("Phone");
		$email=getParam("email");
		$email_c=getParam("email_check");
		$pass=getParam("password");
		$pass_c=getParam("password_check");
		
		if ($prenom!="" && $nom!="" && $email!="" && $pass!="" && $phone!="" && $pass==$pass_c && $email==$email_c){
			$sth=$bdd->prepare('SELECT * FROM clients WHERE Mail="'.$email.'"');
			$sth->execute();
			$result = $sth->fetchAll();
			if (empty($result)){
				$bdd->exec('INSERT INTO clients(Nom, Prenom, Telephone, Mail, Password) VALUES("'.$nom.'", "'.$prenom.'", "'.$phone.'","'.$email.'","'.$pass.'");');
				echo'compte créé veuillez vous connecter';

			}
			else{
				echo 'Veuillez vous connecter vous avez déjà un compte associé à cette email';
			}
			
		}	
		else {
			if ($pass==""){
			echo "Vous n'avez pas renseigné de mot de passe.";
			}
			else if ($pass!=$pass_c){
				echo 'les 2 mots de passe ne sont pas identiques';
			}
			if ($prenom==""){
			echo "Veuillez entrer un prénom.";
			}
			if ($nom==""){
			echo 'Veuillez entrer un nom.';
			}
			if ($email==""){
			echo 'Veuillez renseigner un email.';
			}
			else if ($email!=$email_c){
				echo 'Les 2 emails ne sont pas identiques';
			}
		}
	}
}
else{ 
	echo'Vous êtes déjà connecté nulos. Du coup je vous déconnecte';
	session_destroy();
	exit();}
?>