<?php
	
function getParam($key){
	if (isset($_GET[$key])){
		return $_GET[$key];
	}
	else if (isset($_POST[$key])){
		return $_POST[$key];
	}
	else return "";
}

function getClient($mail){
	global $bdd;
	$donnees = $bdd->prepare('SELECT * 
							FROM clients
							WHERE Mail= ?');
	$donnees->execute(array($mail));
	$donneesclient="";
	while ($req = $donnees->fetch()){	
		$donneesclient=$req;
	}
	return $donneesclient;
}

function insertClient($nom, $prenom, $birthDate, $email, $password){
	
}

?>