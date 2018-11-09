	<?php
		if (isset($_GET['Id'])){
			if (empty($_SESSION['panier'])){
				$_SESSION['panier'][0] =array($_GET['Id'],$_GET['Nom'],$_GET['Prix'],$_GET['Quantite']);
			}
			else{
			$_SESSION['panier'][count($_SESSION['panier'])] =array($_GET['Id'],$_GET['Nom'],$_GET['Prix'],$_GET['Quantite']);
			}
		}
		if (empty($_SESSION['panier'])){
			$tableau = array(array(" RIEN "," ",0,0));
		}
		else{
			$temp = array();
			for($l=0;$l<count($_SESSION['panier']);$l++){
				if(!isset($_GET[$l])){
					$temp[]=$_SESSION['panier'][$l];
				}
			}
			unset($_SESSION['panier']);
			$_SESSION['panier']=$temp;
			$tableau = $_SESSION['panier'];
		}
		$NbrLigne=count($tableau)-1;
		$NbrCol=3;
		$Prixtoto=0;
		//var_dump($_SESSION); fonction très utile ^^
	?>


    
</head>
<body>
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
				<td><center><?php echo ($tableau[$i][$j]); ?></center></td>
				<?php } ?>
				<td><center><?php $Prixtoto+=$tableau[$i][2]*$tableau[$i][3];; echo ($tableau[$i][2]*$tableau[$i][3]) ; ?></center></td>
				<td><center><form form="post"> <input name="page" value="panier" hidden><!--<a href="index.php?page=panier" >--><input  type="submit" name=<?php echo $i?> value="X" class="boutonrond"/><!--</a>--></form><center></td>  <!-- bouton supprimé à faire plus tard-->  
				</tr><?php } ?></tbody>
				<tbody><tr bgcolor=#edafb8>
				<td colspan="7"><center>Prix Total : <?php echo $Prixtoto; ?></center></td>
			 	</tr></tbody>
				<tfoot><tr bgcolor=#edafb8>
 				<td colspan="7"><center><a href="index.php?page=paiement"><input name="valider" type="submit" id="valider" value="Valider" class="btn"/></a></center></td>
				</tr></tfoot>
			</center></table>	
		</div>
    

</body>
</html>