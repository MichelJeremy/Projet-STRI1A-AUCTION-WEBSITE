        <!-- Barre de navigation -->
            


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">Accueil</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li> <a href="SignForm.php">Inscription</a></li>
 
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">

                        <form class="navbar-form navbar-right" action="connexion.php" method="post">
                            <div class="form-group">
                                <li> <input type="text" class="form-control" name="login" placeholder="Login"> </li>
                            </div>
                            <div class="form-group">
                                <li> <input type="password" class="form-control" name="password" placeholder="Password"> </li>
                            </div>
                            <div class="form-group">
                                <li> <input type="submit" class="btn btn-default" name="Submit" value="Connection"> </li>         
                            </div>
                        </form>
                        <?php
                            if ($displayErrorMessage == 1) {
                                echo '<p class="navbar-text pull-right" id="ErrorMsg">Error</p><br/>';
                            }
                        ?>
                    </ul>
                </div>             
            </div>
        </nav> 
        <!-- Fin de la barre de navigation -->


         