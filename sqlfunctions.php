<?php
	
function getParam($key){
	if (isset($_POST[$key]) && $_POST[$key]!=""){
		return $_POST[$key];
	}
	else if (isset($_GET[$key]) && $_GET[$key]!=""){
		return $_GET[$key];
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