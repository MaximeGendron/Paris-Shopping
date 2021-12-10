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
                <?php
                if(isset($_SESSION['email'])) //Connecté en client
                {
                    echo ""."<li class='nav-item'><a class='nav-link' href='Panier.php'>". "<img src='Image/panier.png'  width='30'>" ."</a></li>";
                   
                    


                }

                else if(isset($_SESSION['Email'])) ///Connecté en vendeur
                {
                    echo "<li class='nav-item'><a class='nav-link' href='Panier.php'>"."<img src='Image/panier.png'  width='30'>" ."</a></li>";
                     

                }

                else if(isset($_SESSION['pseudo'])) ///Connecté en admin
                {
                    echo "<li class='nav-item'><a class='nav-link' href='Panier.php'>" ."<img src='Image/panier.png'  width='30'>" ."</a></li>";

                }
                else
                {
                     
                }
			    ?>
                <?php 
                if(isset($_SESSION['email'])) //Connecté en client
                {
                    echo ""."<li class='nav-item'><a class='nav-link' href='MonProfilClient.php'>". $_SESSION['prenom']."</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='DeconnexionAcheteur.php'> Déconnexion</a></li>";


                }

                else if(isset($_SESSION['Email'])) ///Connecté en vendeur
                {
                    echo "<li class='nav-item'><a class='nav-link' href='MonProfilVendeur.php'>".$_SESSION['Pseudo']."</a></li>";
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

            
        
            
            <div><h2 class="TitreCompte"> Bienvenue chez vous <br> <?php echo"".$_SESSION['pseudo'].""; ?> !</h2></div><br>

    
          
           <div class="ProfilInformations">
           <form action="loginnew.php" method="post">
                        <tr><h3>Retirer un article du commerce ?<br></h3>
                        <h6>Nom:<br><input type="text" name="nom"  size="30"></h6>       
                        <br>                                              
                        <div class="Accès">
                        <input type="submit"name="supparticleadmin" value="Retirer" size="30"></div><br>

            </form>



            <form action="loginnew.php" method="post">
                        <tr><h3>Retirer vendeur du commerce ?<br></h3>
                        <h6>Pseudo:<br><input type="text" name="pseudovendeur"  size="30"></h6><br> <br>                                                
                        <div class="Accès">
                        <input type="submit"name="suppvendeurparadmin" value="Retirer vendeur du marché" size="30"></div><br>

            </form>
		         
               
		    </div>
            
            <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" onclick = "history.back()" > </div>
                    
                     
          	
			
        </div>
            </div>
             
            
    </header>

    </body>

    </html>

    <?php require 'Footer.php'; ?>