<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Felindus - Connexion/Inscription</title>
	<link rel="stylesheet" href="wegotstyle.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
	<meta charset="utf-8" />
	<?php
		//session_start();
		$tableau = array(array(1,"chaton",100,2),array(2,"chien",50,3));		//$_SESSION['panier']
		$NbrLigne=count($tableau)-1;
		$NbrCol=3;
		$Prixtoto=0;
	?>


    
</head>
<body>

	<header>
		<center>
			<ul>
				<a href="index.html"><li>Home</li></a>
				<a href="connexion_inscription.html"><li>Connexion ou Inscription</li></a>
				<a href="CategShop.html"><li>Shopping par Catégorie</li></a>
				<a href="panier.html"><li>Panier<img src="panierIcon.png" height=15px class="panier"></li></a>
			</ul>
		</center>
	</header>


		</br></br></br></br>
		<div class="panier">
			<table><center>
				<thread bgcolor=#edafb8><tr bgcolor=#edafb8>
				<th width="50px">IdProduit</th>
				<th width="250px">Nom</th>
				<th width="250px">Prix</th>
				<th width="250px">Quantité</th>
				<th width="250px">Prix Total</th>
				<th width="250px">Supprimé</th>
				</tr></thread>
				<tbody><?php for ($i=0; $i<=$NbrLigne; $i++) { ?><tr bgcolor=#aec5eb>
				<?php for($j=0;$j<=$NbrCol;$j++) { ?>
				<td><center><?php echo $tableau[$i][$j]; ?></center></td>
				<?php } ?>
				<td><center><?php $Prixtoto+=$tableau[$i][2]*$tableau[$i][3]; echo $tableau[$i][2]*$tableau[$i][3] ; ?></center></td>
				<td><center><a href="connexion_inscription.html"><input name="X" type="submit" value="X" class="boutonrond"/></a><center></td>  <!-- bouton supprimé à faire plus tard-->
				</tr><?php } ?></tbody>
				<tbody><tr bgcolor=#edafb8>
				<td colspan="7"><center>Prix Total : <?php echo $Prixtoto; ?></center></td>
			 	</tr></tbody>
				<tfoot><tr bgcolor=#edafb8>
 				<td colspan="7"><center><a href="paiement.html"><input name="valider" type="submit" id="valider" value="Valider" class="btn"/></a></center></td>
				</tr></tfoot>
			</center></table>	
		</div>
    

</body>
</html>