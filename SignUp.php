<?php
    $pays = $_POST['country'];
    $civilite = $_POST['sex'];
    $prenom = $_POST['givenName'];
    $nom = $_POST['familyName'];
    $birthDate = $_POST['birthDate'];
    $adresse = $_POST['address'];
    $ville = $_POST['city'];
    $CP = $_POST['postalCode'];
    $email = $_POST['email'];
    $ID = $_POST['ID'];
    $password = $_POST['password'];
    $date = date("Y-m-d");
    $telephone = $_POST['phone'];
        
    $adresseComplete = "$adresse $CP $ville, $pays";

    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

    $dbquery = pg_query($dbconnexion, "SELECT COUNT(*) FROM Users WHERE login='$ID';");
    $result = pg_fetch_array($dbquery);
    if ($result[0] == '1') {
        require 'overallHeader.html';
        include 'menuBar.php';
        echo "<p id=ErrorMsg>Erreur : l'ID existe déjà</p>";
        include 'SignForm.php';
        require 'overallfooter.php';
    } else {       
        $dbquery = pg_query($dbconnexion, "INSERT INTO users(login, password, nom, prenom, email, telephone, adresse, date_enregistrement, crédits, birthdate, civilite, pays) VALUES ('$ID', '$password', '$nom', '$prenom', '$email', '$telephone', '$adresseComplete', '$date', '0', '$birthDate', '$civilite', '$pays');");
        require 'overallHeader.html';
        include 'menuBar.php';
        include 'content.php';
        require 'overallfooter.php';
    
    }

?>