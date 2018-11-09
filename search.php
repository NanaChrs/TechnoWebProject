<?php
	$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
				
	if ( isset($_GET['recherche']) ){
		
		$recherche=$_GET['recherche'];
		//$search= $bdd->query("SELECT Nom, Description, Prix FROM produit WHERE LOWER(Nom) LIKE LOWER('%$recherche%')"); //ancienne requete SQL
		$search= $bdd->query("SELECT * FROM produit WHERE LOWER(Nom) LIKE LOWER('%$recherche%')");
		$entre=0;
		echo '<div class= "resultats" >';
		echo 'résultats pour ' . $recherche . ":\r";	

		while ($objet = $search->fetch()){ //objet au lieu de req
			$entre=1;
			echo('<div class = "Objet">');
			echo($objet['QteStock']);
			echo('      ');
			echo($objet['Nom']);
			echo('  ');echo($objet['Prix']);echo('€');
			echo('<form form="post">');
			echo('<input name="Id" value="'. $objet['IdProduit'] .'"hidden>');
			echo('<input name="Nom" value="'. $objet['Nom'] .'"hidden>');
			echo('<input name="Prix" value="'. $objet['Prix'] .'"hidden>');
			//echo('<select multiple name="Quantite">');
			
				for($i=0;$i<=$objet['QteStock'];$i++) //residu qui compte la quantité des stocks, inutile
				{
					//echo('"<option value='.$i.'>'.$i);
					//echo('');
					//echo('</option>');
				}
				
			//echo "</select>";
			echo('<input type="number" min="1" max ="');
			echo($i-1);
			echo('" name="Quantite" value="1">');
			echo('<input type="submit" name="page" value="panier">');
			echo("</form>");
			echo('</div>');
		}

		/*
			$entre=1;
			echo '<div class="resultat">';
			if(isset($req['image'])){
				echo '<img src="'.$req['image'].'">';
			}
			echo $req['Nom']. "\r";
			echo $req['Description']. "\r";
			echo $req['Prix']. "\r";
			echo '</div>';*/
	}
	//echo '</div>';
	if ($entre!=1){
		echo 'aucun resultat';
	}





		
?>