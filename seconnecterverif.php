<?php
session_start();
if(!isset($_SESSION ['pseudo']))
header('Emplacement:admin.php');
?>

<?php
if(isset($_SESSION['pseudo'])) {
    echo "Bienvenue" . $_SESSION ['pseudo'] ;
}
         
        

      
      