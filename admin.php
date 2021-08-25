<?php
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Petites annonces </title>
</head>
<body>
    <header>

    <div class="titrelogo">
        <ul class="menu">
     
            
            <button class="connexion"> <a href="deconnexion.php">Se deconnecter </a> </button>
            
        </ul>

        <h3 class="titre">
            Petites annonces 
        </h3>

        <img class="logo" src="images/logo2.png" alt="logo">

    </div>
  
    
    <section>
            
                <h2 class="form"> Mes annonces</h2>
                <div class="formulaire">
                <br>
                <form action="bd.php" method="Post">

                
                    <input  type="text" name="titre" placeholder="Titre de l'annonce" required>
                    <br> <br>


                    <input  type="text" name="description" placeholder="Description de l'annonce" required>
                    <br> <br>

                    <select class="select" name="categorie" id="categorie" placeholder="Categorie">
                        <option value="">Choisir une option </option>
                        <option value="maison">Maison </option>
                        <option value="appartement">Appartement </option> </select>
                     
                    <br> <br>


                    <input  type="text" name="prix" placeholder="Prix" required>
                    <br> <br>

                    
                    <input  type="text" name="datepublication" placeholder="Date de publication" required>
                    <br> <br>

                    <input  type="text" name="lieu" placeholder="Lieu" required>
                    <br> <br>

                    <input  type="file" name="photo"  required>
                    <br> <br>


                   

                     </select>

                    <br> <input class="boutonajouter" type="submit" value="Ajouter">
                    <br> <br>

                </form>
  


            </div>
        </section>

</body>
</html>

<?php 
require_once("connexionbd.php");
?>



<?php

$sql = "SELECT * FROM annonces ";
    foreach ($bdd -> query($sql) as $row) {
    
      
        
        echo '<a class="inscription" href="suppression.php?id=' . $row["id"] . '">Suppprimer</a>' ;
        echo '<a class="inscription" href="modification.php?id=' . $row["id"] . '">Modifier</a>' ;
   
    

$sql = "SELECT * FROM annonces ";
        foreach ($bdd -> query($sql) as $row) {
   
 
            // echo "<p>" . $row["titre"] . "</p>";
            // echo "<p>" . $row["description"] . "</p>";
            // echo "<p>" . $row["categorie"] . "</p>";
            // echo "<p>" . $row["prix"] . " € </p>";
            // echo "<p>" . $row["datepublication"] . "</p>";
            // echo "<p>" . $row["lieu"] . "</p>";
            // echo "<img src='" . $row["photo"] . "'/>";
            
?>
        <div class="touteslescartes">
            <div class="carte">
            <?= "<img class='maison' src='images/".$row["photo"]."' alt='maison'>" ?>
            <p class="categorie"><?= $row["categorie"]?></p>
            <p class="description"><?= $row["description"]?></p>
            <p class="lieu"><?= $row["lieu"]?></p>
            <p class="prix"><?= $row["prix"]?></p>     

        </div>
        </div>
       
        <?php
    }}; 
    ?>

    
