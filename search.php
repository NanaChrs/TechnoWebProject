 <?php
 
				$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
				
				if (isset($_POST['recherche'])){
					$recherche=$_POST['recherche'];
					$search= $bdd->prepare("SELECT Nom, Description, Prix FROM produit WHERE Nom LIKE '%$recherche%'");
					$entre=0;
					
					while ($req = $search->fetch()){
						$entre=1;
						echo 'résultats pour' . $recherche . ":\n";	
						echo $req['Nom'];
						echo $req['Description'];
						echo $req['Prix'];
					    
					}
					if ($entre!=1){

						echo 'aucun resultat';
					}
				}

			
			

		
?>