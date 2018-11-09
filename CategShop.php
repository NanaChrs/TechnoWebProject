
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Catégories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="wegotstyle(Axel).css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
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
                    echo('<a href="index.php?page=categorie&IdType=');
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

            if(true){//isset($_SESSION['Panier']) and !empty($_SESSION['Panier'])){
                foreach ($_SESSION['panier'] as $ligne ) {
                    $panier[$ligne[1]] = $ligne;
                }
                var_dump($panier);
            }

            if(isset($_GET['IdType'])){
                $objets = $bdd -> prepare("select * from produit where IdType = ?");
                $objets -> execute(array($_GET['IdType']));

                while($objet = $objets -> fetch()){

                    echo('<div class = "Objet">');
                    if (isset($panier[$objet['Nom']][3])) { //degage les erreuers, meme si elle ne font rien de mal
                        echo($objet['QteStock'] - $panier[$objet['Nom']][3]);
                    }
                    else{
                        echo($objet['QteStock']);
                    }


                    
                    echo('      ');
                    echo($objet['Nom']);
                    echo('  ');echo($objet['Prix']);echo('€');
                    echo('<form form="post">');
                    echo('<input name="Id" value="'. $objet['IdProduit'] .'"hidden>');
                    echo('<input name="Nom" value="'. $objet['Nom'] .'"hidden>');
                    echo('<input name="Prix" value="'. $objet['Prix'] .'"hidden>');
                    //echo('<select multiple name="Quantite">');
                        for($i=0;$i<=$objet['QteStock'];$i++) //residu qui compte la quantité des stocks, inutile
                        {
                            //echo('"<option value='.$i.'>'.$i);
                            //echo('');
                            //echo('</option>');
                        }
                        //echo "</select>";
                        echo('<input type="number" min="1" max ="');
                        echo($i-1);
                        echo('" name="Quantite" value="1">');
                        echo('<input type="submit" name="page" value="panier">');
                    echo("</form>");
                    echo('</div>');
                }
            }
            var_dump($_SESSION);
        ?>

    </div>




</div>
    
</body>
</html>