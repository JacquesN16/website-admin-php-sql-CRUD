<?php

include 'lib/database.php';
$pdo=connectToDatabase();
// preparer le query
$query= $pdo->prepare("
SELECT cocktail_id,Nom,Description,Photo_url,Prix_indicatif,dateConception 
FROM `cocktail`; 
");
//exucuter le  query
$query->execute();
//afficher les lignes du tabl
$cocktails=$query->fetchAll(PDO::FETCH_ASSOC);

//afficher la page html
include 'templates/admin.phtml';