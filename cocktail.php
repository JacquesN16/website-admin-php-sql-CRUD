<?php
// ----  Chargement des fichiers de fonctions (librairie)
include 'lib/database.php';
// init PDO 
$pdo= connectToDatabase();
// set var pour id afin de concatener dans  le query SQL avec une mesure de securité
$id=$_GET['id'];
//préparation requête avec $_GET pour chercher le produit exact
$query= $pdo->prepare("
SELECT cocktail_id,Nom,Description,Photo_url,Prix_indicatif 
FROM `cocktail`
WHERE cocktail_id= ?"
);
// mesure de sécurité SQL injection
$parametre=[$id];
// éxecution requête
$query->execute($parametre);
//récuperation des lignes
$cocktails=$query->fetch(PDO::FETCH_ASSOC);

// Récupération de tous les cocktails stockés en base de données
// ---- Chargement du template
// Affichage du template de la page d'accueil
include 'templates/cocktail.phtml';