<?php require 'login.php'; ?>
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

    <script type="text/javascript">$(document).ready(function()
    { 
        $('.header').height($(window).height());
    });
    </script>

        <div class="overlay">

            <div class="ChoixUtilisateur">
                <form action="login.php" method="post">
                    <table border="2">
                        <h2>Content de vous revoir !</h2>
						<tr>Email<br>
						<input type="text" name="email" placeholder="" size="30"></tr><br><br>
						<tr>Mot de Passe<br>
						<input type="password" name="mdp" placeholder="" size="30"></tr><br><br>
                        
                
                    <div class="Accès">
                    <input type="submit"name="coacheteur" value="Se connecter" size="30"></div><br>
                    <br><div><a href="PageEnvoidemail.php" class="txt">Mot de passe oublié ?</a></div><br>
                


                    </table>
                </form>
                <div class="retourbouton">
                    <input type="submit"name="retour" value="Retour" onclick = "history.back()" ></div><br>
	
            </div>
         </div>

        <?php
    }

    ?>  
    </header>
    </body>
    
</html>
<?php require 'Footer.php'; ?>