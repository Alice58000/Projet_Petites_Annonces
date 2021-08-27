<?php
require_once("connexionbd.php");

$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);

$mdp = htmlspecialchars($_POST['mdp']);
$mdp2 = htmlspecialchars($_POST['mdp2']);

$check = $bdd->prepare('SELECT mail, mdp FROM connexion WHERE mail = ?');
$check->execute(array($mail));
$data = $check->fetch();
$row = $check->rowCount();

if($row == 0)
{       
    if($mdp == $mdp2)
    {
        $bdd->exec("INSERT INTO connexion(pseudo, mail, mdp) VALUES('$pseudo', '$mail', '$mdp')");
        header('Location:index.php');
    }
     else header('Location:error.php?different_password');
}          
 else header('Location:error.php?login_already_exists');
?>

<!-- // formulaire pour se connecter a son espace personnel -->