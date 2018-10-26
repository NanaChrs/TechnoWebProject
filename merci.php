
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
		<!-- Bouton pour revenir à la page Catégorie-->														
		<a href="index.php?page=categorie"><input type="submit" name="shopping" class="btn" value="Continuer sur le site"></a>		
	</center>
	
<?php
		
		//se connecter à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
		include("header.php");

		//$tableau = array(array(1,"chaton",100,1),array(2,"chien",50,1));
		$tableau = $_SESSION['panier'];

		// On ajoute ce qui a été acheté dans la table 'commande'
		$NbrLigne=count($tableau)-1;
		for ($j=0; $j<=$NbrLigne; $j++) {
			$bdd->exec('INSERT INTO commande(IdProduit, Nom, Qte, IdClient) VALUES('.$tableau[$j][0].', "'.$tableau[$j][1].'", '.$tableau[$j][3].',2)'); //il reste à modifier d'IdClient
		}

		// On retire ce qui a été acheté de la table 'produit'
		for ($j=0; $j<=$NbrLigne; $j++) {
			$bdd->exec('UPDATE produit SET QteStock = QteStock -'.$tableau[$j][3].' WHERE IdProduit = '.$tableau[$j][0].'');
		}

		echo '</div>';
	?>


</body>

</html>