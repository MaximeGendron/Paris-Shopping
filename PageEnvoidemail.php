<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>ParisShopping</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php
    if(isset($_SESSION['email']))
    {
        //echo "Vous êtes connecté en tant que :" . $_SESSION['email'];
        ?>
                <?php
                header('Location: Dejaconnecte.php');
                ?>
                <?php
        
    }
    else
    {
        ?>

        <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="Accueil.php">ParisShopping</a>
        <a class="navbar-brand" href="Panier.php"></a><img src="Image/logo.png" alt="Logo" width="50 px"></a></li>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Accueil.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="ToutParcourir.php">Tout Parcourir</a></li>
                <li class="nav-item"><a class="nav-link" href="Notification.html">Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="Image/panier.png"><img src="Image/panier.png"
                            alt="Panier" width="30 px"></a></li>
                <li class="nav-item"><a class="nav-link" href="VotreCompte.php">Mon Compte</a></li>
            </ul>
        </div>
    </nav>
    <header class="page-header header container-fluid">

    <script type="text/javascript">$(document).ready(function()
    { 
        $('.header').height($(window).height());
    });
    </script>

        <div class="overlay">

            <div class="ChoixUtilisateur">
        
                <form action="login.php" method="post">
                    
                    <table border="2">
                        <h2>Reinitialisez votre mot de passe</h2>
						<tr>Email<br>
						<input type="text" name="email" placeholder="" size="30"></tr><br><br>
                        <tr>Nom<br>
						<input type="text" name="nom" placeholder="" size="30"></tr><br><br>
                        <tr>Prenom<br>
						<input type="text" name="prenom" placeholder="" size="30"></tr><br><br>
                        <tr>Saisir le nouveau mot de passe<br>
						<input type="password" name="newmdp" placeholder="" size="30"></tr><br><br>
                    <div class="Accès">
                    <input type="submit"name="reinitmdp" value="Confirmer le changement de mot de passe" size="30"></div><br>
                    <form action="retour.php" method="post">
                    <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" ></div><br>
                    </form>

                    </table>
                    </form>
                </form>
	
            </div>
         </div>

        <?php
    }

    ?>  

    </body>
</html>