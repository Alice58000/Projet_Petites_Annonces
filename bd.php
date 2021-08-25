<?php


require_once("connexionbd.php");


    
   // Vérifier si le formulaire est soumis 

     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $titre = $_POST['titre']; 
     $description = $_POST['description']; 
     $categorie = $_POST['categorie'];
     $prix = $_POST['prix'];
     $datepublication = $_POST['datepublication'];
     $lieu = $_POST['lieu'];
     $photo = $_POST['photo'];
     
     // afficher le résultat
     $bdd->exec("INSERT INTO annonces(titre, description, categorie, prix, datepublication, lieu, photo) VALUES('$titre','$description','$categorie', '$prix', '$datepublication', '$lieu', '$photo')");
     echo '<h3>Données transmises à la base de données </h3>';
     header ('Location: index.php');


?>
    