<?php
require_once("connexionbd.php");
?>

<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title> Petites annonces </title>
</head>
<body>
    <header>

    <div class="titrelogo">
        <div class="menu">
     
            <button class="inscription"> <a href="inscription.php">S'inscrire </a> </button>
            <button class="connexion"> <a href="connexion.php">Se connecter </a> </button>

            <button class="admin"> <a href="admin.php">Admin </a> </button>
            
</div>

        <h3 class="titre">
            Petites annonces 
        </h3>

        <img class="logo" src="images/logo2.png" alt="logo">

    </div>
  
    <div>
        <h3 class="accroche">
            Déposer une annonce, c'est gratuit !
        </h3>
    </div>

</div>

<div class="touteslescartes"> 


<!-- <?php


    $sql = "SELECT * FROM annonces";

        foreach ($bdd -> query($sql) as $row) {
   
            echo '<div class="carte">';
            

   ?>


<?= "<img class='maison' src='images/".$row["photo"]."' alt='maison'>" ?>
<p class="categorie"><?= $row["categorie"]?></p>
<p class="description"><?= $row["description"]?></p>
<p class="lieu"><?= $row["lieu"]?></p>
<p class="prix"><?= $row["prix"]?></p>

</div>


      <?php
    } ; 
?> -->


<?php


require_once("connexionbd.php");

// $page = $_GET['page'];
$limite = 10;

// Partie "Requête"
/* On calcule donc le numéro du premier enregistrement */
$page = (!empty($_GET['page']) ? $_GET['page'] : 1);
$debut = ($page - 1) * $limite;
/* On ajoute le marqueur pour spécifier le premier enregistrement */
$sql = 'SELECT * FROM `annonces` LIMIT :limite OFFSET :debut';

    $sql = $bdd->prepare($sql);
    $sql->bindValue('limite', $limite, PDO::PARAM_INT);
    /* On lie aussi la valeur */
    $sql->bindValue('debut', $debut, PDO::PARAM_INT);
    $sql->execute();

        // Partie "Boucle"
        while ($row = $sql->fetch()) {
        // C'est là qu'on affiche les données  :)
        ?>
        <div class="carte">
     <?= "<img class='maison' src='images/".$row["photo"]."' alt='maison'>" ?>
     <p class="categorie"><?= $row["categorie"]?></p>
     <p class="description"><?= $row["description"]?></p>
     <p class="lieu"><?= $row["lieu"]?></p>
     <p class="prix"><?= $row["prix"]?></p>
     
     </div>
     <?php
        }

        // Partie "Liens"
        /* Notez que les liens ainsi mis vont bien faire rester sur le même script en passant
        * le numéro de page en paramètre */
        ?>
</header>

<footer>

<div class="pagination">
        <a href="?page=<?php echo $page - 1; ?>">Page précédente</a>

        <a href="?page=<?php echo $page + 1; ?>">Page suivante</a>
</div>



