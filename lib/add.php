<?php
include 'database.php';
// creation des vars pour le tableau coctail
$nom=htmlspecialchars($_POST['nom']);
$description=htmlspecialchars($_POST['description']);
$dateConception=$_POST['dateConception'];
$prix=$_POST['prix'];

$uploaddir = 'C:\xampp\htdocs\mysite\jour6php\bd5926732641259-cocktails - départ\cocktails - de╠üpart\www\images\cocktails/';
//verifier le type du fichier upload 

$allowed = array('gif', 'png', 'jpg');
$filename = $_FILES['userfile']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    echo 'error';
}else{
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
};
// variable pour l'url de la photo
$photo=basename($_FILES['userfile']['name']);
echo var_dump($photo);
// Sécurité : Retourne true si le fichier filename a été téléchargé par HTTP POST.
    //      https://www.php.net/manual/fr/function.is-uploaded-file.php
    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {

        // Vérifie que le fichier est bien PUIS l'envoi ou tu veux sur ton serveur (ou alors ton DD si t'es en local)
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                Voici plus d'informations :\n";
        }
    }
    else {
        // TODO : Gérer les différents types d'erreur > Meillur debug & retour utilisateur
        //      https://www.php.net/manual/fr/function.is-uploaded-file.php#29635
        echo "<p>Problème lors de l'envoi du fichier :'( // Fixer erreurs/retours utilisateurs ici</p>.";
    };
// callback function dans lib/database.php
$pdo= connectToDatabase();
// préparation requête
$query= $pdo->prepare("
INSERT INTO `cocktail`( `Nom`, `Description`, `dateConception`,`Photo_url`,`Prix_indicatif`)
VALUES (:nom,:description,:dateConception,:photo,:prix); 
"); 


$param=[
        
        'nom'           => $nom,
        'description'   =>$description,
        'dateConception'=>$dateConception,
        'photo'         =>$photo,
        'prix'          =>$prix];
//etape 3 éxecution requête
$query->execute($param);

//rediriger users vers HOME
header('Location: ../php\index.php');

 

