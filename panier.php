	<?php
		if (isset($_POST[])){
			$_SESSION['panier'][] = array($_POST['Id'],$_POST['Nom'],$_POST['Prix'],$_POST['Quantite']);
		}
		$tableau = $_SESSION['panier'];
		$NbrLigne=count($tableau)-1;
		$NbrCol=3;
		$Prixtoto=0;
	?>


    
</head>
<body>


		</br></br></br></br></br></br></br></br>
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
 				<td colspan="7"><center><a href="paiement.php"><input name="valider" type="submit" id="valider" value="Valider" class="btn"/></a></center></td>
				</tr></tfoot>
			</center></table>	
		</div>
    

</body>
</html>