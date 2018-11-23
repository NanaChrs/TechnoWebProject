<?php
	session_start();
	include("sqlfunctions.php");
	include("doctype.php");
	include("header.php");
	try {$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');}
	    catch (Exception $e){die('Erreur : ' . $e->getMessage());}

	
/*if(!empty($_SESSION)){
	if($_SESSION['setCookies']){
			foreach ($_SESSION['client'] as $key => $value) {
			echo('cookie '. $key .' cree !');
		
			setcookie($key,$value,time() + 365*24*3600, null, null, false, true);
			}
	}
}

//var_dump($_SESSION);
//var_dump($_COOKIE['nom']);
//var_dump(getParam('remember'));*/


//TODO get page parameter ($_GET['page'] or $_POST['page']) and assign it into $page variable
$page=getParam("page");
if ($page=="categorie"){
		include ("CategShop.php");
	}
else if ($page=="connexion"){
		echo "<div class='container'>";
		include("traitement_co.php");
		echo "</div>";
	}
else if ($page=="Valider"){
		include("search.php");
	}
else if ($page=="index" || $page==""){
		//var_dump($_SESSION);
}

else if (!empty($_SESSION["client"])){
	if ($page=="panier"){
		include("panier.php");
	}

	if ($page=="paiement"){
		include("paiement.php");
	}
	if ($page=="merci"){
	  include("merci.php");
  }
  if ($page=="admin"){
	  include("admin.php");
  }
}
else{
	echo "Pour accéder à cette page veuillez vous connecter";
	include("traitement_co.php");
}



//if 'action/'.$page'.php' exists then include it (use file_exists($filename) function)
/*	if(file_exists('action/'.$page'.php')){
		include('action/'.$page'.php');
	}else
		echo "nope, not found"
*/

//create one php file for each action to manage on the website

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to insert or update data into database

// TODO insert the start html envelope (<html><head>....</head><body>
	echo "<html><head> </head><body>";
// TODO using $page decide to include header.php

//TODO add header display

//TODO if 'view/'.$page'.php' exists then include it (use file_exists($filename) function)
//           else include 'view/main.php' (it has to exist)
/*	if(file_exists('view/'.$page'.php')){
		include('view/'.$page'.php');
	}else{
	 include('view/main.php');
	}
*/

//create one php file for each view to manage on the website (don't forget to create on main.php view)

//TODO use 
//             input params (included in $_GET or $_POST)
//             $database variable (initialized in $database.php) 
// to get data from database (if needed)

// add view display possibly using data from database
// TODO insert the end html envelope (</body></html>)
	echo "</body></html>";
?>