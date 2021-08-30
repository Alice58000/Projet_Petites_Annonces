    <form method="POST" action="index.php">
          
                <div class="recherche">
           
                </div>
                <div class="recherche"><label>Tous les biens</label><input type="radio" name="categorie" value="Tous" checked/></div>
                <div class="recherche"><label>Maison</label><input type="radio" name="categorie" value="maison"/></div>
                <div class="recherche"><label>Appartement</label><input type="radio" name="categorie" value="appartement"/></div>
                <input type="submit" value="Rechercher"/>
                <br/>
            
        </form>
        
        <?php
            if(isset($_POST['recherche']))
            {
                $recherche = htmlspecialchars($_GET['recherche']);
                $categorie = $_POST['categorie'];
                if($categorie == 'Tous')
                {
                    require_once('connexionbd.php');

                    $sql = "SELECT * FROM annonces INNER JOIN connexion ON id = id WHERE categorie LIKE '%$recherche%'";
                    $var_temp = $bdd->prepare($sql);
                    $var_temp->execute();

                    while ($row = $var_temp ->fetch())
                    {
                       
                        echo "<div class='carte'>";
                        echo "<p>" . $row["titre"] . "</p>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<p>" . $row["categorie"] . "</p>";
                        echo "<p>" . $row["prix"] . "</p>";
                        echo "<p>" . $row["datepublication"] . " € </p>";
                        echo "<p>" . $row["lieu"] . "</p>";
                        echo "<img src=" . $row["photo"] . "</p>";
                      
                      
                        
                    }
                    
                    $var_temp ->closeCursor();
                }}

        ?>
