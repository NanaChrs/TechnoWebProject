
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


	<header>
		<center>
			<ul>
				<a href="index.html"><li>Home</li></a>
				<a href="connexion_inscription.html"><li>Connexion ou Inscription</li></a>
				<a href="CategShop.html"><li>Shopping par Catégorie</li></a>
				<a href="panier.html"><li>Panier<image scr="panierIcon.jpg"></li></a>
				<a href="panier.html"><li>Panier<img src="panierIcon.png" height=15px class="panier"></li></a>

			</ul>
		</center>
	</header>
	
		<div class="paiement">


			<div class="col1">
				
					<br><br>
				<h1>Panier</h1>
					<p>-...</br>-...</br>-...</p>				
				<h1>Total Panier : ...€</h1>										
				<a href="panier.html"><input type="button" name="modifier" class="btn" value="Modifier"></a>		
				
			</div>


			<div class="col2">
				<br><br>
				<h1> Paiement</h1>
					<form action="traitement_pay.php" method="post">
					<p>Indiquez les informations correspondant à votre carte</p>

					<INPUT type="radio" name="choix1" value="1"> Visa
					<INPUT type="radio" name="choix1" value="2"> Master Card
					<INPUT type="radio" name="choix1" value="3"> CB
					<INPUT type="radio" name="choix1" value="4"> Maestro

					<label for="Numéro_carte">Numéro de carte :</label></br><input type="text" maxlength="16" name="Numéro_carte" format="NNNNNNNNNNNNNNNN" id="Numéro_carte" /></br>
					<form>
					  	<label for="Date_expiration">Date d'expiration :</label>
					  	<input id="Date_expiration" type="month" name="Date_expiration"
					  			min="2018-10">
					</form>
					<label for="code_sécurité">Code de sécurité :</label></br><input type="text" maxlength="3" name="code_sécurité" format="NNN" id="code_sécurité" /></br>
					<p>J'accepte la conservation sécurisée de mes données bancaires</br>pour mes prochaines commandes :</p>
					<FORM>
					<INPUT type="radio" name="choix2" value="5"> Oui
					<INPUT type="radio" name="choix2" value="6"> Non
					</FORM>
					
				<a href="merci.html"><input name="payer" type="submit" id="payer" value="Payer" class="btn"/></a>
				</form>
			</div>
		</div>
    

</body>

</html>