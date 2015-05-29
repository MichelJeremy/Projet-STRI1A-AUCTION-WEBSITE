<!-- This file is called when a user wants to obtain credits on his account -->

<?php
    include 'session.php';
    $ID = $_SESSION['ID'];
    $amount = $_POST['amount'];
    
    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    $dbquery = pg_query($dbconnexion, "SELECT crédits FROM Users WHERE login='$ID';");
    $act = pg_fetch_array($dbquery);
    $newAmount = $amount + $act[0];
        
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET crédits='$newAmount' WHERE login='$ID';");
    

    require 'overallHeader.html';
    include 'menuBar2.php';
    include 'acheterCreditContent.php';
    require 'overallfooter.php';
?>