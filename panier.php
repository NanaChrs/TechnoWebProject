	<?php
		if (isset($_GET['Quantite'])){
			if($_GET['Quantite']!=""){
				if (empty($_SESSION['panier'])){			//Si le client a commander quelque chose et si le panier est vide on le remplie par l'objet commander
					$_SESSION['panier'][0] =array($_GET['Id'],$_GET['Nom'],$_GET['Prix'],$_GET['Quantite']);
				}
				else{										//Si le panier est pas vide on ajoute a la suite l'objet commander dans le panier
					for($k=0;$k<count($_SESSION['panier']);$k++){
						if($_SESSION['panier'][$k][0]==$_GET['Id']){
							$positionduproduit=$k;
						}	
					}
					if($_SESSION['panier'][$positionduproduit][0]==$_GET['Id']){
						$_SESSION['panier'][$positionduproduit][3]+=$_GET['Quantite'];
					}
					else{
						$_SESSION['panier'][count($_SESSION['panier'])] =array($_GET['Id'],$_GET['Nom'],$_GET['Prix'],$_GET['Quantite']);
					}
				}
				header('Location:index.php?page=panier');
			}
		}
		if (empty($_SESSION['panier'])){				//Si le panier est vide affiche au client qu'il n'a rien commander
			$tableau = array(array(" RIEN "," ",0,0));
		}
		else{											//Sinon remplie la variable tableau avec les valeurs de panier pour ensuite utiliser ces variables pour le tableau
			$temp = array();
			for($l=0;$l<count($_SESSION['panier']);$l++){	//supprime l'élément que le client ne veut plus si il décide d'en supprimer un
				if(!isset($_GET[$l])){
					$temp[]=$_SESSION['panier'][$l];
				}
			}
			unset($_SESSION['panier']);
			$_SESSION['panier']=$temp;
			$tableau = $_SESSION['panier'];
			if (empty($_SESSION['panier'])){			
				$tableau = array(array(" RIEN "," ",0,0));
			}
		}
		$NbrLigne=count($tableau)-1;
		$NbrCol=3;
		$Prixtoto=0;
		//var_dump($_SESSION); //fonction très utile ^^
		//var_dump($_SERVER['PHP_SELF']);
	?>
 

    
</head>
<body>
		<div class="panier">
			<table><center>
				<thread bgcolor=#edafb8><tr bgcolor=#edafb8>		<!-- On remplie les premières lignes du tableau avec les noms de ce qui va être afficher -->
				<th width="50px">IdProduit</th>
				<th width="250px">Nom</th>
				<th width="250px">Prix</th>
				<th width="250px">Quantité</th>
				<th width="250px">Prix Total</th>
				<th width="250px">Supprimé</th>
				</tr></thread>
				<tbody><?php for ($i=0; $i<=$NbrLigne; $i++) { ?><tr bgcolor=#aec5eb>  <!-- Première boucle for qui sert a mettre le bon nombre de ligne pour les produits -->
				<?php for($j=0;$j<=$NbrCol;$j++) { ?>								   <!-- Première boucle for qui sert a mettre le bon nombre de colonne pour les produits -->
				<td><center><?php echo ($tableau[$i][$j]); ?></center></td>			   <!-- Affiche toutes les infos du produit -->
				<?php } ?>
				<td><center><?php $Prixtoto+=$tableau[$i][2]*$tableau[$i][3];; echo ($tableau[$i][2]*$tableau[$i][3]) ; ?></center></td><!-- Calcul et affiche le prix total -->
				<td><center><form form="post"> <input name="page" value="panier" hidden><input  type="submit" name=<?php echo $i?> value="X" class="boutonrond"/></form><center></td>  		<!-- Créer un bouton rond qui contient la valeur de la ligne ce qui nous permet ensuite de la récupérer pour supprimer l'objet -->
				</tr><?php } ?></tbody>
				<tbody><tr bgcolor=#edafb8>
				<td colspan="7"><center>Prix Total : <?php echo $Prixtoto; ?></center></td> <!-- Affiche le prix total de tout les produits -->
			 	</tr></tbody>
				<tfoot><tr bgcolor=#edafb8>
				<?php
				if (empty($_SESSION['panier'])){  //Si le panier est vide le bouton renvoie vers le panier
 				echo '<td colspan="7"><center><a href="index.php?page=panier"><input name="valider" type="submit" id="valider" value="Valider" class="btn"/></a></center></td>';
 				}
 				else{							  //Sinon dirige le client vers le paiement
 				echo '<td colspan="7"><center><a href="index.php?page=paiement"><input name="valider" type="submit" id="valider" value="Valider" class="btn"/></a></center></td>';
 				}
 				?>
				</tr></tfoot>
			</center></table>	
		</div>
    

</body>
</html>