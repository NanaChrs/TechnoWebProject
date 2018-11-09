<?php
				$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
				
				if (isset($_GET['recherche'])){
					$recherche=$_GET['recherche'];
					$search= $bdd->query("SELECT Nom, Description, Prix FROM produit WHERE LOWER(Nom) LIKE LOWER('%$recherche%')");
					$entre=0;
					echo '<div class= "resultats" >';
					echo 'résultats pour ' . $recherche . ":\r";	
					while ($req = $search->fetch()){
						$entre=1;
						echo '<div class="resultat">';
						if(isset($req['image'])){
							echo '<img src="'.$req['image'].'">';
						}
						echo $req['Nom']. "\r";
						echo $req['Description']. "\r";
						echo $req['Prix']. "\r";
						echo '</div>';

					    
					}
					echo '</div>';
					if ($entre!=1){

						echo 'aucun resultat';
					}
				}

			
			

		
?>