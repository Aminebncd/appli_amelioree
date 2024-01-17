
<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=upload', 'root', "");
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}