<!DOCTYPE HTML>
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes ventes</h1> 
                <p>BIENVENUE À LA RUBRIQUE MES VENTES. ICI VOUS POUVEZ VISUALISER ET GÉRER L'ENSEMBLE DE VOS VENTES.</p>
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
                        <p><a href="MonCompteInfosPersonelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
            <div class="container">
                <div class="tableau">        
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Numéro</th>
                        <th>Nom Objet</th>
                        <th>Quantité</th>	
                        <th>Prix initial</th>
                        <th>Prix vendu</th>
                        <th>Date de mise en vente</th>	
                        <th>Date de fin</th>	
                      </tr>
                    </thead>
                    <tbody>
    <?php 
        // we are going to get all the objets, then echo them along with some html tags to make the output somewhat visible.
            
        $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
        $login=$_SESSION['ID'];
        $dbquery = pg_query($dbconnexion, "select objets.* from vendre, objets where login='$login' AND vendre.codeobjet = objets.codeobjet AND statut=0;");
        $i=1;
        while ($row = pg_fetch_assoc ($dbquery)) {
            $name = $row['nomobjet'];
            $qtt = $row['quantiteobjet'];
            $prixinitial = $row['prixinitial'];
            $dateMiseEnVente = $row['datedebutenchere'];
            $dateFinEnchere = $row['datefinenchere'];
            $codeObjet = $row['codeobjet'];
            $dbquery2 = pg_query($dbconnexion, "select max(prixencherit), codeobjet from encherir where codeobjet=$codeObjet  group by codeobjet");
            $result2 = pg_fetch_array($dbquery2);
            if ($result2 != null) {
                $prixvendu = $result2[0];
            }
            else {
                $prixvendu = "Invendu";
            }

        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$name</td>";
        echo "<td>$qtt</td>";
        echo "<td>$prixinitial</td>";
        echo "<td>$prixvendu</td>";
        echo "<td>$dateMiseEnVente</td>";
        echo "<td>$dateFinEnchere</td>";
        echo "</tr>";
        $i++;
        }
    ?>	
 	  
                </tbody>
              </table>
            </div>
        </div>


<!--Fin du tableau -->

		
<?php
    include 'overallfooter.php';
?>