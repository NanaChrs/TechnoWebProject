
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Felindus - Paiement</title>
	<link rel="stylesheet" href="wegotstyle.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
	<meta charset="utf-8" />
    
</head>
<body>
	<center>
		<h1>Nous vous remercions pour votre achat !</h1>														
		<a href="index.php?page=categorie"><input type="submit" name="shopping" class="btn" value="Continuer sur le site"></a>		
	</center>
	
<?php
		
		//se connecter à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
		include("header.php");
		$tableau = array(array(1,"chaton",100,2),array(2,"chien",50,3));
		//$tableau = $_SESSION['panier'];
		//$bdd->exec('INSERT INTO commande(IdProduit, Nom, Qte, IdClient) VALUES(1, "chat", 1,2)');
		//$bdd->exec('INSERT INTO commande(IdProduit, Nom, Qte, IdClient) VALUES('.$tableau[0][0].', '.$tableau[0][1].', 1, 2)');
		$NbrLigne=count($tableau)-1;
		for ($j=0; $j<=$NbrLigne; $j++) {
		// On ajoute une entrée dans la table jeux_video
			$bdd->exec('INSERT INTO commande(IdProduit, Nom, Qte, IdClient) VALUES('.$tableau[$j][0].', "'.$tableau[$j][1].'", '.$tableau[$j][3].',2)');
		}

		echo '</div>';
	?>


</body>

</html>