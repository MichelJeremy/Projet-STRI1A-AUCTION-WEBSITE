<!-- Personal informations (MonCompte tab) -->
<!DOCTYPE HTML>
<?php
    include_once 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';

    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
    $login = $_SESSION['ID'];
    $dbquery = pg_query($dbconnexion, "SELECT * FROM Users WHERE login='$login';");
    $result = pg_fetch_assoc($dbquery);
    $pays = $result['pays'];
    $civilite = $result['civilite'];
    $prenom = $result['prenom'];
    $nom = $result['nom'];
    $birthdate = $result['birthdate'];
    $adresse = $result['adresse'];
    $telephone = $result['telephone'];
?>

        <!-- Fin de la barre de navigation -->
		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes Informations Personnelles</h1> 
                <p>BIENVENUE À LA RUBRIQUE MES INFORMATIONS PERSONNELLES. ICI VOUS POUVEZ MODIFIER VOS INFORMATIONS PERSONNELLES.</p>
                <p></p>
            </div>     
        <!-- Fin du Jumbotron -->
		<!--Début sous-menu -->
				<ul class="nav nav-tabs">
                <li role="presentation">
                    <a href="MonCompte.php">Menu du compte</a>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"> Historique personnel 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <p><a href="MonCompteVentes.php">Mes ventes</a></p>
                        <p><a href="MonCompteEncheresRemportees.php">Mes enchères remportés</a></p>
                        <p><a href="MonCompteEncheresPerdues.php">Mes enchères perdues</a></p>
                    </ul>
                </li>
                <li role="presentation" class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Mon profil 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <p><a href="MonCompteInfosGenerales.php">Informations générales</a></p>
                        <p><a href="MonCompteInfosPersonnelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
	
	<!--Info perso -->
		
		<div class="info">
	    <div class="container" style="width:50%;">
        <form role="form" id="inscription" action="MonCompteInfosPersonnelles_action.php" method="post">
            <h3><b><u>Informations personnelles</u></b></h3>
            <div class="form-group ">
			  <div class="presentation_profil">
              <label for="pays">Pays:</label>
              <input type="text" class="form-control" name="country" value="<?php echo $pays;?>" autocomplete="on" placeholder="Enter country" required>
			  </div>
            </div>
			
			<div class="form-group">
            <label for="familyName"> Civilité :</label>
			</br>
            <label class="radio-inline"><input type="radio" name="sex" value="h"<?php if ($civilite == 'h') {echo "checked";}?>  required>Homme</label>
            <label class="radio-inline"><input type="radio" name="sex" value="f"<?php if ($civilite == 'f') {echo "checked";}?> required>Femme</label>
			</div>
            
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="givenName">Prénom:</label>
              <input type="text" class="form-control" name="givenName" value="<?php echo $prenom;?>" placeholder="Enter given name" required>
            </div>

            <div class="form-group">
              <label for="familyName">Nom:</label>
              <input type="text" class="form-control" name="familyName" value="<?php echo $nom;?>" placeholder="Enter family name" required>
            </div>

            <div class="form-group">
              <label for="birthDate">Date de naissance:</label>
              <input type="date" class="form-control" value="<?php echo $birthdate;?>" name="birthDate" required>
            </div>

            <div class="form-group">
              <label for="address">Adresse:</label>
              <input type="text" class="form-control" name="address" value="<?php echo $adresse;?>" placeholder="Enter address" required>
            </div>

            
             <div class="form-group">
              <label for="phone">Téléphone:</label>
              <input type="text" class="form-control" name="phone" value="<?php echo $telephone;?>" placeholder="Enter phone number" required>
            </div>

            
            <div class="presentation_profil">
            <button type="submit" class="btn btn-default" style="margin-bottom:2cm;">Enregistrez</button>
            </div>
			
        </form>
    </div>
	</div>
	<!-- FIN Info perso -->
		
		
		
		
<?php
    include 'overallfooter.php';
?>