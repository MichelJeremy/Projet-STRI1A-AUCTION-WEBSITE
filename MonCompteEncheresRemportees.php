<!DOCTYPE HTML>
<!-- displays the won auctions (MonCompte tab) -->
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes Enchères Remportées</h1> 
                <p>BIENVENUE À LA RUBRIQUE MES ENCHERES EN COURS. ICI VOUS POUVEZ VISUALISER ET GÉRER L'ENSEMBLE DE VOS ENCHERES REMPORTEES.</p>
                <p></p>
            </div>  
        <!-- Fin du Jumbotron -->
            
            
		<!--Début sous-menu -->
            <ul class="nav nav-tabs">
                <li role="presentation">
                    <a href="MonCompte.php">Menu du compte</a>
                </li>
                <li role="presentation" class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"> Historique personnel 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <p><a href="MonCompteVentes.php">Mes ventes</a></p>
                        <p><a href="MonCompteEncheresRemportees.php">Mes enchères remportés</a></p>
                        <p><a href="MonCompteEncheresPerdues.php">Mes enchères perdues</a></p>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Mon profil 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <p><a href="MonCompteInfosGenerales.php">Informations générales</a></p>
                        <p><a href="MonCompteInfosPersonnelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
	
	<!--Debut tableau -->
		<!--Début du tableau -->
    <div class="taille_fenetre2">	
	   <div class="container">
	       <div class="tableau">        
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Numéro</th>
                        <th>Nom Objet</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Date d'acquisition</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
                            $login = $_SESSION['ID'];
                            $i=1;
                            $dbquery = pg_query($dbconnexion, "((select max(prixencherit), codeobjet from encherir where login='$login' GROUP BY codeobjet) INTERSECT (select max(prixencherit), codeobjet from encherir GROUP BY codeobjet));");
                            while ($row = pg_fetch_assoc($dbquery)) {
                                $codeObjet = $row['codeobjet'];
                                $prix = $row['max'];
                                $dbquery2 = pg_query($dbconnexion, "select * from objets where codeobjet=$codeObjet;");
                                $result2 = pg_fetch_assoc($dbquery2);
                                $date_acquisition = $result2['datefinenchere'];
                                $nomObjet = $result2['nomobjet'];
                                $qtt = $result2['quantiteobjet'];
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>$nomObjet</td>";
                                echo "<td>$prix</td>";
                                echo "<td>$qtt</td>";
                                echo "<td>$date_acquisition</td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
		
		
		
		
<?php
    include 'overallfooter.php';
?>