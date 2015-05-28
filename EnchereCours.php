<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';

    $login = $_SESSION['ID'];

    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    $dbquery = pg_query($dbconnexion, "SELECT objets.* FROM vendre, objets WHERE STATUT=1 AND objets.codeObjet=vendre.codeObjet AND login='$login';");
?>


    <div class="container">
        <!--Début du Jumbotron -->
        <div class="jumbotron">
            <h1>Visualisez vos enchères actuelles</h1> 
        </div>     
        <!-- Fin du Jumbotron -->

<?php
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

    include 'overallfooter.php';
?>