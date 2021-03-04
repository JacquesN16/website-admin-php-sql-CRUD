<?php

include '../lib/database.php';
include '../templates/admin.phtml';
$pdo=connectToDatabase();

// set var pour id afin de concatener dans  le query SQL avec une mesure de securité
$id=$_GET['id'];
// preparer le query
$query= $pdo->prepare("
DELETE FROM `cocktail` WHERE cocktail_id= ?
");
// mesure de sécurité SQL injection
$parametre=[$id];

//exucuter le  query
$query->execute($parametre);

//retourner ver lapage admin

header('Location:../admin.php');