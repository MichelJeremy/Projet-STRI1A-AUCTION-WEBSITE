<?php
    include 'session.php';
    $prix = $_POST['prix'];
    $codeObjet = $_POST['codeObjet'];

    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    // get the initial price of the item
    $dbquery = pg_query($dbconnexion, "SELECT prixInitial FROM Objets WHERE codeObjet=$codeObjet;");
    $result = pg_fetch_array($dbquery);
    $prixInitial = $result[0];
    $prixAct = $prixInitial;

    // get the max bid on the item if there is one. Then, compare it to initial price (should be greater if there is, but we still chack incase there is an error somewhere)
    $dbquery = pg_query($dbconnexion, "SELECT max(prixEncherit) FROM Encherir WHERE codeObjet=$codeObjet;");
    while ($row = pg_fetch_assoc($dbquery)) {
        $prix2 = $row['max'];
        if ($prix2 > $prixInitial) {
            $prixAct = $prix2;
        }
    }
    
    // If price entered is greater than actual max bid, enter IF test which is going to process the auction system
    if ($prix > $prixAct) {
        
        // First we want to check that the one who tries to bid isn't the one who sold the item
        $dbquery = pg_query($dbconnexion, "select login from vendre where codeObjet = $codeObjet;");
        $result = pg_fetch_array($dbquery);
        if ($result[0] == $_SESSION['ID']) {
            include 'overallHeader.html';
            include 'menuBar2.php';
            include 'content.php';
            require 'overallfooter.php';
            exit;
        }
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
       
        $dbquery = pg_query($dbconnexion, "UPDATE Users SET crédits = $creditApres WHERE login='$login';");
    }

    include 'overallHeader.html';
    include 'menuBar2.php';
    include 'content.php';
    require 'overallfooter.php';

?>

