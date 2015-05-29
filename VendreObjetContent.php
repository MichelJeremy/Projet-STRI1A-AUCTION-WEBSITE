
<div class="container" style="width:50%;">
        <form role="form" id="vendreObjet" action="Vente.php" method="post" enctype="multipart/form-data">
            <h3><b><u>Mettez un de vos objets en vente !</u></b></h3>
            
            
            <div class="form-group">
                <div class="controls form-inline">
                    <label for="objectName">Nom de l'objet:</label>
                    <input type="text" class="form-control" name="nomObjet" placeholder="Entrer nom objet" style="width:50%" required>
                    <label for="objectQtt">Quantité:</label>
                    <input type="number" class="form-control" name="qttObjet" style="width:20%" placeholder="0" min="1" required>
                </div>
            </div>
            
             <div class="form-group">
                <label for="file"></label>
                 <input type="file" name="fileToUpload" id="fileToUpload"  required>
            </div>


        <div class="form-group">
        <label for="categories">Catégorie:</label>
            <select name="categorie" class="form-control">
                <?php
                    $dbconnexion = pg_connect("host=localhost port=5432 dbname=Projet_Web user=postgres password=postgres") or die('connection failed'.pg_last_error());

                    $dbquery = pg_query($dbconnexion, "SELECT libelleCategorie FROM Categories;");
                    while ($row = pg_fetch_row($dbquery)) {
                    echo "<option>$row[0]</option>";
                    }
                ?>
                <option>Autre</option>
            </select>
        </div>
      
      
            <div class="form-group">
                <label for="initialPrice">Prix initial:</label>
                <input type="number" class="form-control" name="prixObjet" placeholder="Entrez le prix de départ de l'objet" required>
            </div>

            <div class="form-group">
                <label for="prixAchatImediat">Prix achat immédiat:</label>
                <input type="number" class="form-control" name="prixAchatImmediat" placeholder="Entrez le prix d'achat immédiat" required>
            </div>
            
            <div class="form-group">
                <label for="desc">Description de l'objet (500 caractères autorisés):</label>
                <textarea class="form-control" rows="5" name="descObjet" placeholder="Entrez une description de l'objet" maxlength="500" required></textarea>
            </div>
            
            
            <div class="form-group">
                <label>Durée de l'enchère</label>
                <div class="controls form-inline">
                    <label for="dureeH">Heures:</label>
                    <input type="number" min="0" max="24" value="0" class="form-control" name="dureeH" required>
                    <label for="dureeM">Minutes:</label>
                    <input type="number" min="0" max="59" value="0" class="form-control" name="dureeM" required>
                    <label for="dureeS">Secondes:</label>
                    <input type="number" min="0" max="59" value="0" class="form-control" name="dureeS" required>
                </div>
            </div>


            <button type="submit" name='submit' class="btn btn-default" style="margin-bottom:2cm;">Submit</button>
            
        </form>
    </div>
 </div>
<?php 
    include 'overallFooter.php';
?>