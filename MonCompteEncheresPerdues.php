<!DOCTYPE HTML>
<!-- displays the lost auctions (MonCompte tab) -->
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes Enchères Perdues</h1> 
                <p>BIENVENUE À LA RUBRIQUE MES ENCHERES PERDUES. ICI VOUS POUVEZ VISUALISER ET GÉRER L'ENSEMBLE DE VOS ENCHERES PERDUES.</p>
            </div>     
        <!-- Fin du Jumbotron -->
		<!--Début sous-menu -->
		  <ul class="nav nav-tabs">
                <li role="presentation">
                    <a href="MonCompte.php">Menu du compte</a>
                </li>
                <li role="presentation" class="active dropdown">
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
	
	<!--Début du tableau -->
	<div class="taille_fenetre2">	
	   <div class="container">
	       <div class="tableau">        
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Nom Objet</th>
                            <th>Votre dernière enchère</th>
                            <th>Quantité</th>
                            <th>Date fin enchère</th>
                            <th>Vainqueur de l'enchère</th>
                            <th>Dernière enchère</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
                            $login = $_SESSION['ID'];
                            $i=1;
                            $dbquery = pg_query($dbconnexion, "((select max(prixencherit), codeobjet from encherir where login='$login' group by codeobjet) EXCEPT (select max(prixencherit), codeobjet from encherir group by codeobjet));");
                            while ($row = pg_fetch_assoc($dbquery)) {
                                $codeObjet = $row['codeobjet'];
                                $prix = $row['max'];
                                $dbquery2 = pg_query($dbconnexion, "select * from objets where codeobjet=$codeObjet;");
                                $result2 = pg_fetch_assoc($dbquery2);
                                $date_acquisition = $result2['datefinenchere'];
                                $nomObjet = $result2['nomobjet'];
                                $qtt = $result2['quantiteobjet'];
                                $dbquery2 = pg_query($dbconnexion, "select max(prixencherit), login from encherir where codeobjet=$codeObjet group by codeobjet,login ORDER BY max DESC;");
                                $result2 = pg_fetch_assoc($dbquery2);
                                $winner = $result2['login'];
                                $winnerBid = $result2['max'];
                                //will return each user's max price (cf GROUP BY login) but first line will have the winner 
                                //thanks to ORDER BY max DESC
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>$nomObjet</td>";
                                echo "<td>$prix</td>";
                                echo "<td>$qtt</td>";
                                echo "<td>$date_acquisition</td>";
                                echo "<td>$winner</td>";
                                echo "<td>$winnerBid</td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>

                    </tbody>
                </table>
           </div>
        </div>
    </div>


<!--Fin du tableau -->


		
		
		
		
<?php
    include 'overallfooter.php';
?>