
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
<?php
	//var_dump($_SESSION['client']["pnier"]);
	if (!empty($_SESSION["client"])){
		if (!empty($_SESSION["panier"])){
	echo "
	<center>
		<h1>Nous vous remercions pour votre achat !</h1>
		<!-- Bouton pour revenir à la page Catégorie-->														
		<a href='index.php?page=categorie'><input type='submit' name='shopping' class='btn' value='Continuer sur le site'></a>		
	</center>";
	

		

		//$tableau = array(array(1,"chaton",100,1),array(2,"chien",50,1)); //test sans le $_SESSION

		$tableauPanier = $_SESSION['panier']; //on récupère les infos
		$tableauClient = $_SESSION['client']; //on récupère les infos clients
		$idClient = $tableauClient[0]; //idClient dans une variable

		// On ajoute ce qui a été acheté dans la table 'commande'
		$NbrLigne=count($tableauPanier)-1;
		for ($j=0; $j<=$NbrLigne; $j++) {
			$bdd->exec('INSERT INTO commande(IdProduit, Nom, Qte, IdClient) VALUES('.$tableauPanier[$j][0].', "'.$tableauPanier[$j][1].'", '.$tableauPanier[$j][3].', '.$idClient.')');
		}

		// On retire ce qui a été acheté de la table 'produit'
		for ($j=0; $j<=$NbrLigne; $j++) {
			$bdd->exec('UPDATE produit SET QteStock = QteStock -'.$tableauPanier[$j][3].' WHERE IdProduit = '.$tableauPanier[$j][0].'');
		}

		unset($_SESSION['panier']); //supprime le panier une fois qu'il a été ajouté dans la bdd commande
		}
		else{
			echo'Votre panier est vide';
		}
	}
	else{
		echo"Pour accéder à cette page veuillez vous connecter.";
		include("traitement_co.php");
	}
	?>


</body>

</html>