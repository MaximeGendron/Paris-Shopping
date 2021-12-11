<?php require 'login.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Notifications</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle ="dropdown" aria-haspopup ="true" aria-expanded ="false">Notifications</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item count" href="#"></a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="Panier.php"><img src="Image/panier.png" alt="Panier" width="30 px"></a></li>

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

    <header class="page-header header container-fluid" style="height: 1000px;">
        
<div class="overlay">
<div class="Notifications">
<div class ="container">
    <div class="row">
        <div class="col-sm-0 col-md-2 col-lg-3"></div>
        <div class="col-sm-12 col-md-8 col-lg-6">


            <h4 style="text-align: center">Barre de recherche</h4>
            <div class="form-group">
                 <input class="form-control" type="text" id="search-user" value="" placeholder="Rechercher un ou plusieurs articles"/>
            </div>
            <div style="margin-top: 20px">
                <div id="result-search"></div>
            </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
    $('#search-user').keyup(function(){
        $('#result-search').html('');

        var utilisateur = $(this).val();

        if(utilisateur != ""){
        $.ajax({
          type: 'GET',
          url: 'recherche_article.php',
          data: 'user=' + encodeURIComponent(utilisateur),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun article</div>"
            }
          }
        });
      }



    });
});
      
  </script>

 
        <h3> Activez les alertes :<h3>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label>    
        <h3>Dès qu'un article correspondra à vos critères, vous en serez alerter.</h3>

           <form action="InfoNotif.php" method="post">   
                        <p><h6> <label>Quelle Catégorie ?</label><br><h6>
                    <select name="categorie">
                         
                            <option value="Luxe">Luxe</option>
                            <option value="Régulier">Régulier</option>
                            <option value="Friperie">Friperie</option>
                                        
                    </select> </p>
                         
                        <p><h6> <label>Quel type de vente  ?</label><br><h6>
                    <select name="typevente">
                         
                            <option value="Vente immediate">Achat-Immediat</option>
                            <option value="Transaction Vendeur-Client">Vendeur-Client</option>
                            <option value="Enchere">Enchere</option>
                                        
                    </select> </p>

                    <label for="couleur">La couleur de l'article recherché ?</label> : <input type="color" name="couleur" id="couleur" />
                                        
                    </select> </p>

                        <p>Veuillez indiquer la fourchette du prix :<br/>
                            <br>
                            <input type="radio" name="prix" value="moins10" id="moins10" /> <label for="moins10">Moins de 10€</label><br/>
                            <input type="radio" name="prix" value="medium10-50" id="medium10-50" /> <label for="medium10-50">10-50€</label><br />
                            <input type="radio" name="prix" value="medium50-100" id="medium50-100" /> <label for="medium50-100">50-100€</label><br />
                            <input type="radio" name="prix" value="medium100-500" id="medium100-500" /> <label for="medium100-500">100-500€</label><br />
                            <input type="radio" name="prix" value="medium500-1000" id="medium500-1000" /> <label for="medium500-1000">500-1000€</label><br />
                            <input type="radio" name="prix" value="plus1000" id="plus1000" /> <label for="plus1000">Plus de 1000€ ?</label>
   </p>
             
</form>
            </form>
                
                        <div class="Accès">
                        <input type="submit"name="ajoutnotif" value="Ajouter" size="30"></div><br>

            </form>    
</div>
</div>

</header>
</body>
</html>

<?php require 'Footer.php'; ?>

