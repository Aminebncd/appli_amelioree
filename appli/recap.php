<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produits</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   
</head>
<body>
<?php include 'menu.php'; ?>
    <div class="container mt-5">
        <?php 

        if (!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p class='alert alert-warning'>Aucun produit en session...</p>";
        } else {
            ?>
            <table class='table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            $totalGeneral = 0;

            foreach($_SESSION['products'] as $index => $product){
                ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€"; ?></td>
                    <td><?php echo $product['qtt']; ?></td>
                    <td><?php echo number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€"; ?></td>
                </tr>

                <?php
                $totalGeneral += $product['total'];
            }

            ?>
        
            <tr>
                <td colspan='4'>Total général :</td>
                <td><strong><?php echo number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€"; ?></strong></td>
            </tr>
            </tbody>
            </table>

            <?php
            echo "<form action='traitement_suppression.php' method='post'>";
            echo "<div class='form-group'>";
            echo "<label for='productToDelete'>Choisir un produit à supprimer :</label>";
            echo "<select class='form-control' name='productToDelete' id='productToDelete'>";
            foreach ($_SESSION['products'] as $index => $product) {
                echo "<option value='$index'>" . $product['name'] . "</option>";
            }
            echo "</select>";
            echo "</div>";
            echo "<button type='submit' name='submitDelete' class='btn btn-secondary btn-block'>Supprimer le produit</button>";
            echo "</form>";
            ?>
            <?php
        }
        ?>

        <a href="vider_panier.php" class="btn btn-danger btn-block mt-3">Vider le panier</a>

        <a href="index.php" class="btn btn-primary btn-block mt-3">Continuer les achats</a>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
