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
                <li class="nav-item"><a class="nav-link" href="Panier.php"><img src="Image/panier.png"
                            alt="Panier" width="30 px"></a></li>
                <li class="nav-item"><a class="nav-link" href="VotreCompte.php">Mon Compte</a></li>
            </ul>
        </div>
    </nav>
   <header class="page-header header container-fluid">
    <script type="text/javascript">
        $(document).ready(function(){
            $('.header').height($(window).height());
        });
    </script>

        <div class="overlay">

            <div class="ChoixUtilisateur">
            <h2>Connexion</h2>
                    
                <br><br>
                    <a href="VendeurConnexion.php"><button class="btn btn-outline-secondary btn-lg">Vendeur</button></a>
                 
                    <a href="AdminConnexion.php"><button class="btn btn-outline-secondary btn-lg">Admin</button></a>

                    <a href="AcheteurConnexion.php"><button class="btn btn-outline-secondary btn-lg">Client</button></a>

            </div>
        </div>
        
    </form>
    
    </body>
</html>