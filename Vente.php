<?php
    require 'session.php';
    $nomObjet = $_POST['nomObjet'];
    $quantite = $_POST['qttObjet'];
    $libelleCategorie = $_POST['categorie'];
    $prixDebut = $_POST['prixObjet'];
    $prixAchatImmediat = $_POST['prixAchatImmediat'];
    $dureeH = $_POST['dureeH'];
    $dureeM = $_POST['dureeM'];
    $dureeS = $_POST['dureeS'];
    $description = $_POST['descObjet'];
    $url = $_POST['urlObjet'];
    $ID = $_SESSION['ID'];
    
    date_default_timezone_set('Europe/Paris');
    $now = date("Y-m-d H:i:s");
    $date = new DateTime($now);
    $date->add(new DateInterval("PT".$dureeH."H".$dureeM."M".$dureeS."S")); 
    $dateEnd =$date->format('Y-m-d H:i:s');
    
    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
    
    $dbquery = pg_query($dbconnexion, "SELECT COUNT(*) FROM Objets;");

    $result = pg_fetch_array($dbquery);
    $count=1+$result[0];


    $dbquery = pg_query($dbconnexion, "INSERT INTO objets(codeObjet, nomObjet, quantiteObjet, categorie, url, description, prixInitial, prixAchatImmediat, dateDebutEnchere, dateFinEnchere, statut) VALUES ('$count', '$nomObjet', '$quantite', '$libelleCategorie', '$url', '$description', '$prixDebut', '$prixAchatImmediat', '$now', '$dateEnd', '1');");

    $dbquery = pg_query($dbconnexion, "INSERT INTO Vendre(login, codeObjet) VALUES ('$ID', '$count');");

    require 'overallHeader.html';
    include 'menuBar2.php';

    echo "<h2 class='text-center' id='textToFade'>L'enchère a été lancée avec succès !</h2>";
    include 'VendreObjetContent.php';
    require 'overallfooter.php';
?>