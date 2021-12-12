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
<script type="text/javascript" src="click.js"></script>
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
                <li class="nav-item"><a class="nav-link" href="Promo.php">Promotions</a></li>
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

    <header class="page-header header container-fluid" style="height: 1400px;">


        <div class="overlay">
            
            <div class="ChoixUtilisateur">

            
           
            
            <div><h2 class="TitreCompte"> Vous dirigez ce site web <br> <?php echo"".$_SESSION['pseudo'].""; ?> !</h2></div><br>

    
          
           <div class="ProfilInformations">
           <form action="loginnew.php" method="post">
                    <table border="2">
                        <h3>Créer un nouveau vendeur ?</h3>
						<tr>Pseudo<br>
						<input type="text" name="pseudovendeur" placeholder="" size="30"></tr><br>
						<tr>Email<br>
						<input type="text" name="email" placeholder="" size="30"></tr><br>
                        <tr>Mot de passe<br>
						<input type="password" name="mdp" placeholder="" size="30"></tr><br><br>                        
                    <div class="Accès">
                    <input type="submit" name="creationvendeur" value="Se créer un compte" size="30"></div><br><br>            
                    </table>
                </form>
                <form action="loginnew.php" method="post">
                        <tr><h3>Vendre un nouvel article ?<br></h3>
                        <h6>Nom:<br><input type="text" name="nom"  size="30"></h6><br>     
                        <h6>Description:<br><input type="text" name="description"  size="30"></h6><br>  
                        <h6>Photos:<br><input type="text" name="image"  size="30"></h6><br>                             
                        <h6>Prix:<br><input type="text" name="prix"  size="30"></h6>    
                        <p><h6> <label>Quelle Catégorie ?</label><br><h6>
                    <select name="categorie">
                         
                            <option value="Luxe">Luxe</option>
                            <option value="Regulier">Régulier</option>
                            <option value="Friperie">Friperie</option>
                                        
                    </select> </p>
                         
                        <p><h6> <label>Quel type de vente  ?</label><br><h6>
                    <select name="typevente">
                         
                            <option value="Vente immediate">Achat-Immediat</option>
                            <option value="Transaction Vendeur-Client">Vendeur-Client</option>
                            <option value="Enchere">Enchere</option>
                                        
                    </select> </p>

                    <p><h6> <label>Vendeur</label><br><h6>
                    <select name="pseudo">
                     <option value="<?php echo"".$_SESSION['pseudo'].""; ?>"> <?php echo"".$_SESSION['pseudo'].""; ?></option>"  

                    
                                        
                    </select> </p>
             
                    <div class="Accès">
                        <input type="submit"name="ajoutarticleadmin" value="Ajouter" size="30"></div><br>
                        </form>
            
		    </div>

            <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" onclick = "history.back()" ></div><br>		
                    <div><a href=" MonProfilAdmin2.php"><button class="suivantbouton">Retirer un objet à vendre ou vendeur</button></a></div>
        </div>
         
        
             
            
    </header>

    </body>

    </html>

    <?php require 'Footer.php'; ?>