<!-- <div class="carte">
<img class="maison" src="images/maison.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Une maison ancienne rénovée à 15 min de Nevers avec, au rez-de-chaussée, un salon, un séjour, une cuisine équipée, une salle d’eau et un WC, et à l’étage, 4 chambres, une salle de bains et un WC. Sous-sol et un terrain d’environ 800 m² clos, double garage.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 550€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison2.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Maison sur la commune de Nyon Maison à 15km de Nevers ancienne rénovée d'une surface habitable d'environ 79m2 comprenant cuisine équipée/séjour, salon, chambre, salle d'eau, toilette, buanderie, cave, grange; Terrain d'environ 500m2. Chauffage électrique et bois. 
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 700€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison3.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
<p>
Maison Meublée Bec d'allier Splendide maison ancienne au Bec D'allier 10km de Nevers et 10km du circuit de Magny-Cours. Maison entièrement meublée d'une surface habitable de 120m2. Avec une exceptionnelle vue depuis le balcon sur la Loire. Libre de suite. Chauffage individuel électrique.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 700€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison4.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Une maison ancienne rénovée à 15 min de Nevers avec, au rez-de-chaussée, un salon, un séjour, une cuisine équipée, une salle d’eau et un WC, et à l’étage, 4 chambres, une salle de bains et un WC. Sous-sol et un terrain d’environ 800 m² clos, double garage.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 500€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison5.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
A louer, Nevers, maison T5 en duplex, comprenant au rez de chaussée une entrée, une cuisine équipée, un séjour, une chambre, une salle d'eau et à l'étage, un bureau, deux chambres, une salle de bains avec WC et placards. Une terrasse attenante à la maison. Celle-ci est située dans une rue très calme, proche de tout commerce de proximité, à 10 minutes de Carrefour, proches de l'école 'Les loges' et à 5 minutes de la gare de Nevers. Ce bien est situé sur un très beau terrain de 500 m² clos et arboré. 
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 800€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison6.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Maison indépendante 6 pièces située dans le quartier calme des Montapins avec vue exceptionnelle sur la Loire. Cette maison vous offre une cuisine indépendante, 4 chambres dont une en RDC, une salle d'eau, un WC indépendant, un séjour spacieux et un salon, une terrasse de plus de 30 m², un grenier, une buanderie, une cave et un atelier. Un garage et un jardin. Visite virtuelle disponible.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 600€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison7.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Nous vous présentons ce pavillon sur sous-sol, comprenant un séjour lumineux avec une cheminée et un balcon, une grande cuisine récente entièrement aménagée et équipée, 3 chambres, une salle de bains avec douche et baignoire ainsi qu'un meuble double vasques, des w-c indépendants. Dispose également d'un grand sous-sol avec une arrière cuisine, une cave, un bureau, une salle d'eau avec w-c et un garage. Terrain clos et arboré, portail électrique. Secteur calme et agréable.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 700€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison8.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Maison de caractère en plein centre ville de Nevers, comprenant séjour, salle à manger, wc, cuisine aménagée et équipée (plaques de cuisson, hotte aspirante, four), 4 chambres dont une chambre parentale avec salle d'eau et wc et une chambre à l'étage avec salle d'eau, une salle de bains avec baignoire et douche à l'italienne. En plus Cour et Grande Caves. Chauffage central au gaz.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 600€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison9.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Idéal famille A MAGNY-COURS Maison type 4 de 99 m² comprenant entrée, séjour, cuisine aménagée et équipée, 3 chambres avec placards, salle d'eau avec placard, WC. Garage indépendant. Terrain de 537 m². Jardin et stationnement.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 550€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison10.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Maison sur la commune de Sauvigny-les-bois comprenant au rez de chaussée un séjour, une cuisine, une chambre, un WC et une salle d'eau. A l'étage il y a deux chambres, deux bureaux, un WC et une salle de bain. Cette maison dispose également d'un garage et d'un jardin privatif. 
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 450€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison11.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Maison idéalement située, proche centre ville et de toutes commodités. La maison se compose d’un salon séjour, cuisine demi ouverte ( toute équipée) et d’une chambre. A l’étage il y a une grande chambre avec dressing, salle de bain avec douche et une troisième chambre. Un wc a chaque étage. Garage 2 voitures et terrain clos sans vis à vis. Chauffage au gaz de ville. CDI fortement recommandé.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 750€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison12.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Charmante maison plein pied entièrement rénovée dans un quartier très calme à 2 km du centre-ville de Nevers.
Elle est composée de 3 chambres, d'une cuisine spacieuse, d'une grande pièce de vie (30 m²), d'une salle de bain, d'un WC, d'une buanderie.
Cette maison est accompagnée par un terrain clos de 125 m² et d'un garage indépendant.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 800€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison13.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">

Disponible le 18 août, Au coeur de Nevers, découvrez cette jolie maison de ville à remplir de vie. Au rez-de-chaussée, un séjour, une cuisine équipée, une salle d'eau et une véranda. Au premier étage vous retrouverez deux chambres et un placard. Côté extérieur la maison dispose d'une terrasse et d'une cave. Chauffage central gaz, les charges comprennent l'entretien de la chaudière et les ordures ménagères. N'attendez plus, contactez-nous !
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 500€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison14.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Nous vous proposons a la location ce jolie pavillon de plein pied de 2008 en excellent état comprenant une entrée, couloir avec placard muraux et portes coulissante desservant une cuisine semi équipée et aménagée avec accès au garage ainsi qu'au cellier/buanderie, un salon/séjour avec portes fenêtre donnant directement accès sur la terrasse et le terrain, une salle d'eau, trois chambres, un bureau, un WC séparé. L'ensemble sur un beau terrain d'environ 2000m²
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 500€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/maison15.jpg" alt="maison">
<p class="categorie">Maison</p>
<p class="description">
Loue, Nevers dans quartier très calme, petite maison agrémentée d'un grand terrain, comprenant une cuisine, un séjour avec grande salle de bain et une chambre. Chauffage électrique. Libre à partir de Septembre 2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logomaison.jpg" alt="logo"> 650€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart1.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Idéal étudiant ou mutation Appartement meublé type 2 de 40 m² comprenant entrée, séjour, cuisine ouverte sur le séjour, chambre, salle d'eau avec WC. Libre le 10/09/2021 Loyer 415euros /mois, charges comprises dont 25euros de provision sur charges avec régularisation annuelle.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 300€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart2.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Appartement T3 au 1er étage d'un immeuble comprenant un séjour, une cuisine, 2 chambres, une salle d'eau avec WC. Idéal pour une première location. Contactez-nous si ce bien vous intéresse ! Modalités des charges locatives : Prévisionnelles mensuelles avec régularisation annuelle. Disponible immédiatement
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 550€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart3.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
F2 au 2ème étage d'une résidence avec ascenseur comprenant entrée, séjour avec balcon, cuisine indépendante, salle de bains avec wc, chambre. Stationnement facile et non payant. Libre le 31/08/2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 400€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart4.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Dans une résidence sécurisée F3 lumineux situé au troisième étage sans ascenseur cuisine équipée récente ouverte sur le séjour, salle de bain (baignoire) et 2 chambres.
Place de parking non nominative. Cave de 10 mètres carrés. Un local vélo.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 450€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart5.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Studio en bon état au rdc d'une résidence sécurisée, comprenant entrée, séjour avec placard et canapé lit, coin cuisine équipée (cuisinière, lave-linge, réfrigérateur congélateur), salle de bains avec wc. Cave. Chauffage électrique bi-jonction. Libre le 01/09/2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 300€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart6.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Bel appartement T4 de 70m² proche toutes commodités dans quartier calme, avec cuisine aménagée/semi-équipée, salon, séjour, deux chambres dont une avec placard et salle de douche aménagée. Libre le 06/09/2021 Cave. Stationnement. Loyer 570euros /mois charges comprises dont 35euros de provision sur charges avec régularisation annuelle.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 450€/mois</P>
</div>


