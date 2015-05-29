<!-- main file -->
<?php
    include 'session.php';
    if (isset($_SESSION["ID"])) { 
        // Check if ID is registered in session var. if yes, that means he previously connected correctly.
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