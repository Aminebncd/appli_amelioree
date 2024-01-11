<?php
// pour reccuperer et enregistrer les produits en Session sur le serveur (dans un cookie), il nous faut imperativement demarrer une session
    session_start();


    // ici on verifie qu'une methode POST a bien été utilisée pour acceder à la page en cherchant si une clé submit existe bien et a été transmise.
    // si tel n'est pas le cas la ligne 36 nous redirige immediatement sur la page index sans rentrer dans le if
    if(isset($_POST['submit'])) {


    // afin d'eviter des erreurs ou un piratage du serveur par injection de code on verifie l'integrité des valeurs transmises dans post avec filter_input()

    // Les valeurs sont filtrées en fonction de leur type par les differents parametres de filter_input(), en l'occurence ici SANITIZE et VALIDATE

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_SANITIZE_NUMBER_INT);



        // une fois les trois valeurs validées et filtrées, on les attribut à une tableau $product composé de trois variables, on en crée aussi une 4eme en utilisant $price et $qtt pour calculer le total
        if($name && $price && $qtt){

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

        // on enregistre ensuite le nouveau produit dans le tableau de session et on indique la clé 'products' du tableau
            $_SESSION['products'][] = $product;
        }
    }

    header("Location:index.php");

    ?>