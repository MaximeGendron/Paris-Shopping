<?php  
require 'login.php';
require 'CreateDB.php';
require 'CreatePanierDB.php';
$DB = new DB();
$panier = new panier($DB);
if(isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
?>

<!DOCTYPE html> 
<html>
<head>
<title>Panier</title>
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
    

<div class="article2">
        <div class="Titre">
    <h2>Panier</h2></div>

        <form method="post" action="Panier.php">
        <div class="php2">
        <?php
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $article = array();
        }
        else {
            $article = $DB->query('SELECT * FROM article WHERE ID IN ('.implode(',', $ids). ')');
        }
        foreach($article as $article):
        ?>
        <br>
      
            <div class="aImage">
                <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
            </div>
            <div class="aInformations">
                <h5><?= $article->Nom ?></h5>
                <p><?= $article->Description ?></p>
            </div>
            <div class="aQuantiteP">
                <p>Quantité : 
                    <input type="number" name="panier[quantite][<?= $article->ID;?>]" value="<?= $_SESSION['panier'][$article->ID]; ?>">
                    <input type="submit" value="✓">   
                    <p>Prix unitaire : <?= number_format($article->Prix,2,',',''); ?>€ </p>
                </p>
            </div>
            <div class="aSupprimer">
                <a href="Panier.php?del=<?= $article->ID; ?>"><img src="Image/poubelle.png" alt="Poubelle" width="35"></a>
            </div>
        

        <?php endforeach; ?>
        <br>
        <div class="finPanier">
            <h4 class="titre">Prix total : <?= number_format($panier->total(),2,',',''); ?>€</h4>
        </div>
        
        <div class = "Panier">
            <a href="Paiement.php">Paiement</a>
        </div>

        </div> 
        </form>
        <br>
    </section>

</div>
</body>
</html>

<?php require 'Footer.php'; ?>
