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
    
    


<!--     
   // Vérifier si le formulaire est soumis 

     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */ -->

       <script type="text/javascript" language="javascript">
  if (confirm("Vous désirez vraiment supprimer?")) {
    alert("oui")
  }
  else {
    alert("non")
  }
</script>


 <?php
       echo ("<script LANGUAGE='JavaScript'>
       window.alert('La suppression a bien fonctionné');
       window.location.href='admin.php';
       </script>");
   ?>
   <?php
   //Tu recuperes l'id du contact
   $id = $_GET["id"];
   //Requete SQL pour supprimer le contact dans la base
       $bdd->exec("DELETE FROM annonces WHERE id = '$id'" );

       

   //Et la tu rediriges vers ta page  pour rafraichir la liste
?>
