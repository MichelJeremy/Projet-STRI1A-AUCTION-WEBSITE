        <!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome on x3m.com</h1> 
                <p></p>
            </div>     
        <!-- Fin du Jumbotron -->

        <nav class="navbar navbar-default">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catégorie <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" >
                                <?php
                                    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

                                    $dbquery = pg_query($dbconnexion, "SELECT libelleCategorie FROM Categories;");
                                    while ($row = pg_fetch_row($dbquery)) {
                                        echo  "<li><a href=\"#\">$row[0]</a></li>";
                                    }
                                ?>
                            <li><a href="#">Autre</a></li>
                            </ul>
                        </li>
                    </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text"  class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </li>
              </ul>
            </div>
        </nav> <!-- Fin du nav pour afficher catégories + recherche-->
            
        
        <div class="row">
            <h2>Liste des enchères en cours sur le site : </h2>    
        </div>    
            

        <?php
            $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
            $dbquery = pg_query($dbconnexion, "SELECT * FROM objets where statut=1 AND (CURRENT_TIMESTAMP < dateFinEnchere);"); // should be <
            while ($row = pg_fetch_assoc($dbquery)) {
                $i=1;
                $prixInitial = $row['prixinitial'];
                $codeObjet = $row['codeobjet'];
                $url = $row['url'];
                $nomObjet = $row['nomobjet'];
                $dateFinEnchere = $row['datefinenchere'];
                $dbquery2 = pg_query($dbconnexion, "SELECT max(prixEncherit) FROM Encherir WHERE Encherir.codeObjet='$codeObjet';");
                $resultat2 = pg_fetch_array($dbquery2);
                if ($resultat2[0] > $prixInitial) {
                    $prixActuelPlusGrand = $resultat2[0];
                } else {
                    $prixActuelPlusGrand = $prixInitial;
                }
                if ($i % 4 == 1) {
                echo "<div class=row text-center>";
                }
                echo "<div class=\"col-md-3 col-sm-6\">";
                echo "<div class=\"thumbnail\">";
                echo "<img src=\"$url\" alt=\"Aucune image\">";
                echo "<div class=\"caption\">";
                echo "<h3>$nomObjet</h3>";
                echo "<p>Prix actuel : $prixActuelPlusGrand</p>";   
                echo "<p>Fin enchère : $dateFinEnchere</p>";
                echo "<form action=\"Encherir.php\" method=\"post\">";
                echo "<p><input type=\"number\" min=1 class=\"form-control btn-default\" name=\"prix\" placeholder=\"prix proposé\" required></p>";
                echo "<input type=hidden value=$codeObjet name=codeObjet >"; // in order to recognize which auction is sent
                echo "<input type=submit class=\"btn btn-default\" value=\"Envoyer enchère\">";
                echo "<p style=\"margin-top:5px\"><a href=\"#\" class=\"btn btn-default\">Plus d'informations</a></p>";
                echo "</form>";
                echo "</p>";

                echo "</div></div></div>";
                if (($i % 4) == 0) {
                    echo "</div>";
                    echo "<div class=row text-center>";
                }

            }
        function checkTimestamps() {
            $now = date("Y-m-d H:i:s");
            $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
            $dbquery = pg_query($dbconnexion, "SELECT COUNT(*) FROM objets where statut=1 AND (CURRENT_TIMESTAMP > dateFinEnchere);");
            $resultat = pg_fetch_array($dbquery);
            if ($resultat[0] != 0) {
                $dbquery = pg_query($dbconnexion, "SELECT * FROM objets where statut=1 AND (CURRENT_TIMESTAMP > dateFinEnchere);");
                while ($row = pg_fetch_assoc($dbquery)) {
                    $codeObjet = $row['codeobjet'];
                    $dbquery2 = pg_query($dbconnexion, "UPDATE Objets SET statut = '0' WHERE codeObjet = '$codeObjet';");
                    // add mail alert when auction is removed
                    // prototype : doesn't seem to work currently
                    
                    // get the one who sold the item
                    $dbquery3 = pg_query($dbconnexion, "SELECT login FROM Vendre WHERE codeobjet = '$codeObjet';");
                    $result3 = pg_fetch_array($dbquery3);
                    $seller = $result3[0];
                    
                    // get the database line of the seller
                    $dbquery3 = pg_query($dbconnexion, "SELECT * FROM Users WHERE login='$seller';");
                    $result3 = pg_fetch_assoc($dbquery3);
                    $email = $result3['email'];
                    $credits = $result3['crédits'];
                    
                    // We need to get the amount the seller is going to earn
                    // Initial amount the auction was set to
                    $dbquery3 = pg_query($dbconnexion, "SELECT prixInitial FROM Objets WHERE codeObjet=$codeObjet;");
                    $result3 = pg_fetch_array($dbquery);
                    $prixInitial = $result3[0];
                    
                    
                    // Max amount of the bids
                    $dbquery3 = pg_query($dbconnexion, "SELECT max(prixEncherit) FROM Encherir WHERE codeObjet=$codeObjet;");
                    if ($dbquery3 != NULL) {
                        $result3 = pg_fetch_array($dbquery3);
                        $prixMax = $result3[0];
                    } else {
                        $prixMax = 0;
                    }
                    
                    // Aucune enchère n'a été placée sur l'objet
                    if ($prixInitial > $prixMax) {
                        $msg = "One of your items have been removed because noone put a higher bid on it.";
                        $from = "From: x3m.gestion@gmail.com";

                        mail($email, "Item not sold !", $msg, $from);
                        
                    } else {
                        // On récupère les crédits actuels du vendeur
                        $dbquery3 = pg_query($dbconnexion, "SELECT crédits from Users WHERE login='$seller';");
                        $result3 = pg_fetch_array($dbquery3);
                        $credits = $result3[0] + $prixMax;
                        
                        // on met à jour les crédits du vendeur et on envoie un mail.
                        $dbquery3 = pg_query($dbconnexion, "UPDATE Users SET crédits=$credits WHERE login='$seller';");
                        
                        $msg = "Congratulations, you sold an item ! Your new account balance is $credits";
                        $from = "From: x3m.gestion@gmail.com";
                        
                        mail($email, "Item sold !", $msg, $from);
                    }
                    //acc : x3m.gestion@gmail.com
                    //      x3m.gestion1234


                }
            }
        
        }
        
        ?>
        <span id="checkTimestamps"></span>
        
        <script type="text/javascript" language="javascript"> //use same method for timer
            window.setInterval(function(){
                document.getElementById("checkTimestamps").textContent = "<?php checkTimestamps(); ?>"
            },1000);
        </script>
        