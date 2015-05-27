<!DOCTYPE HTML>
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes Informations Générales</h1> 
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
                        <p><a href="MonCompteInfosPersonelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
		
	<!--Info general -->
		
		<div class="info">
	    <div class="container" style="width:50%;">
        <form role="form" id="inscription" action="SignUp.php" method="post">
            <h3><b><u>Informations Générales</u></b></h3>

            <div class="form-group">
			  <div class="presentation_profil">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id='email' name="email" placeholder="Type your email" required>
			  </div>
            </div>

             <div class="form-group">
              <label for="confirmEmail">Confirmez votre Email:</label>
              <input type="email" class="form-control" id='confirmEmail' name="confirmEmail" oninput="check2(this)" placeholder="Type your email again" required>
            </div>

            <div class="form-group">
              <label for="ID">Identifiant:</label>
              <input type="text" class="form-control" name="ID" placeholder="Type your ID" required>
            </div>

            <div class="form-group">
              <label for="password">Mot de passe:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Type your password" required>
            </div>

            <div class="form-group">
              <label for="confirmPassword">Confirmez votre mot de passe:</label>
              <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" oninput="check(this)" placeholder="Type your password again" required>
            </div>
            
            <script type="text/javascript">
                function check2(input) {
                    if (input.value != document.getElementById('email').value) {
                        input.setCustomValidity('The two email addresses must match.');
                    } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                   }
                }
            </script>
            <script type="text/javascript">
                function check(input) {
                    if (input.value != document.getElementById('password').value) {
                        input.setCustomValidity('The two passwords must match.');
                    } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                   }
                }
            </script>
			<div class="presentation_profil">
            
            <button type="submit" class="btn btn-default" style="margin-bottom:2cm;">Enregistrez</button>
            </div>
        </form>
    </div>

    </div>
	<!-- FIN Info general -->
		
<?php
    include 'overallfooter.php';
?>