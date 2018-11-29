
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8"/>
	<title>Felindus - Paiement</title>
	<link rel="stylesheet" href="wegotstyle.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
	<meta charset="utf-8" />
     
</head>
<body>
	<?php
	if (!empty($_SESSION["client"])){

		echo'<div class="container" style="justify-content: space-around;">
			<div class="col1">';
			
				//calcul du total du panier
				$tableau = $_SESSION['panier'];
				$NbrLigne=count($tableau)-1;
				$Prixtoto=0;
				for ($i=0; $i<=$NbrLigne; $i++) {
						$Prixtoto+=$tableau[$i][2]*$tableau[$i][3];
					}

			echo"<h1>Total Panier :". $Prixtoto. "€</h1>
			<a href='index.php?page=panier'><input type='button' name='modifier' class='btn' value='Modifier'></a>
			</div>		
			<div style ='width:50%; flex-wrap: wrap;'>
			<h1> Paiement</h1>
				<label for='choix1'>Indiquez les informations correspondant à votre carte :</label>
				<INPUT type='radio' name='choix1' value='1'> Visa
				<INPUT type='radio' name='choix1' value='2'> Master Card
				<INPUT type='radio' name='choix1' value='3'> CB
				<INPUT type='radio' name='choix1' value='4'> Maestro
				</br></br>

				<label for='Numéro_carte'>Numéro de carte :</label>
				<input type='text' maxlength='16' name='Numéro_carte' format='NNNNNNNNNNNNNNNN' id='Numéro_carte' />
				</br></br>

				<label for='Date_expiration'>Date d'expiration :</label>
				<input id='Date_expiration' type='month' name='Date_expiration' min='2018-10'>
				</br></br>

				<label for='code_sécurité'>Code de sécurité :</label>
				<input type='text' maxlength='3' name='code_sécurité' format='NNN' id='code_sécurité' />
				</br></br>

				<label for='choix2'>J'accepte la conservation sécurisée de mes données bancaires</br>pour mes prochaines commandes :</label>
				<INPUT type='radio' name='choix2' value='5'> Oui
				<INPUT type='radio' name='choix2' value='6'> Non
				</br></br>
			<a href='index.php?page=merci'><input name='payer' type='submit' id='payer' value='Payer' class='btn'/></a>
			</div>
		</div>";
				}
				else{
					echo "Vous n'êtes pas connecté pour accéder à cette page veuillez vous connecter";
					include ("traitement_co.php");
				}
	?>
</body>

</html>