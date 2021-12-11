<?php 
require 'CreateDB.php';
$DB = new DB();
?>

<?php
// Set session variables (variables globales)
$_SESSION["Email"] = "";
$_SESSION["statutPaiement"] = "void";
?>

<?php require 'login.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
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
    <script type="text/javascript">
        function gestionDiv(element){
        var  maDiv = document.getElementById(element);
        var  leBouton = document.getElementById('leBouton');
        if(maDiv.style.display == "none"){
            maDiv.style.display = "block";
            leBouton.value ="Masquer";
        }
        else{
            maDiv.style.display = "none";
            leBouton.value ="Voir";
        }
    }


    </script>
    
    <br>
    <br>

    <div class="article2">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="php">
                    <div id="liste1">
                   
                </div>
                    <?php

                    $id=$_GET['id'];
                    $article = $DB->query('SELECT * FROM article WHERE ID ='."$id");

                    foreach ($article as $key => $article);
                    ?>

                   <div class="aImage">
                   <p><img src="Image/<?= $article->ID;?>.png" width="140px"></p>
                   </div>
                        

                   <div class="aInformations">
                   <h5><?= $article->TypeVente ?></h5>
                   <p><?= $article->Nom ?></p>
                   <p><?= $article->Description ?></p>
                   <p><?= $article->Prix ?> € </p>
                   
                   </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12">
                <p> Cet article se vend par Transaction Vendeur-Client. </p>
                <form action="" method="post">

                    <table>
                        <tr>
                            <td>Nouveau prix:</td>
                            <td><input type="number" step="0.01" name="prix"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> 
                                <input type="submit" name="button1" value="Soumettre">
                                
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
</div>


</div>

</body>

</html>

<?php require 'Footer.php'; ?>