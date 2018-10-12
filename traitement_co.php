<!DOCTYPE html>
<html>
<head>
	<title>Vous êtes connecté</title>
</head>
<body>

	<?php
		//se connecter à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		echo 'Bonjour ' .$_POST['pseudo'];
		
	?>

</body>
</html>