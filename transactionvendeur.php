<?php 
require 'CreateDB.php';
$DB = new DB();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>transaction vendeur</title>
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
    <h2>Transaction Vendeur-Client</h2></div>

    <div class="description2">
        
        <p><strong>
            Vous trouverez ici les offres proposés sous vos articles de types transaction vendeur-client<br><br>
            Vous pouvez accepter, refuser et proposer une nouvelle offre. Ce processus peut se répéter 5 fois. <br><br>
            Bon shopping ! <br><br>
    </strong></p> 
    </div>
    </header>

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
                   <p><?= $article->Nom ?></p>
                   <p>Prix initial : <?= $article->Prix ?> € </p>
                   
                   </div>
<?php 


    $database = "parisshopping";
    $db_handle = mysqli_connect('localhost','root','');
    $db_found = mysqli_select_db($db_handle, $database);

    //montant à payer
    $montant = isset($_POST["prix"])? $_POST["prix"]: "";
    if (empty($montant)) {
        $montant = 0.0;
    }

    //traitement
    if ($db_found) {
        $sql = "SELECT * from article WHERE Prix LIKE '$montant'";}
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)){
            echo "Nouveau prix : " . $data['prix'] . '<br>';

        // Echo session (global) variables
        echo "<br>Notre client: " . $_SESSION["Email"];
        echo "<br>Status de son paiement: " . $_SESSION["statutPaiement"];
    
}

//fermer la connexion
mysqli_close($db_handle);
?>
</body>

</html>

<?php require 'Footer.php'; ?>
    