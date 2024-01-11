
<!-- afin de pouvoir parcourir le tableau de session, on en demarre une pour recuperer la session de l'utilisateur -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produits</title>
</head>
<body>
    <?php 
// si la clée de session 'products' n'existe pas ou si la dite clé existe mais est vide, on affiche un message indiquant qu'aucun produit n'existe en session
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    } 
    // si la clé existe est contient un ou des produits, on en affiche le contenu dans un tableau
        else {
    // ici on declare les differents labels de nos variables dans la tete du tableau
        echo "<table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>";

    // on initialise le total general dans une variable à zero
        $totalGeneral = 0;
    
    // ici on parcours le tableau de session avec un foreach pour afficher uniformement toutes nos variables et on ajoute au $totalgeneral le total de tous nos produits
        foreach($_SESSION['products'] as $index => $product){

                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        // le number format sert à a formater l'affichage de nos variables numeriques
                        // Dans ce cas, elle prend le prix du produit $product['price'], le formate avec deux décimales, utilise une virgule comme séparateur décimal, et remplace l'espace insécable &nbsp; comme séparateur de milliers, on rajoute ensuite le symbole €
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";

                    $totalGeneral += $product['total'];

        }
    // on affiche ensuite le total general
                echo "<tr>",
                        "<td colspan=4>Total général : </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
            "</table>";
    }
    
    ?>
</body>
</html>




