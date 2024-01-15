<?php

session_start();
ob_start();

include 'menu.php';

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

?>

    <div class="container">
        <h1 class="mt-5">Ajouter un produit</h1>

        <form action="traitement.php?action=add" method="post">
            <div class="form-group">
                <label for="productName">Nom du produit :</label>
                <input type="text" class="form-control" name="name" id="productName">
            </div>

            <div class="form-group">
                <label for="productPrice">Prix du produit :</label>
                <input type="number" step="0.01" min="0.00"  class="form-control" name="price" id="productPrice" >
            </div>

            <div class="form-group">
                <label for="productQuantity">Quantité désirée :</label>
                <input type="number" step="1" min="0"class="form-control" name="qtt" id="productQuantity">
            </div>

            <input type="submit" name="add" value="Ajouter le produit" class="btn btn-primary"></input>
        </form>

        <a href="recap.php" class="btn btn-info mt-3">Récapitulatif des produits</a>
    </div>

<?php

$titre = 'Ajout de produits';
$content = ob_get_clean();
require_once 'template.php'; 

?>

</body>
</html>

