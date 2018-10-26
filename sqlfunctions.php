<?php
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


?>