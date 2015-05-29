<!-- navigation bar - should only be used while connected, will throw a bunch of errors otherwise (ie. php session var not set) -->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">Accueil</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li> <a href="EnchereCours.php">Enchères en cours</a></li>
                        <li> <a href="VendreObjet.php">Vendre objet</a></li>
                        <li> <a href="acheterCredit.php">Acheter crédits</a></li>
                        <li> <a href="MonCompte.php">Mon compte</a></li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">    
                        <li> <p class="IDco navbar-text" href="index.php">
                            <?php
                                $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
                                $sessionID = $_SESSION['ID'];
                                $dbquery = pg_query($dbconnexion, "SELECT crédits from Users WHERE login='$sessionID';");
                                $result = pg_fetch_array($dbquery);
                                echo "Crédits possédés : $result[0] crédits";
                            ?></a>
                        </li>
                        <li> <a href="disconnection.php">Déconnexion<?php echo " (".$_SESSION['ID'].")"; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>