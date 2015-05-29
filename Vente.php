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
    $ID = $_SESSION['ID'];
    $target_dir = "D:/wamp/www/BracketsWS/Projet_Web/img/";
    $target_dir2 = "http://localhost/BracketsWS/Projet_Web/img/";
    $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
    $target_file2 = $target_dir2.basename($_FILES['fileToUpload']['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    //initiate a var that checks that the file can be uploaded
    $check=1;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $check=1;
        // file is an image
    } else {
        $check=0;
        // file is not an image
        }
        
        // Check file size (if >100 ko $check=0)
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $check=0;
    }

    // check extension file (if != jpg, png, jpeg, check=0)
    if($imageFileType != "jpg" && $imageFileType != "jpeg") {
        $check = 0;
    }
        

       
    date_default_timezone_set('Europe/Paris');
    $now = date("Y-m-d H:i:s");
    $date = new DateTime($now);
    $date->add(new DateInterval("PT".$dureeH."H".$dureeM."M".$dureeS."S")); 
    $dateEnd =$date->format('Y-m-d H:i:s');
    
    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
    
    $dbquery = pg_query($dbconnexion, "SELECT COUNT(*) FROM Objets;");

    $result = pg_fetch_array($dbquery);
    $count=1+$result[0];

    if ($check == 1) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $url=$target_file2;
        $dbquery = pg_query($dbconnexion, "INSERT INTO objets(codeObjet, nomObjet, quantiteObjet, categorie, url, description, prixInitial, prixAchatImmediat, dateDebutEnchere, dateFinEnchere, statut) VALUES ('$count', '$nomObjet', '$quantite', '$libelleCategorie', '$url', '$description', '$prixDebut', '$prixAchatImmediat', '$now', '$dateEnd', '1');");

        $dbquery = pg_query($dbconnexion, "INSERT INTO Vendre(login, codeObjet) VALUES ('$ID', '$count');");
        

        require 'overallHeader.html';
        include 'menuBar2.php';

        echo "<h2 class='text-center' id='textToFade'>L'enchère a été lancée avec succès !</h2>";
        include 'VendreObjetContent.php';
        require 'overallfooter.php';
    } else {
        require 'overallHeader.html';
        include 'menuBar2.php';
        echo "<h2 class='text-center' id='textToFade'>Erreur : fichier incorrect</h2>";
        include 'VendreObjetContent.php';
        require 'overallfooter.php';
    }
    
    
?>