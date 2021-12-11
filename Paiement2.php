<?php  
require 'CreateDB.php';
require 'CreatePanierDB.php';
$DB = new DB();
$panier = new panier($DB);
if(isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
?>
<?php require 'login.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Paiement2</title>
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
        <a class="navbar-brand" href="Accueil.php">ParisShopping</a>
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
			    ?>               <?php 
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
      <script type="text/javascript">
 $(document).ready(function(){
 $('.header').height($(window).height());
 });
</script>
    
 <div class="overlay"></div>
   <div class="InfoPaiement">
   <form action="InfoLivraison.php"method="post">
    <h3>Informations de paiement :</h3>
    <br>
   <p>
       Veuillez sélectionner votre type de carte de paiement :<br>
       <input type="radio" name="ChoixCarte" value="Visa" /><label for="Visa"><img src="Image/visa.png"  width="50px" ></label>
       <input type="radio" name="ChoixCarte" value="Master-Card" /><label for="Master"><img src="Image/master card logo.png"  width="50px" ></label>
       <input type="radio" name="ChoixCarte" value="American Express" /><label for="American"><img src="Image/american-express.png"  width="50px" ></label>
       <input type="radio" name="ChoixCarte" value="Paypal" /><label for="Visa"><img src="Image/paypal.png"  width="50px" ></label>
   </p>
   <p>
       <label for="numCarte">Votre numero de carte</label> : <input type="text" name="numCarte" id="numCarte" placeholder="Votre numero de carte:" name="" required/>
   </p>
   <p>
       <label for="nomCarte">Votre nom sur la carte</label> : <input type="text" name="nomCarte" id="nomCarte" placeholder="Votre nom:" name="" required />
   </p>
   <p>
       <label for="dateExp">La date d'expiration</label> : <input type="date" name="dateExp" id="dateExp" placeholder="La date d'expiration:" name="" /> 
   </p>
   <p>
       <label for="codeS">Le code de securite</label> : <input type="tel" name="codeS" id="codeS" minlength="3" maxlength="4" placeholder="Le code de securite:" name="" required />
   </p>
  
   <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="Paiement2">
   
</div>

    </form>

     
</body>



</div>
</header>
</body>
</html>

<?php require 'Footer.php'; ?>


