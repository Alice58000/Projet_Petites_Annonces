<?php

$serveurname="localhost";
$dbname="projet_petites_annonces";
$username="root";
$password="";

try {
    $bdd= new PDO("mysql:host=$serveurname;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}
catch(PDOException $e) {
echo 'connexion failed:' . $e->getMessage();
}
?>