<div class="carte">
<img class="maison" src="images/appart7.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
En résidence avec ascenseur, F5 au dernier étage, entièrement rénové, de 99 m², comprenant entrée, séjour double avec balcon, 3 chambres, roberie, salle d'eau, wc, cuisine aménagée et équipée (four, hotte, plaques de cuisson, four micro-ondes, machine à laver, lave-vaisselle). 2 caves. 2 places de parking dont 1 couverte. Chauffage au sol compris dans les charges. En cours de rénovation.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 500€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart8.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Situé en plein centre ville de Nevers. ,IDEAL ETUDIANTS , Agréable studio composé d’un pièce de vie avec kitchenette ( frigo top, plaques de cuisson, divers placards), salle d’eau-wc. ,Les charges comprennent l’eau, l’électricité et le chauffage. Aucune charge supplémentaire.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 300€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart9.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
F3 au 3ème étage de 60 m² en résidence, comprenant entrée, séjour avec balcon, cuisine aménagée et équipée avec balcon, 2 chambres, salle d'eau, wc. Cave. Chauffage collectif gaz (compris dans les charges). Libre le 04/09/2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 400€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart10.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
En résidence avec garage et parking collectif, F5 de 88 m² refait à neuf, comprenant entrée, séjour double de 30 m² avec balcon, cuisine aménagée et équipée (plaques vitrocéramiques et hotte), arrière cuisine, 3 chambres, placard, couloir avec placards aménagés, salle d'eau avec double vasque, wc. Cave. Chauffage individuel gaz (chaudière neuve), électricité neuve et fenêtres double vitrage. Libre le 01/09/2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 550€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart11.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Dans le centre ville de Nevers, un appartement de type 2 se composant d'une entrée avec placard, une cuisine aménagée et équipée, un séjour, une chambre, un dégagement avec placard, un WC indépendant, une salle de bains. Une place de parking et une cave. chauffage individuel électrique.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 400€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart12.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
NEVERS Centre, en résidence calme et sécurisée, très bel appartement comprenant entrée avec placards, 2 chambres dont une avec placard, salle d'eau, wc, séjour lumineux avec balcon, cuisine ouverte aménagée et équipée (plaques vitrocéramiques, four, hotte aspirante, lave-vaisselle, réfrigérateur), cellier. Cave et place de parking. Chauffage collectif compris dans les charges. Libre le 10/10/2021.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 500€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart13.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Au 1er d'un petit immeuble au calme, T3 refait à neuf. Grande pièce à vivre, 2 grandes chambres, placards de rangement, Salle de bain avec baignoire et meuble vasque, WC séparé, buanderie. Interphone. Très bonne isolation. Parking gratuit au pied de l'immeuble.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 450€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart14.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description">
Appartement de type F4 (2 chambres) au 1er étage d'une résidence calme comprenant entrée, séjour double avec balcon, cuisine indépendante, salle de bains, toilettes séparés, deux chambres dont une avec accès au balcon, dressing et placard mural, une cave et place de parking. A 10 min à pied du centre ville. Loyer charges comprises (eau et chauffage).
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 600€/mois</p>
</div>


<div class="carte">
<img class="maison" src="images/appart15.jpg" alt="appart">
<p class="categorie">Appartement</p>
<p class="description" >
Quartier Victor Hugo, vous trouverez cet appartement T2 composé d'une grande pièce de vie, une cuisine meublée et équipée, une chambre, un wc séparé, une salle d'eau avec douche. L'appartement est loué avec une cave. Stationnement facile au pied de l'immeuble. L'appartement est très bien située dans Nevers proche de toutes commodités.
</p>
<p class="lieu">Nevers</p>
<p class="prix">
<img class="logomaison" src="images/logoappart.jpg" alt="logo"> 400€/mois</p>
</div>

</div>
</section>  -->
       
    </footer>


<script src="main.js"></script>
 
</body>
</html>