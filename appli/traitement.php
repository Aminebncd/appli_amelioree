<?php

session_start();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

    // AJOUT DE PRODUITS
    case "add":

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if ($name && $price && $qtt) {

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price * $qtt,
            ];

            $_SESSION['message'] = "Produit ajouté avec succès!";
            $_SESSION['products'][] = $product;
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout du produit.";
        }
        header("Location:index.php");
        break;

    // SUPPRESSION DE PRODUIT
    case "remove":
        if (isset($_POST['remove'])) {
            $indexToDelete = filter_input(INPUT_POST, 'productToDelete');

            if ($indexToDelete !== false && isset($_SESSION['products'][$indexToDelete])) {

                $_SESSION['message'] = ($_SESSION['products'][$indexToDelete]['name']) . " supprimé(e)!";

                $_SESSION["products"] = array_values($_SESSION["products"]);
                // on supprime à l'endroit selectionné
                unset($_SESSION['products'][$indexToDelete]);

            } else {
                $_SESSION['message'] = "Erreur lors de la suppression";
            }
        }
        header("Location:recap.php");
        break;

    // VIDER LE PANIER
    case "clear":
        if (isset($_POST['clear'])) {
            unset($_SESSION['products']);
        }
        header("Location:index.php");
        break;

    // INCREMENT DE LA QUANTITE DE PRODUIT
    case "minus":
        if (isset($_POST['minus'])) {
            $productIndex = isset($_POST['productIndex']) ? $_POST['productIndex'] : null;
            // var_dump($productIndex);
            if (isset($_SESSION['products'][$productIndex]['qtt'])) {
                // on s'assure que la quantité ne peut pas descendre en dessous de 1
                $_SESSION['products'][$productIndex]['qtt'] = max(1, $_SESSION['products'][$productIndex]['qtt'] - 1);
                // on met à jour le total
                $_SESSION['products'][$productIndex]['total'] = $_SESSION['products'][$productIndex]['price'] * $_SESSION['products'][$productIndex]['qtt'];
            }
        }
        header("Location: recap.php");
        break;

    case "plus":
        if (isset($_POST['plus'])) {
            $productIndex = isset($_POST['productIndex']) ? $_POST['productIndex'] : null;
            // var_dump($productIndex);

            if (isset($_SESSION['products'][$productIndex]['qtt'])) {
                $_SESSION['products'][$productIndex]['qtt']++;

                $_SESSION['products'][$productIndex]['total'] = $_SESSION['products'][$productIndex]['price'] * $_SESSION['products'][$productIndex]['qtt'];
            }
        }
        header("Location: recap.php");
        break;

    // MISE A JOUR DE LA QUANTITE DE PRODUIT
    case "updateQtt":
        if (isset($_POST['updateQtt'])) {
            $productIndex = isset($_POST['productIndex']) ? $_POST['productIndex'] : null;

            if (isset($_SESSION['products'][$productIndex]['qtt'])) {
                $newQuantity = filter_input(INPUT_POST, "updateQtt", FILTER_VALIDATE_INT);
                // on s'assure de bien recevoir un chiffre positif
                if ($newQuantity !== false && $newQuantity > 0) {
                    $_SESSION['products'][$productIndex]['qtt'] = $newQuantity;

                    $_SESSION['products'][$productIndex]['total'] = $_SESSION['products'][$productIndex]['price'] * $newQuantity;
                } else {
                    // on renvoie un message en cas de valeur invalide
                    $_SESSION['message'] = "Veuillez entrer une quantité valide.";
                }
            }
        }
        header("Location: recap.php");
        break;

    default: 
        header("Location: index.php");
        break;
    }

}
?>