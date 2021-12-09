<?php require 'login.php'; ?>

 

<!DOCTYPE html>
<html>

<head>
<title>ParisShopping</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="styles.css">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

    <body>
    <!--Barre de navigation // A copier sur chaque page<-->
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="Accueil.html">ParisShopping</a>
        <a class="navbar-brand" href="Image/logo.png"></a><img src="Image/logo.png" alt="Logo" width="50 px"></a></li>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Accueil.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="ToutParcourir.php">Tout Parcourir</a></li>
                <li class="nav-item"><a class="nav-link" href="Achat.php">Achat</a></li>
                <li class="nav-item"><a class="nav-link" href="Notif.php">Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="Panier.php"><img src="Image/panier.png" alt="Panier" width="30 px"></a></li>
                <?php 
                if(isset($_SESSION['email'])) //Connecté en client
                {
                    echo ""."<li class='nav-item'><a class='nav-link' href='MonProfilClient.php'>". $_SESSION['prenom']."</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='DeconnexionAcheteur.php'> Déconnexion</a></li>";


                }

                else if(isset($_SESSION['Email'])) ///Connecté en vendeur
                {
                    echo "<li class='nav-item'><a class='nav-link' href='MonProfilVendeur.php'> MonProfilVendeur</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='DeconnexionAcheteur.php'> Déconnexion</a></li>";


                }

                else if(isset($_SESSION['pseudo'])) ///Connecté en admin
                {
                    echo "<li class='nav-item'><a class='nav-link' href='MonProfilAdmin.php'>" .$_SESSION['pseudo']."</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='DeconnexionAcheteur.php'> Déconnexion</a></li>";

                }
                else
                {
                    echo "<li class='nav-item'><a class='nav-link' href='VotreCompte.php'> Se connecter</a></li>";

                }
			    ?> 
            </ul>
        </div>
    </nav>

                    <header class="page-header header container-fluid">
                        <script type="text/javascript">$(document).ready(function(){ $('.header').height($(window).height());});</script>

        <div class="overlay">
            
            <div class="ChoixUtilisateur">

            
           
            
            <div><h2 class="TitreCompte"> Vous dirigez ce site web <br> <?php echo"".$_SESSION['pseudo'].""; ?> !</h2></div><br>

    
          
           <div class="ProfilInformations">
           <form action="loginnew.php" method="post">
                        <tr><h3>Envie d'un nouveau vendeur ?<br></h3>
                        <h6>Pseudo:<br><input type="text" name="Pseudo"  size="30"></h6><br>     
                        <h6>Email:<br><input type="text" name="nom"  size="30"></h6><br>     
                        <div class="Accès">
                        <input type="submit"name="ajoutvendeur" value="Ajouter" size="30"></div><br>
                    </form>
                    <form action="loginnew.php" method="post">
                        <tr><h3>Vendre un nouvel article ?<br></h3>
                        <h6>ID:<br><input type="text" name="id"  size="30"></h6><br>     
                        <h6>Nom:<br><input type="text" name="nom"  size="30"></h6><br>     
                        <h6>Description:<br><input type="text" name="description"  size="30"></h6><br>  
                        <h6>Photos:<br><input type="text" name="photo"  size="30"></h6><br>                             
                        <h6>Prix:<br><input type="text" name="prix"  size="30"></h6><br>   
                        <h6>Catégorie:<br><input type="text" name="catégorie"  size="30"></h6> 
                        <p><h6> <label>Quel type de vente  ?</label><h6>
                    <select name="catégorie" id="pays">
                         
                            <option value="Achat-Immediat">Achat-Immediat</option>
                            <option value="Vendeur-Client">Vendeur-Client</option>
                            <option value="Enchere">Enchere</option>
                                        
                    </select> </p>     
                        <div class="Accès">
                        <input type="submit"name="ajoutarticleadmin" value="Ajouter" size="30"></div><br>

            </form>		    
		    </div>

            <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" onclick = "history.back()" ></div><br>		
			
        </div>
        
             
            
    </header>

    </body>

    </html>

    <?php require 'Footer.php'; ?>