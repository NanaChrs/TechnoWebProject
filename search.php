 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Félindus - Home</title>
     <link rel="stylesheet" href="wegotstyle.css"/>
     <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
     <link rel="shortcut icon" href="panierIcon.png"/>
	 <meta charset="utf-8"/>
    

</head>

 <?php
 			include("header.php");
 			echo "<br/> <br/> <br/>";
				$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');
				
				if (isset($_POST['recherche'])){
					$recherche=$_POST['recherche'];
					$search= $bdd->query("SELECT Nom, Description, Prix FROM produit WHERE Nom LIKE '%$recherche%'");
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