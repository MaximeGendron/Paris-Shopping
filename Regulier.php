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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Régulier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
                <li class="nav-item"><a class="nav-link" href="VotreCompte.php">Mon Compte</a></li>
            </ul>
        </div>
    </nav>

    <!--Rend la page dynamique, et le fond en plein encran<-->
    <header class="page-header header container-fluid">
    <script type="text/javascript">
        $(document).ready(function(){
            $('.header').height($(window).height());
        });
    </script>

    <br><br>

    <div class="overlay"></div>
    <div class="Titre">
    <h2>Vêtements réguliers</h2></div>

    <div class="description2">
        
        <p><strong>Les vêtements réguliers sont des vêtements de toutes marques, à prix abordables, et que l'on trouve régulièrement dans les sites de magasinages concurrents. Paris-shopping vous offre l'opportunité faire une affaire en fonction de leur type de vente. <br><br>
        Vous trouverez ci-dessous les articles triés en fonction de leur type de vente (achat immédiat, transaction vendeur-client ou par enchère. <br><br>
        Bon shopping ! <br><br>
    </strong></p> 
    </div>
    </header>

    <br>

    <div class="article2">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="php">
                    <div id="liste1">
                    <a href="AchatImmediat.php"><button class="btn btn-outline-secondary btn-lg">Achat Immédiat</button></a><br><br>
                </div>

                   <?php $article = $DB->query('SELECT * FROM article WHERE Categorie = "Regulier" AND  TypeVente ="Vente immediate" '); ?>
                   <?php foreach ($article as $key => $article): ?>

                   <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>

                   <div class="aInformations">
                   <h5><a href="Article.php"><?= $article->Nom ?></a></h5>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>

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
                    <a href="Transaction.php"><button class="btn btn-outline-secondary btn-lg">Transaction vendeur client</button></a> <br><br></div>

                   <?php $article = $DB->query('SELECT * FROM article WHERE Categorie = "Regulier" AND  TypeVente ="Transaction Vendeur-Client" '); ?>
                   <?php foreach ($article as $key => $article): ?>

                    <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>

                   <div class="aInformations">
                   <h5><a href="Article.php"><?= $article->Nom ?></a></h5>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>
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
                    <a href="MeilleureOffre.php"><button class="btn btn-outline-secondary btn-lg">Meilleure offre</button></a><br><br>
                </div>
                <p> Les articles de Friperie ne sont pas disponibles en vente par meilleure offre. </p>
        </div>
    </div>
</div>


</div>

</body>

</html>

<?php require 'Footer.php'; ?>