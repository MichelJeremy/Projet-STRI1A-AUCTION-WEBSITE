<!-- form treatment file called by personal informations (MonCompte tab) -->
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';

    $login=$_SESSION['ID'];

    $pays = $_POST['country'];
    $civilite = $_POST['sex'];
    $prenom = $_POST['givenName'];
    $nom = $_POST['familyName'];
    $birthDate = $_POST['birthDate'];
    $adresse = $_POST['address'];
    $telephone = $_POST['phone'];
    
     $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    $dbquery = pg_query($dbconnexion, "UPDATE Users SET pays='$pays' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET civilite='$civilite' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET prenom='$prenom' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET nom='$nom' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET birthdate='$birthDate' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET adresse='$adresse' WHERE login='$login';");
    $dbquery = pg_query($dbconnexion, "UPDATE Users SET telephone='$telephone' WHERE login='$login';");

    include 'MonCompteInfosPersonnelles.php';
    include 'overallfooter.php';
?>

    