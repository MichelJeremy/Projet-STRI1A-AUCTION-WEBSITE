        <div class="container">
            <div class="jumbotron">
                <h1>Mon compte</h1> 
                <p>BIENVENUE À VOTRE COMPTE. ICI VOUS POUVEZ GÉRER L'ENSEMBLE DE VOS INFORMATIONS PERSONNELLES ET DES ENCHÈRES.</p>
            </div>   
    
        <!-- Fin du Jumbotron -->
		<!--Début sous-menu -->
    
        <div class="taille_fenetre">
            <?php
                $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
                $login=$_SESSION['ID'];
                $dbquery = pg_query($dbconnexion, "SELECT * FROM users WHERE login='$sessionID' ;");
                $result = pg_fetch_assoc($dbquery);
                $email = $result['email'];
                $prenom = $result['prenom']; 
                $nom = $result['nom'];

                $dbquery = pg_query($dbconnexion, "select count(*) from vendre, objets where vendre.codeObjet = objets.codeObjet AND statut=1 AND login='$login';");
                $result = pg_fetch_array($dbquery);
                $amountOfAuctionsActual = $result[0];

                $dbquery = pg_query($dbconnexion, "((select max(prixencherit), codeobjet from encherir where login='toto' GROUP BY codeobjet) INTERSECT (select max(prixencherit), codeobjet from encherir GROUP BY codeobjet));");
                $amountOfAuctionsWon = pg_num_rows($dbquery);

                $dbquery = pg_query($dbconnexion, "((select max(prixencherit), codeobjet from encherir where login='$login' group by codeobjet) EXCEPT (select max(prixencherit), codeobjet from encherir group by codeobjet));");
                $amountOfAuctionsLost = pg_num_rows($dbquery);

                $dbquery = pg_query($dbconnexion, "select count(*) from vendre, objets where login='$login' AND vendre.codeobjet=objets.codeobjet AND statut=0;");
                $result = pg_fetch_array($dbquery);
                $amountOfAuctionsStarted = $result[0];
            ?>
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
                        <p><a href="MonCompteInfosPersonnelles.php">Informations personnelles</a></p> 
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
                     <a id="information" href="EnchereCours.php"><?php echo $amountOfAuctionsActual; ?> objet(s) en vente</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Objet(s) vendu(s) : </span>
                    <a id="information" href="MonCompteVentes.php"><?php echo $amountOfAuctionsStarted; ?> objet(s) mis en vente</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Enchère(s) remportée(s) : </span>
                    <a id="information" href="MonCompteEncheresRemportees.php"><?php echo $amountOfAuctionsWon; ?> enchère(s) remportée(s)</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Enchère(s) perdue(s) : </span>
                    <a id="information" href="MonCompteEncheresPerdues.php"><?php echo $amountOfAuctionsLost; ?> enchère(s) perdue(s)</a>
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
                    <span id="information"><?php echo $email ?></span>
                </p>
                <p>
                    <span class="titre_sous_presentation">Mot de passe : </span>
                    <span id="information">********</span>
                </p>
                <p>
                    <a id="cadre" href="info_perso.html">Informations personnelles</a>
                </p>
                <p>
                    <span class="titre_sous_presentation">Nom : </span>
                    <span id="information"><?php echo $nom ?></span>
                </p>
                <p>
                    <span class="titre_sous_presentation">Prénom : </span>
                    <span id="information"><?php echo $prenom ?></span>
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
                    <span id="information">x3m.gestion@gmail.com</span>
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