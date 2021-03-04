<?php 
//call back function
include 'database.php';

$pdo=connectToDatabase();

// creer var pour concatener dans la query SQL pour la mesure de sécurité


// creer var pour la modification


$sql= 'UPDATE `cocktail`
        SET Nom = :nom, 
            Description = :description, 
            dateConception = :date, 
            Prix_indicatif = :prix
        WHERE cocktail_id= :id';

$query=$pdo->prepare($sql);

$id=$_POST['id'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$date=$_POST['dateConception'];
$prix=$_POST['prix'];

$parametres = [ 'nom'            => $nom,
                'description'    => $description,
                'date'           => $date,
                'prix'           => $prix,
                'id'             => $id];
//executer la query
$query->execute($parametres);

 header('Location: ../admin.php');