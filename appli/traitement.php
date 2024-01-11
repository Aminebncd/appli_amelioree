<?php

    session_start();


    if(isset($_POST['submit'])) {


        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

      
        if($name && $price && $qtt){

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            
            $_SESSION['message'] = "Produit ajouté avec succès!";
            $_SESSION['products'][] = $product;
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout du produit.";
        }
    }

    header("Location:index.php");

    ?>