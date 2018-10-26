<?php 
    /*session_start();
    try {$bdd = new PDO('mysql:host=localhost;dbname=felindus;charset=utf8', 'root', '');}
    catch (Exception $e){die('Erreur : ' . $e->getMessage());}*/







?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Catégories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="wegotstyle(Axel).css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
    <script src="main.js"></script>
</head>
<body>
    <!--<?php include("header.php") ?>-->
   
   <!-- <header>
        <center>
            <ul>
                <a href="index.php"><li>Home</li></a>
                <a href="connexion_inscription.html"><li>Connexion ou Inscription</li></a>
                <a href="CategShop.php"><li>Shopping par Catégorie</li></a>
                <a href="panier.php"><li>Panier<img src="panierIcon.png" height=15px class="panier"></li></a>
            </ul>
        </center>
    </header> -->

<div class="Corps">

    <nav>
        <div>
            <?php 
            
                $categories = $bdd->query("select * from Type");
                while ($categorie = $categories->fetch()){
                    echo('<div class = "Onglet" >');
                    echo('<a href="CategShop.php?IdType=');
                    echo($categorie['IdType']);
                    echo('">');
                    echo($categorie['Nom']);
                    echo('</a>');
                    $objets = $bdd -> prepare("select * from produit where IdType = ?");
                    $objets -> execute(array($categorie['IdType']));
                    echo('</div>');
                }
            
            ?>




        </div>
    </nav>

    <div class = "cadre">
        <?php
            if(isset($_GET['IdType'])){
                $objets = $bdd -> prepare("select * from produit where IdType = ?");
                $objets -> execute(array($_GET['IdType']));

                while($objet = $objets -> fetch()){
                    echo('<div class = "Objet">');
                    echo($objet['Nom']);
                    echo('</a>');
                    echo('</div>');
                }
            }
            
        ?>

    </div>




</div>
    
</body>
</html>