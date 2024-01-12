<?php

session_start();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

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

    case "remove":
        if (isset($_POST['remove'])) {
            $indexToDelete = filter_input(INPUT_POST, 'productToDelete');

            if ($indexToDelete !== false && isset($_SESSION['products'][$indexToDelete])) {

                $_SESSION['message'] = ($_SESSION['products'][$indexToDelete]['name']) . " supprimé(e)!";

                $_SESSION["products"] = array_values($_SESSION["products"]);

                unset($_SESSION['products'][$indexToDelete]);

            } else {
                $_SESSION['message'] = "Erreur lors de la suppression";
            }
        }
        header("Location:recap.php");
        break;

    case "clear":
        if (isset($_POST['clear'])) {
            unset($_SESSION['products']);
        }
        header("Location:index.php");
        break;

    case "minus":
        if (isset($_POST['minus'])) {
            $productIndex = isset($_POST['productIndex']) ? $_POST['productIndex'] : null;
            // var_dump($productIndex);
            if (isset($_SESSION['products'][$productIndex]['qtt'])) {
                // Check if the quantity is already 1 before decrementing
                $_SESSION['products'][$productIndex]['qtt'] = max(1, $_SESSION['products'][$productIndex]['qtt'] - 1);

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

    case "updateQtt":
        if (isset($_POST['updateQtt'][$index])) {

            $qtt = $_POST['updateQtt'][$index];
            // $_SESSION['products'][$qtt] = filter_input(INPUT_POST, "updateQtt", FILTER_VALIDATE_INT);

            // $_SESSION['products'][] = $product;

        }
        header("Location: recap.php");
        break;

    }
}
?>