<?php
session_start();
$selectedProduct = isset($_SESSION['selectedProduct']) ? $_SESSION['selectedProduct'] : null;

ob_start();
// var_dump($_SESSION['selectedProduct']);
include 'menu.php';

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
?>

<body>

<div class="container mt-5">

<?php
    if ($selectedProduct) {
      
    ?>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo '../appli/produits/' . $selectedProduct['img']; ?>" class="img-fluid" alt="Image du Produit" style="max-width: 300px;">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $selectedProduct['name']; ?></h5>
                        <p class="card-text"><?php echo $selectedProduct['desc']; ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Prix: <?php echo $selectedProduct['price']; ?> €</li>
                            <li class="list-group-item">Dans le panier : <?php echo $selectedProduct['qtt']; ?></li>
                            <!-- <li class="list-group-item">Total: <?php echo $selectedProduct['total']; ?> €</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "Produit non trouvé.";
    }
    ?>
</div>

<?php
$titre = 'Descriptif du produit';
$content = ob_get_clean();
require_once 'template.php';
?>
</body>
</html>
