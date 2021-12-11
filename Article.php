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
                   <?php $nomvendeur= $article->Proprio ?>
                   <p><?= $article->Proprio ?> </p>

                   <div class="aAjoutPanier">
                   <a class="ajoutpanier" href="AjoutPanier.php?id=<?= $article->ID; ?>">
                   <img src="Image/panier2.png" alt="Panier" width="40px">
                   </a>
                   </div>
                   

                   </div>
                </div>
            </div>

            
            
            
             <?php 
             if(isset($_SESSION['email']))
             {

              

            echo '<div class="col-lg-4 col-md-4 col-sm-12">';
                echo "<p> Cet article est vendu par : $nomvendeur </p>";
               echo  '<form action="nouveauprix.php" method="post">';

                   echo ' <table>';
                   echo'<tr>';
                   echo'<td>Nouveau prix:</td>';
                   echo'<td><input type="number" step="0.01" name="newprix"></td>';
                   echo' </tr>';
                   echo'<tr>';
                   echo'<td>Votre pseudo:</td>';
                   echo'<td><input type="text" step="0.01" name="pseudoclient"></td>';
                   echo' </tr>';
                   echo'<tr>';
                   echo' <td colspan="2" align="center"> ';
                   echo' <input type="submit" name="demanderautreprix" value="Soumettre">';
                                
                   echo'  </td>';
                   echo'  </tr>';
                   echo'</table>';
                   echo '</form>';
                   echo '</div>';
                } 
            ?>

             
            <?php  
             if(isset($_SESSION['Email']))
             {

              

                echo '<div class="col-lg-4 col-md-4 col-sm-12">';
                
               

                   echo ' <table>';
                   echo'<tr>';
                   
                    

                   $database = "parisshopping";
                   $db_handle = mysqli_connect('localhost', 'root', '');
                   $db_found = mysqli_select_db($db_handle, $database);

                   $NewPrix = isset($_POST["newprix"])? $_POST["newprix"] : "";
                   $PseudoClient = isset($_POST["pseudoclient"])? $_POST["pseudoclient"] : "";

                   if ($db_found) {
                 
                        $sql = "SELECT * FROM transaction "; 
                        if ($NewPrix != "") {
                            $sql .= " WHERE Nouveauprix LIKE '%$NewPrix%'";
                                if ($PseudoClient!= "") {
                                    $sql .= " AND Pseudoacheteur LIKE '%$PseudoClient%'";
                                    
                                         }
                                     }
                
                        $result = mysqli_query($db_handle, $sql);
                         
                 
                         
                            echo "<table border='1'>";
                            echo "<tr>";
                            echo "<th>" . "Prix proposé par le client" . "</th>";
                            echo "<th>" . "Pseudo du client" . "</th>";
                            
                           
                            while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $data['Nouveauprix'] . "</td>";
                            echo "<td>" . $data['Pseudoacheteur'] . "</td>";
                          
                            echo "</tr>";
                            }
                            echo "</table>";
        
                           
                         
                           
                           echo '</div>';
                           echo  '<form action="nouveauprix.php" method="post">';

                           echo"<td><h4> Etes vous ok avec ce que propose le client ? <br><br></h4></td>";

                           echo'<td>Nouveau prix:<br></td>';
                           echo'<td><input type="number" step="0.01"  name="newprix"></td>';
                           echo' </tr>';
                           echo'<tr>';
                           echo'<td><br>Nom article: <br></td>';
                           echo'<td><input type="text" step="0.01" name="nomarticle"></td>';
                           echo' </tr>';
                            ?>
                            <p><h6> <label>Vendeur</label><br><h6>
                            <select name="nomvendeur">
                            <option value="<?php echo"".$_SESSION['Pseudo']."";?>">
                            <?php echo"".$_SESSION['Pseudo'].""; ?></option></select></p>  
                            
                            <?php
                           echo '  <div class="Accès"> <br>';  
                           echo '<input type="submit" name="accepterprix" value="Accepter le prix" size="30"> <br><br> ';         
                           echo '<input type="submit" name="refuserprix" value="Refuser le prix" size="30"></div><br><br> ';     
                           echo '</form>';    

                             
                                
                        
                                
                            
                        } 
                        else
                
                        {
                            echo "<p>Database not found.</p>";
                        }
                        
                        mysqli_close($db_handle);
                    }
                     
                 
            ?>
            
           
             
            </div>


            </div>

</body>

</html>

<?php require 'Footer.php'; ?>