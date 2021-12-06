<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tout Parcourir</title>

    <!--Déclaration bootstrap<-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
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
                <li class="nav-item"><a class="nav-link" href="Notification.php">Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="Image/panier.png"><img src="Image/panier.png" alt="Panier" width="30 px"></a></li>
                <li class="nav-item"><a class="nav-link" href="MonCompte.html">Mon Compte</a></li>
            </ul>
        </div>
    </nav>

    <!-- placer les divs <-->
    <header class="page-header header container-fluid">
    <script type="text/javascript">
        $(document).ready(function(){
            $('.header').height($(window).height());
        });
    </script>
    
    <br>
    <div class="typedevente">
        <h3><strong>Type de ventes : </strong></h3>
        <div id="liste1">
            <li><a href="AchatImmediat.php">Achat immédiat</a></li>
            <li><a href="Transaction.php">Transaction vendeur client</a></li>
            <li><a href="MeilleureOffre.php">Meilleure offre</a></li>
        </div>
    </div>

    <br>
    <div class="TypeArticle">
        <h3>Types de vêtements : </h3>
        <div id="liste2">
            <li><a href="Régulier.php">Régulier</a></li>
            <li><a href="Friperie.php">Friperie</a></li>
            <li><a href="Luxe.php">Luxe</a></li>
        </div>
    </div>


</body>
</html>