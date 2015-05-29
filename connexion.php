<!-- This file is called when a user wants to connect to the database -->
<?php
$ID = trim($_POST['login']);
$password = trim($_POST['password']);
$displayErrorMessage = 0; // used to display an error message on the connexion form

//connexion BDD
$dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

$dbquery = pg_query($dbconnexion, "SELECT COUNT(*) FROM Users WHERE login='$ID' AND password='$password';");
$result = pg_fetch_array($dbquery);
if ($result[0] == 0) {
    require 'overallHeader.html';
    $displayErrorMessage = 1;
    include 'menuBar.php';
    include 'content.php';
    require 'overallfooter.php';
}

else { // result[0] == 1
    include 'session.php';
    $displayErrorMessage = 0;
    $_SESSION["ID"] = "$ID";
    $_SESSION["password"] = "$password";
    require 'overallHeader.html';
    include 'menuBar2.php';
    include 'content.php';
    require 'overallfooter.php';
}

?>