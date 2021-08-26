<?php
$annoncesParPage= 8;
$annoncesTotalesReg= $bdd->query('SELECT id FROM annonces');
$annoncesTotales= $annoncesTotalesReg->rowCount();
$pagesTotales= ceil($annoncesTotales/$annoncesParPage);

if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales){
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
}else{
    $pageCourante = 1;
}


?> 