<?php

session_start ();

require_once("connexionbd.php");

$mail = htmlspecialchars ( $_POST [ 'mail' ]);
$mdp = htmlspecialchars ( $_POST [ 'mdp' ]);

$check = $bdd -> prepare ( 'SELECT id, pseudo, mail, mdp FROM connexion WHERE mail = ?' );
$check -> execute ( array ( $mail ));
$data = $check -> fetch ();

if ( $data [ 'mdp' ] === $mdp )
{
    $_SESSION [ 'pseudo' ] = $data [ 'pseudo' ];
    $_SESSION [ 'id' ] = $data [ 'id' ];
  
    header ( 'location:admin.php' );
}
else  header ( 'Location:index.php?login_error' );

?>

