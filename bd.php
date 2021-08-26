<?php

session_start();
require_once("connexionbd.php");
if(!isset($_SESSION['id']))
header('Location:index.php');


var_dump($_POST);

if(isset($_FILES['photo'])) {


$tmpName = $_FILES['photo']['tmp_name'];
$name = $_FILES['photo']['name'];
// $size = $_FILES['photo']['size'];
// $error = $_FILES['photo']['error'];

move_uploaded_file($tmpName, './upload/'.$name);
}




   // Vérifier si le formulaire est soumis 

     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $id_connexion= $_SESSION['id'];
     $titre = $_POST['titre']; 
     $description = $_POST['description']; 
     $categorie = $_POST['categorie'];
     $prix = $_POST['prix'];
     $datepublication = $_POST['datepublication'];
     $lieu = $_POST['lieu'];
     $photo = $name;
     
     // afficher le résultat
     $bdd->exec("INSERT INTO annonces (idconnexion, titre, description, categorie, prix, datepublication, lieu, photo) VALUES('$id_connexion','$titre','$description','$categorie', '$prix', '$datepublication', '$lieu', '$photo')");
     echo '<h3>Données transmises à la base de données </h3>';
     header ('Location: index.php');


?>
    
