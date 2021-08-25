!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="projet.php">

    <title>Petites annonces</title>
</head>


<body>

<?php
$TO = "finot.alice@gmail.com";

$h  = "From: " . $TO;

$message = "";

while (list($key, $val) = each($_POST)) {
  $message .= "$key : $val\n";
}

mail($TO, $subject, $message, $h);

Header("Location: index.php");

?>
   
    <a href="index.php">Retour</a>
    
</body>
</html>