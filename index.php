<?php
    include 'session.php';
    if (isset($_SESSION["ID"])) { 
        // Check if ID is registered in session var. if yes, that means he previously connected correctly.
        // could make database check if ID and password are right again because of security issues
        // but only if we have enough time to do so
        // Connected, display the right menu
        require 'overallHeader.html';
        include 'menuBar2.php';
        include 'content.php';
        require 'overallfooter.php';
        
    }
    else {
        // not connected, display basic menu
        require 'overallHeader.html';
        include 'menuBar.php';
        include 'content.php';
        require 'overallfooter.php';
    }
?>