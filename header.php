

<header>
	<ul>
		<a href="index.php?page=index"><li>Page d'Accueil</li></a>
		<?php 
		
		if (empty($_SESSION["client"])){											//si aucun client n'est connecté :
			echo '<a href="index.php?page=traitement_co"><li>Connexion ou Inscription</li></a>'; //affiche le bouton "Connexion ou Inscription"
		}
		else{																		//sinon
			echo '<a href="index.php?page=traitement_co"><li>Se déconnecter</li></a>'; 	//affiche le bouton "Se déconnecter"
			if (!is_null($_SESSION["client"]["Admin"])){ 							//si le client est un admin :
				echo '<a href="index.php?page=admin"><li>Page Admin</li></a>'; 		//afiche un bouton "Page Admin"
			}
		}
		?>

		<a href="index.php?page=CategShop"><li>Shopping par Catégorie</li></a>
	    <a href="index.php?page=panier"><li>Panier<img src="Images/panierIcon.png" height=15px class="panier"></li></a>

	    <li>
	    	<form form="post">
	    		<input type="hidden" name="page" value="search"/>
			<input  type="text" name="recherche" id="recherche" placeholder="search.." />
			</form>
		</li>
	</ul>
</header>