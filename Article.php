<!DOCTYPE html>
<html>
<head>
<title>Paiement</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
    
 <div class="overlay"></div> 
 <div class="InfoArticle">

    <?php

        $database = "parisshopping";

        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        $table_article = array();
        $temp = array();


        session_start();
        if(isset($_SESSION['itemClick']))    
    {
        $item_clique = $_SESSION['itemClick']; 


        if($db_found)
    {
        //On sélectionne tous les items présents dans la table item
        $sql = "SELECT * FROM article";
        $r = mysqli_query($db_handle, $sql);

            $i = 0;
            //On récupère id, nom, catégorie, type de vente et prix de chaque item
            while ($data = mysqli_fetch_assoc($r)) 
            {
                $Nom[$i] = $data['Nom'];
                $Prix[$i] = $data['Prix'];
                $Description[$i] = $data['Description'];
                $Categorie[$i] = $data['Categorie'];
                $TypeVente[$i] = $data['TypeVente'];
                $Image[$i] = $data['Image'];
                $i++;
            }

            //Pour chaque item, on garder en mémoire dans un seul tableau toutes ses données
            for ($u = 0 ; $u < count($Nom) ; $u++)
            { 
                $temp[0] = $Nom[$u]; 
                $temp[1] = $Prix[$u];
                $temp[2] = $Description[$u]; 
                $temp[3] = $Categorie[$u];
                $temp[4] = $TypeVente[$u];
                $temp[5] = $Image[$u];

                $table_article["$Nom[$u]"] = $temp; // Tableau associatif
                //Tous les items sont donc dans $table_article
            }

        $ID_temporaire_item = $item_clique;
        $sql = "SELECT * FROM article WHERE Nom LIKE '$ID_temporaire_item'";
        $result = mysqli_query($db_handle, $sql);

            $Nom ="";
            $Description = "";
            $Prix = "";
            $TypeVente = "";
            $Categorie = "";
            $Image = "";


        if (mysqli_num_rows($result) != 0){
            while ($data = mysqli_fetch_assoc($result) ) 
                    {   //On les récupère
                        $Nom = $data['Nom'];
                        $Description = $data['Description'];
                        $Prix = $data['Prix'];
                        $Categorie = $data['Categorie'];
                        $Image = $data['Image'];

                    }
            }
            }   
    }
?>
                    </div>           
                 </div>
            </header>
        </body>
    </html>

<?php require 'Footer.php'; ?>
