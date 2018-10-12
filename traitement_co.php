<?php
		
		//se connecter à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
		

		if (isset($_POST['connexion'])){
			$donnees = $bdd->prepare('SELECT Nom, Prenom, Password FROM clients WHERE Mail=?');

			$donnees->execute(array($_POST['mail']));

			while ($req = $donnees->fetch()){									
				if($req['Password']!=$_POST['password']){
					include("header.php");
					include ("connexion.php");
					echo 'Mauvais mot de passe';
					

				}
				else {

					echo '<meta http-equiv="refresh" content="0; URL=index.php"/> ';
					}
			}
		}
		else{	
			include("header.php");
			include("connexion.php");
			include("inscription.php");
						
		}
	?>