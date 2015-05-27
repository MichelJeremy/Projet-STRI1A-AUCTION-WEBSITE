        <div class="container">
            <div class="jumbotron">
                <h1>Mon compte</h1> 
                <p>BIENVENUE À VOTRE COMPTE. ICI VOUS POUVEZ GÉRER L'ENSEMBLE DE VOS INFORMATIONS PERSONNELLES ET DES ENCHÈRES.</p>
            </div>   
    
        <!-- Fin du Jumbotron -->
		<!--Début sous-menu -->
    
        <div class="taille_fenetre">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
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
                        <p><a href="MonCompteInfosPersonelles.php">Informations personnelles</a></p> 
                    </ul>
                </li>
                <li role="presentation"><a href="MonCompteContacts.php">Contacts</a></li>
            </ul>
            
	<!--Fin sous-menu -->
            
            <section id="section_historique">
                <div class="presentation_historique">
                    <p>Historique personnel</p>
                </div>
                <div id="firsthr">
                    <hr /> 
                </div>
                <div class="sous-presentation">
                    <p>Gérer vos objets mis en ventes, vos enchères en cours...</p>
                </div>
                    <p>
                        <span class="titre_sous_presentation">Objet(s) en vente : </span>
                        <a id="information" href="MonCompteVentes.php">4 objets en vente</a>
                    </p>
                <p>
                    <span class="titre_sous_presentation">Enchère(s) remportée(s) : </span>
                    <a id="information" href="enchere_remporte.html">Aucune enchère remportée</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Enchère(s) perdue(s) : </span>
                    <a id="information" href="MonCompteEncheresPerdues.php">2 enchères perdues</a>
                </p>
            </section>

            <section id="section_profil">
                <div class="presentation_profil">
                    <p>Mon profil</p>
                </div>
                <div id="firsthr">
                    <hr /> 
                </div>
                <div class="sous-presentation">
                    <p>Gérez les préférences de votre compte et les paramètres des e-mails.</p>
                </div>
                <p><a id="cadre" href="MonCompteInfosGenerales.php">Informations générales</a></p>
                <p>
                    <span class="titre_sous_presentation">Adresse e-mail : </span>
                    <span id="information">xav.tauran@gmail.com</span>
                </p>
                <p>
                    <span class="titre_sous_presentation">Mot de passe : </span>
                    <span id="information">******</span>
                </p>
                <p>
                    <a id="cadre" href="info_perso.html">Informations personnelles</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Nom : </span>
                    <span id="information">Xavier</span>
                </p>
                <p>
                    <span class="titre_sous_presentation">Prénom : </span>
                    <span id="information">TAURAN</span>
                </p>
            </section>	

            <section id="section_contact">
                <div class="presentation_contact">
                    <p>Contact</p>
                </div>
                <div id="firsthr">
                    <hr /> 
                </div>

                <div class="sous-presentation">
                    <p>
                        <a id="cadre" href="MonCompteContacts.php">Contactez-nous !</a>
                    </p>
                </div>
                <p>
                    <span class="titre_sous_presentation">Adresse e-mail : </span>
                    <span id="information">x3m@gmail.com</span>
                </p>
                <p>
                    <span class="titre_sous_presentation">Numéro de téléphone : </span>
                    <span id="information">06 83 15 57 14</span>
                </p>
            </section>
        </div>

    
<?php
    include 'overallfooter.php';
?>