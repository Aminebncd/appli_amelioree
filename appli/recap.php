<?php

session_start();
ob_start();

include 'menu.php';

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

?>


<body>
    <div class="container mt-5">
    <h2 class="mt-5">Récapitulatif des produits</h2>

        <?php
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p class='alert alert-warning'>Aucun produit en session...</p>";
                } else {
        ?>
            <table class='table text-center align-middle mt-3'>
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th class='th text-left' >Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

            <?php

            $totalGeneral = 0;
    foreach ($_SESSION['products'] as $index => $product) {
        // $index += 1;
            ?>

                <tr>
                    <!-- <td><?php echo $index; ?></td> -->
                    <td class= "td text-left"><?php echo $product['name']; ?></td>
                    <td><?php echo number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€"; ?></td>

                    <td class="input-group d-flex justify-content-center">
                        <div class="btn-group" role="group" aria-label="Quantité">

                            <form action='traitement.php?action=minus' method='post'>
                                <input type='hidden' name='productIndex' value='<?php echo $index; ?>'>
                                <input type='submit' name='minus' value="-" class='btn btn-sm'>
                            </form>

                            <form action="traitement.php?action=updateQtt" method="post">
                                <input type='hidden' name='productIndex' value='<?php echo $index; ?>'>
                                <input class="text-center" type="text" size='1' name='updateQtt' value='<?php echo $product['qtt']; ?>'>
                            </form>

                            <form action='traitement.php?action=plus' method='post'>
                                <input type='hidden' name='productIndex' value='<?php echo $index; ?>'>
                                <input type='submit' name='plus' value="+" class='btn btn-sm'>
                            </form>

                        </div>
                    </td>

                    <td><?php echo number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€"; ?></td>

                </tr>

                <?php
            $totalGeneral += $product['total'];
             }
                ?>

                    <tr>
                        <td class= 'th text-left font-weight-bold'colspan='3'>Total général :</td>
                        <td><?php echo number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€"; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php
                echo "<form action='traitement.php?action=remove' method='post'>";
                echo "<div class='form-group'>";
                echo "<label for='productToDelete'>Choisir un produit à supprimer :</label>";
                echo "<select class='form-control' name='productToDelete' id='productToDelete'>";

                foreach ($_SESSION['products'] as $index => $product) {
                    echo "<option value='$index'>" . $product['name'] . "</option>";
                }

                echo "</select>";
                echo "</div>";
                echo "<input type='submit' name='remove' class='btn btn-secondary btn-block mt-5' value='Supprimer le produit'></input>";
                echo "</form>";
                }
            ?>

        <form action="traitement.php?action=clear" method="post">
        <input class="btn btn-danger btn-block mt-3" type="submit" name="clear" value="Vider le panier" class="btn btn-primary"></input>
        </form>

        <a href="index.php" class="btn btn-primary btn-block mt-3">Continuer les achats</a>
    </div>


<?php
$titre = 'Récapitulatif des produits';
$content = ob_get_clean();
require_once 'template.php'; ?>

</body>
</html>
