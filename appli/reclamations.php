<?php

session_start();
ob_start();
require 'bdd.php';
include 'menu.php';

// echo '<pre>'; var_dump($_FILES); echo '</pre>';

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

?>

    <div class="container">

        <h1 class="mt-5">Reclamations</h1>

        <p>Un produit vous manque? Des suggestions quant au panel de produits vendus? C'est moins cher ailleurs? N'hesitez pas à nous envoyer votre reclamation dans le formulaire ci-dessous, vous pouvez meme nous joindre un fichier pour appuyer votre demande</p>

        <form action="traitement.php?action=reclamation" method="post" enctype="multipart/form-data" class="mt-3">

            <div class="form-group">
                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Categorie de la reclamation</option>
                    <option value="1">Il manque un produit</option>
                    <option value="2">J'ai une suggestion à faire</option>
                    <option value="3">C'est moins cher ailleurs</option>
                </select>
            </div>


            <div class="form-group">
                <label for="reclamation">Votre demande :</label>
                <textarea type="text" class="form-control" name="demand" id="reclamation" rows="6"></textarea> 
            </div>
            <!-- </form>

            <form action="reclamations.php" method="POST" enctype="multipart/form-data"> -->

            <div class="form-group">
                <label for="reclamation" >Piece-jointe</label>
                <input type="file" class="form-control form-control-sm p-0" name="file" id="reclamationFile">
            </div>
            
            
            <input type="submit" name="reclamation" value="Soumettre" class="btn btn-primary"></input>
        </form>

        <h2 class="mt-5">Mes images</h2>
<?php 
    $req = $db->query('SELECT name FROM file');
    while($data = $req->fetch()){
        echo "<img src='../appli/upload/".$data['name']."' width='300px' >";
    }
    // var_dump($data);
?>
        
    </div>

    <?php

$titre = 'Reclamations';
$content = ob_get_clean();
require_once 'template.php'; 


?>