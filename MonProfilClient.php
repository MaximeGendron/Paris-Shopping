<?php require 'login.php'; ?>

<?php $PPClient=$_SESSION['pp'] ;?>
<?php $banniere=$_SESSION['banniere'] ;?>

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
                    echo "<li class='nav-item'><a class='nav-link' href='MonProfilAdmin.php'> MonProfilAdmin</a></li>";
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

            
            <form action="login.php" method="post"> 
            <?php echo " " . "<img src='$banniere' height='100' width='300' " . " ";?><br><br><br>
            <div><h3 class="TitreCompte"> Bienvenue sur votre profil <?php echo"".$_SESSION['prenom'].""; ?>!</h3></div><br>

    
           <?php echo " " . "<img src='$PPClient' height='120' width='100'>" . " ";?><br><br><br>
           <div class="ProfilInformations">
                     
                        <tr><h6>Email du compte:<br></h6>
						<input type="text" name="email" placeholder="" size="30"></tr><br><br>
                        <tr><h6>Envie d'une nouvelle bannière ?<br></h6>
                        <input type="text" name="banniere" placeholder="ex : Image/xxx.png" size="30"><br><br>
                        <tr><h6>Envie d'une nouvelle photo de profil ?<br></h6>
						<input type="text" name="pp" placeholder="ex : image/png" size="30"></tr><br><br></div>

                        <div class="Accès">
                        <input type="submit"name="ajoutpp" value="Ajouter" size="30"></div><br>

            </form>
		        <div class="ProfilInformations">
                <h6><div>Adresse email: <br> <?php echo"".$_SESSION['email'].""; ?> </div><br></h6>
                <h6><div>Nom de famille: <br> <?php echo"".$_SESSION['nom'].""; ?> </div><br></h6>			
                <h6><div>Adresse: <br> <?php echo"".$_SESSION['adresse'].""; ?> </div><br></h6>		
                <h6><div>Adresse de l'image: <br> <?php echo"".$_SESSION['pp'] .""; ?> </div><br></h6>  	
                     
                <h6>Vous souhaitez rechercher un article en ligne? <br><a href="ToutParcourir.php" class="lien">Cliquez ici</a><br></h6><br>				
		        </div>
                <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" onclick = "history.back()" ></div><br>		
			
		    </div>
        </div>
             
            
    </header>

    </body>

    </html>

    <?php require 'Footer.php'; ?>