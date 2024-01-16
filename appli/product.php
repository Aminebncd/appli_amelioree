<?php

session_start();
ob_start();
var_dump($_SESSION['products'][$indexToDetail]);
include 'menu.php';

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

?>

 <!-- <img src="produits/<?= $product['img'] ?>" alt="" width="450px" height="auto">    -->


<?php

$titre = 'Descriptif du produit';
$content = ob_get_clean();
require_once 'template.php'; 

?>

</body>
</html>