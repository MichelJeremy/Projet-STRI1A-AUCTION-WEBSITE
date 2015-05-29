<!-- This file is the main template of acheterCredit -->
 <div class="container" style="width:50%;">
        <h2><b><u>Ajoutez des crédits à votre compte</u></b></h2>
            
        <b><h5><p>Votre nombre actuel de crédits : 
            <?php
                $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());
                $sessionID = $_SESSION['ID'];
                $dbquery = pg_query($dbconnexion, "SELECT crédits from Users WHERE login='$sessionID';");
                $result = pg_fetch_array($dbquery);
                echo $result[0];
            ?>
            </p></h5></b>
        <form role="form" action="achat.php" method="post">
            <div class="form-group ">
                <label for="montant">Entrez la quantité de crédits que vous souhaitez ajouter</label>
                <input type="number" min="0" maxlength="20" class="form-control" name="amount" placeholder="Enter amount" required>
            </div>
        
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
            