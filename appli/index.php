

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajout produit</title>
</head>
<body>

<!-- je crée mon formulaire à remplir par le client -->
    <h1>Ajouter un produit</h1>

    <!-- l'attribut action indique la cible du formulaire une fois le bouton submit pressé, method definit quelle methode est employée pour transmettre les infos, ici c'est POST afin de garder une URL "propre" -->
    <form action="traitement.php" method="post">
    <p>
        <label>
            Nom du produit :
            <input type="text" name="name">
        </label>
        </p>
    <p>
        <label>
            Prix du produit :
            <input type="number" name="price">
        </label>
    </p>
    <p>
        <label>
            Quantitée desirée :
            <input type="number" name="qtt">
        </label>
    </p>
    <p>
        <!-- le bouton permettant de soumettre le formulaire -->
        <input type="submit" name="submit" value="Ajouter le produit">
    </p>

</form>

<a href="recap.php"> Recapitulatif des produits</a>

</body>
</html>

