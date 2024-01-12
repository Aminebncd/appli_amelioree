<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Ajout produit</title>

</head>
<body>

<?php include 'menu.php';?>

<?php
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

