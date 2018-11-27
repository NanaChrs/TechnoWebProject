<?php
	session_start();
	include("sqlfunctions.php");
	include("doctype.php");
	include("header.php");
	try {$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');} # remove second root to work on PC
	    catch (Exception $e){die('Erreur : ' . $e->getMessage());}




//TODO get page parameter ($_GET['page'] or $_POST['page']) and assign it into $page variable
$page=getParam("page");
//echo ''.$page .'.php';
if(file_exists(''.$page .'.php') && $page!="index"){
	include(''.$page .'.php');
}
else{


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
	echo "<html><head>";// </head><body>";
	echo("<center><h1> Bienvenue à Félindus ! </h1></center>");
	echo("<center><img src='Images/pup1.jpg' class='center' height=50% width=50%></center>");
	echo("<h2><center> Si vous cherchez votre nouveau meilleur ami (qui est un animal), vous êtes au parfait e-magasin !</center>");

}
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