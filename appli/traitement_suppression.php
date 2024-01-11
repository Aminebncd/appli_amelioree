<?php
session_start();

if (isset($_POST['submitDelete'])) {
    $indexToDelete = filter_input(INPUT_POST, "productToDelete", FILTER_VALIDATE_INT);

    if ($indexToDelete !== false && isset($_SESSION['products'][$indexToDelete])) {
        unset($_SESSION['products'][$indexToDelete]);

        $_SESSION['products'] = array_values($_SESSION['products']);

        $_SESSION['message'] = "Produit(s) supprimé avec succès!";
    } else {
        $_SESSION['message'] = "Erreur lors de la suppression du produit.";
    }
}

header("Location: recap.php");
exit();
?>
