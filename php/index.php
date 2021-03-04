<?php

// ----  Chargement des fichiers de fonctions (librairie)
include '../lib/database.php';



// ---- Code principal
// etape 1 init PDO 
$pdo= connectToDatabase();

//etape 2 préparation requête
$query= $pdo->prepare("
SELECT cocktail_id,Nom,Description,Photo_url,Prix_indicatif 
FROM `cocktail`; 
");
//etape 3 éxecution requête

$query->execute();

//etape 4 récuperation des lignes

$cocktails=$query->fetchAll(PDO::FETCH_ASSOC);

// Récupération de tous les cocktails stockés en base de données
// ---- Chargement du template
// Affichage du template de la page d'accueil
include '../templates/index.phtml';