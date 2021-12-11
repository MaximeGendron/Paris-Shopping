<?php 
require 'login.php'; 
require 'CreateDB.php';
require 'CreatePanierDB.php';
$DB = new DB();
$panier = new panier($DB);
?>

<!DOCTYPE html>
<html>

<head>
<title>Achat immediat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('.header').height($(window).height());
            });
        </script>

        <div class="overlay"></div>
        <br><br>
        <div class="Titre">
            <h2>Achat Immédiat</h2>
        </div>

        <div class="description2">
        <p><strong>
            Bienvenue dans la section Vente immédiate. Vous trouverez ici les articles proposez par Paris-Shopping à acheter directement. <br><br>
            
            Si un produit vous intéresse, mettez le dans votre panier, et le prix indiqué sera inchangé. C'est un moyen rapide, pratique et sur d'obtenir vos articles préférés. <br><br>

            Bon shopping !<br><br>
        </strong></p> 
    </div>
    </header>

    <br>

    <div class="article2">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="php">
                    <div id="liste1">
                    <a href="Regulier.php"><button class="btn btn-outline-secondary btn-lg">Régulier</button></a><br><br>
                </div>

                   <?php $article = $DB->query('SELECT * FROM article WHERE TypeVente = "Vente immediate" AND  Categorie ="Regulier" '); ?>
                   <?php foreach ($article as $key => $article): ?>

                   <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>

                   <div class="aInformations">
                   <h5><?= $article->Nom ?></a></h5>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>
                   <p><?= $article->Proprio ?>  </p>

                   <div class="aAjoutPanier">
                   <a class="ajoutpanier" href="AjoutPanier.php?id=<?= $article->ID; ?>">
                   <img src="Image/panier2.png" alt="Panier" width="40px">
                   </a>

                   </div>

                   </div>

                    <?php endforeach ?>
                        
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="php">
                    <div id="liste1">
                    <a href="Friperie.php"><button class="btn btn-outline-secondary btn-lg">Friperie</button></a> <br><br></div>

                   <?php $article = $DB->query('SELECT * FROM article WHERE TypeVente = "Vente immediate" AND  Categorie ="Friperie" '); ?>
                   <?php foreach ($article as $key => $article): ?>

                    <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>

                   <div class="aInformations">
                   <h5><?= $article->Nom ?></a></h5>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>
                   <p><?= $article->Proprio ?>  </p>

                   </div>

                   <div class="aAjoutPanier">
                   <a class="ajoutpanier" href="AjoutPanier.php?id=<?= $article->ID; ?>">
                   <img src="Image/panier2.png" alt="Panier" width="40px">
                   </a>
                   </div>

                  <?php endforeach ?>
                        
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="php">
             <div id="liste1">
                    <a href="Luxe.php"><button class="btn btn-outline-secondary btn-lg">Luxe</button></a><br><br>
                </div>

                <?php $article = $DB->query('SELECT * FROM article WHERE TypeVente = "Vente immediate" AND  Categorie ="Luxe" '); ?>
                   <?php foreach ($article as $key => $article): ?>

                    <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>

                   <div class="aInformations">
                   <h5><?= $article->Nom ?></a></h5>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>
                   <p><?= $article->Proprio ?>  </p>

                   </div>

                   <div class="aAjoutPanier">
                   <a class="ajoutpanier" href="AjoutPanier.php?id=<?= $article->ID; ?>">
                   <img src="Image/panier2.png" alt="Panier" width="40px">
                   </a>
                   </div>

                  <?php endforeach ?>


        </div>
    </div>
</div>


</div>

</body>
                    

</html>

<?php require 'Footer.php'; ?>