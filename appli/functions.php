<?php

function getNumberOfProductsInSession() {
    return isset($_SESSION['products']) ? count($_SESSION['products']) : 0;
}


?>
