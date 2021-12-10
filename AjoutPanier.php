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

    <!--Rend la page dynamique, et le fond en plein encran<-->
    <header class="page-header header container-fluid">
    <script type="text/javascript">
        $(document).ready(function(){
            $('.header').height($(window).height());
        });
    </script>

    <?php
    require 'CreateDB.php';
    require 'CreatePanierDB.php';
    $DB = new DB();
    $panier = new panier($DB);

    $json = array('error' => true);
    if(isset($_GET['id'])) {
        $article = $DB->query('SELECT ID FROM article WHERE ID=:id', array('id' => $_GET['id']));
        if(empty($article)) {
            $json['message'] = "Ce produit n'existe pas";
        }
        $panier->ajouter($article[0]->ID);
        $json["error"] = false;
        $json["message"] = 'Le produit a bien ete ajoute a votre panier';

    }
    else {
        $json['message'] = "Vous n'avez pas selectionne de produit a ajouter";
    }

    echo json_encode($json);
    ?>

    <br><br>

    <div class="overlay"></div>
    <div class="Titre">
    <h2>Merci !</h2></div>

    <div class="description3">
        
        <p><strong>
            L'article a bien été ajouté au panier. <br><br>
    </strong></p> 
    <a href="ToutParcourir.php"><button class="btn btn-outline-secondary btn-lg">Retour aux achats</button></a><br><br>
                     <a href="Panier.php"><button class="btn btn-outline-secondary btn-lg">Voir le panier</button></a><br><br>

    </div>

    </header>

</body>
</html>

<?php require 'Footer.php'; ?>