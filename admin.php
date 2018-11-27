<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Page Admin</title>
    <link rel="stylesheet" type="text/css" media="screen" href="wegotstyle(Axel).css"/>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet">
    <link rel="shortcut icon" href="panierIcon.png"/>
	<meta charset="utf-8" />
    
</head>
<body>
<div class="Corps">

    <nav>
        <div>
            <?php 
                    
                
                $categories = $bdd->query("select * from Type");
                while ($categorie = $categories->fetch()){
                    echo('<div class = "Onglet" >');
                    echo('<a href="index.php?page=admin&IdType=');
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
            if(isset($_SESSION['Panier']) and !empty($_SESSION['Panier'])){
                foreach ($_SESSION['panier'] as $ligne ) {
                    $panier[$ligne[1]] = $ligne;
                }
                //var_dump($panier);
            }

            if(isset($_GET['IdType'])){
                $objets = $bdd -> prepare("select * from produit where IdType = ?");
                $objets -> execute(array($_GET['IdType']));

                while($objet = $objets -> fetch()){

                    echo('<div class = "Objet">');
                    if (isset($panier[$objet['Nom']][3])) { //degage les erreuers, même si elles ne font rien de mal
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

                        echo('<input type="number" min ="0" name="Qte" id="Qte" placeholder="Changer la quantité">');
                        //echo('<input type="submit" name="page" value="ajouter">');
                        //echo('<input type="submit" name="page" value="admin">');
                        echo('<input type="submit" name="page" value="admin" hidden>');
                        //echo('<input type="submit" name="page" value="Ajouter">');
                

                    echo("</form>");
                    echo('</div>');
                }
            }
            $qte=getParam("Qte");
                if ($qte!=""){
                    $bdd->exec('UPDATE produit SET QteStock = '.getParam("Qte").' WHERE IdProduit = '.getParam("Id").'');
                } 
            //var_dump($_SESSION);
        ?>

    </div>




</div>
</body>

</html>