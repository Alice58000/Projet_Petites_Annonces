<?php


require_once("connexionbd.php");
if(!isset($_SESSION['id']))
header('Location:index.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
   

    <title>Petites annonces</title>

</head>
<body>
    
   </html>

 
   <?php
        $id=$_GET['id'];
        if(isset($_POST["titre"]) && isset($_POST["description"]) && isset($_POST["categorie"]) && isset($_POST["prix"]) &&isset($_POST["datepublication"]) &&isset($_POST["lieu"]) && isset($_POST["photo"])) {
            $titre=$_POST["titre"];
            $descripton=$_POST["description"];
            $categorie=$_POST["categorie"];
            $prix=$_POST["prix"];
            $datepublication=$_POST["datepublication"];
            $lieu=$_POST["lieu"];
            $photo=$_POST["photo"];
            $id=$_POST["id"];

            $sql = "UPDATE annonces SET titre='{$titre}', description='{$description}' , categorie='{$categorie}' , prix='{$prix}' , datepublication='{$datepublication}' , lieu='{$lieu}' , photo='{$photo}' WHERE id='{$id}'";
            $h = $bdd->exec($sql);

            header('Location: admin.php');
        }
     else {
         if(!isset($_GET['id']))
         echo "il manque un argument";
     }
     
  ?>

            <h2 class="form"> Mes annonces</h2>
            <div class="formulaire">
            <br>
            <form action="modification.php" method="Post">

            
                <input  type="text" name="titre" placeholder="Titre de l'annonce" required>
                <br> <br>


                <input  type="text" name="description" placeholder="Description de l'annonce" required>
                <br> <br>

                <select class="select" name="categorie" id="categorie" placeholder="Categorie">
                    <option value="">Choisir une option </option>
                    <option value="maison">Maison </option>
                    <option value="appartement">Appartement </option> </select>
                 <!-- <input  type="text" name="categorie" placeholder="" required>  -->
                <br> <br>


                <input  type="text" name="prix" placeholder="Prix" required>
                <br> <br>

                
                <input  type="text" name="datepublication" placeholder="Date de publication" required>
                <br> <br>

                <input  type="text" name="lieu" placeholder="Lieu" required>
                <br> <br>

                <input  type="file" name="photo"  required>
                <br> <br>

                <input type="hidden" name="id" value="<?php if(isset($_GET["id"])) echo $_GET["id"];?>">
               

                 </select>

                <br> <input class="boutonajouter" type="submit" value="Modifier">
                <br> <br>

            </form>



      <script type="text/javascript" language="javascript">
  if (confirm("Vous désirez vraiment modifier?")) {
    alert("oui")
  }
  else {
    alert("non")
  }
</script>