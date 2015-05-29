<!-- contacts tab of MonCompte -->
<!DOCTYPE HTML>
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

        <!-- ending of navbar -->
		<!--beginning of Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Contact</h1> 
                <p>BIENVENUE À LA RUBRIQUE CONTACT. ICI VOUS POUVEZ TROUVER NOS CONTACTS EN CAS DE PROBLEME.</p>
                <p></p>
            </div>
        <!-- end of Jumbotron -->
            
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
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Mon profil 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <p><a href="MonCompteInfosGenerales.php">Informations générales</a></p>
                        <p><a href="MonCompteInfosPersonnelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation" class="active"><a href="MonCompteVentes.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
	
	<!--Debut page contact -->
	<div class="taille_fenetre">
	<div class="info">
	<div class="container" style="width:50%;">
	
	<h4 id="titre_contact">Envoyez-nous un mail !</h4>
	
	    
		 <form role="form" id="inscription" action="SignUp.php" method="post">
		 
		 <div class="form-group">
			   <div class="contact">
              <label for="familyName">Nom * :</label>
              <input type="text" class="form-control" name="familyName" placeholder="Enter family name" required>
			  </div>
            </div>
		<div class="form-group">
			<label for="email">Email * :</label>
              <input type="email" class="form-control" id='email' name="email" placeholder="Type your email" required>
		</div>
		<div class="form-group">
			<label for="sujet">Sujet * :</label>
              <input type="sujet" class="form-control" id='sujet' name="sujet" placeholder="Enter a subject" required>
		</div>
		<label for="sujet">Message * :</label>
		<textarea class="form-control" rows="10 " placeholder="Enter a message"  ></textarea>
		<div class="presentation_profil">
            
            <button type="submit" class="btn btn-default" style="margin-bottom:2cm;">Envoyer</button>
            </div>
		
		<section id="info_contact">
		<h4 id="titre_contact">Contactez-nous !</h4>
		<div class="contactezNous">
              <span id="TelAdresse">Tel : </span><span id="NumInfoAdr">06 83 15 57 14</span>
              
		</div>
		<div class="contact">
              <span id="TelAdresse">Adresse mail : </span><span id="NumInfoAdr">x3m@gmail.com</span>
              
		

		
		</div>
		</div>
		
	
	</form>
	</div>
            		

		
<?php
    include 'overallfooter.php';
?>