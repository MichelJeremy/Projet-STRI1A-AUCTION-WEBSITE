<!DOCTYPE HTML>
<?php
    include 'session.php';
    include 'overallHeader.html';
    include 'menuBar2.php';
?>

		<!--Début du Jumbotron -->
        <div class="container">
            <div class="jumbotron">
                <h1>Mes Enchères Remportées</h1> 
                <p>BIENVENUE À LA RUBRIQUE MES ENCHERES EN COURS. ICI VOUS POUVEZ VISUALISER ET GÉRER L'ENSEMBLE DE VOS ENCHERES REMPORTEES.</p>
                <p></p>
            </div>  
        <!-- Fin du Jumbotron -->
            
            
		<!--Début sous-menu -->
            <ul class="nav nav-tabs">
                <li role="presentation">
                    <a href="MonCompte.php">Menu du compte</a>
                </li>
                <li role="presentation" class="dropdown active">
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
                        <p><a href="MonCompteInfosPersonelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
	<!--Fin sous-menu -->
	
	<!--Debut tableau -->
		<!--Début du tableau -->
	<div class="taille_fenetre2">	
	<div class="container">
	<div class="tableau">        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom Objet</th>
        <th>Prix</th>
        <th>Date d'acquisition</th>
	
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
		
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
		
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
		
      </tr>
	  
	  
	  
    </tbody>
  </table>
</div>
</div>
</div>
		
		
		
		
<?php
    include 'overallfooter.php';
?>