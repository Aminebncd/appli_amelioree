
<?php include 'functions.php';?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Votre Application</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="recap.php">Récapitulatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reclamations.php">Reclamations</a>
            </li>
            <li class="nav-item">
                <span class="navbar-text">
                    Panier : <?php echo getNumberOfProductsInSession(); ?>
                </span>
            </li>
        </ul>
    </div>
</nav>
