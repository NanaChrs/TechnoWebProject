

<div class="col2">
	<h1> Sinon...</h1>
	
	<form method="post">


		<label for="First Name">First Name:</label></br><input type="text" name="First_Name" id="First_Name" />

		<label for="Last_Name">Last Name:</label></br><input name="Last_Name" type="text" id="Last_Name" /><br />

		<label for="Date_of_Birth">Date of Birth:</label></br><input type="Date" name="Date_of_Birth" id="Date_of_Birth" /></br>

		<label for="email">Email Address:</label></br><input type="email" name="email" id="email" /></br>

		<label for="email_check">Confirmer l'adresse mail:</label></br><input type="email" name="email_check" id="email_check" /></br>

		<label for="password">Mot de Passe:</label></br><input type="password" name="password" id="password_ins" /></br>

		<label for="password_check">Confirmez le mot de passe:</label></br><input type="password" name="password_check" id="password_check" /></br>
		
		<input name="Inscription" type="submit" id="inscription" value="Inscrivez-vous !" class="btn"/>
	</form>
</div>

<?php

$ins=getParam("inscription");
$prenom=getParam("First_Name");
$nom=getParam("Last_Name");
$birth=getParam("Date_of_Birth");
$email=getParam("email");
$email_c=getParam("email_check");
$pass=getParam("password");
$pass_c=getParam("password_check");

if ($ins!=""){
	if ($prenom!="" && $nom!="" && $email!="" && $pass!="" && $pass==$pass_c && $email==$email_c){
		echo "bjr";
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
	

?>