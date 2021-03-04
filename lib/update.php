<?php
include 'database.php';


$pdo=connectToDatabase();
//creer une var pour concatener a la query SQL pour une mesure de securité
$id=$_GET['id'];
echo var_dump($id);
//préparation requête avec $_GET pour chercher le produit exact
$query= $pdo->prepare("
SELECT cocktail_id,Nom,Description,Photo_url,Prix_indicatif 
FROM `cocktail`
WHERE cocktail_id= ?"
);
// mesure de securité contre SQLi
$parametre=[$id];
//execute le query
$query->execute($parametre);
$cocktails=$query->fetch(PDO::FETCH_ASSOC);

include '../templates/update.phtml';