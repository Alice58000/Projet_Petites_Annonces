$sql = "SELECT * FROM annonces ";
        foreach ($bdd -> query($sql) as $row) {
   
?>

            <div class="carte">
                <img src='images/<?php echo $row['photo'] ?>'
                    alt="maison" width="550px" height="264px"> 
       
            </div>