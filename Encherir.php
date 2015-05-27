<?php
    include 'session.php';
    $prix = $_POST['prix'];
    $codeObjet = $_POST['codeObjet'];

    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    $dbquery = pg_query($dbconnexion, "SELECT prixInitial FROM Objets WHERE codeObjet=$codeObjet;");
    $result = pg_fetch_array($dbquery);
    $prixInitial = $result[0];
    $prixAct = $prixInitial;

    $dbquery = pg_query($dbconnexion, "SELECT max(prixEncherit) FROM Encherir WHERE codeObjet=$codeObjet;");
    while ($row = pg_fetch_assoc($dbquery)) {
        $prix2 = $row['max'];
        if ($prix2 > $prixInitial) {
            $prixAct = $prix2;
        }
    }
    
    if ($prix > $prixAct) {
        $now = date("Y-m-d H:i:s");
        $login = $_SESSION['ID'];
        $dbquery = pg_query($dbconnexion, "SELECT crédits FROM users WHERE login='$login';");
        $result = pg_fetch_array($dbquery);
        $credits = $result[0];
        $creditApres = $credits - $prix;
        if ($creditApres < 0) {
            include 'overallHeader.html';
            include 'menuBar2.php';
            include 'content.php';
            require 'overallfooter.php';
            exit;
        }
        $dbquery = pg_query($dbconnexion, "INSERT INTO Encherir(login, codeObjet, prixEncherit, dateEncherit) VALUES ('$login', '$codeObjet', '$prix', '$now');");
       
        $dbquery = pg_query($dbconnexion, "UPDATE Users SET crédits = $creditApres;");
    }

    include 'overallHeader.html';
    include 'menuBar2.php';
    include 'content.php';
    require 'overallfooter.php';

?>

