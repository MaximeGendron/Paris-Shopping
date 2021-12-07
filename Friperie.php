<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Friperie</title>
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
                <li class="nav-item"><a class="nav-link" href="MonCompte.html">Mon Compte</a></li>
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

    <br>
    <div class="Titre">
    <h2>Friperie</h2></div>

    <div class="description2">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <p><strong>Les vêtements de friperie sont des vêtements d'occasion. Quoi de mieux que Paris-shopping pour leur donner une nouvelle vie ! Entre marques anciennes et vêtements vintage, le toux à un prix unique, cette catégorie a plus d'une merveille à vous offrir. <br><br>

        Vous trouverez ci-dessous les articles triés en fonction de leur type de vente (achat immédiat, transaction vendeur-client ou par enchère. <br><br>

        Bon shopping !<br><br>
    </strong></p> 
    </div>
    </header>

    <br>

    <div class="typedevente">
        <div id="liste1">
            <a href="AchatImmediat.php"><button class="btn btn-outline-secondary btn-lg">Achat immédiat</button></a><br><br>
    </div>
    
    <?php 
    //identifier votre BDD
    $database = "parisshopping";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    ?>

    <?php if ($db_found) {
    	$sql = 'SELECT * FROM article WHERE Categorie = "Friperie" AND  TypeVente ="Vente immediate"';
    	$result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<strong>" . $data['Nom'] . "</strong><br>"; 
                $image = $data['Image'];
                echo "<img src='$image' height='120' width='100'>" . "<br>"; 
                echo $data['Description'] . "<br>";
                echo $data['Prix'] . "€ <br>";
                echo $data['Categorie'] . "<br>";
                echo $data['TypeVente'] . "<br><br>";
                } 
            }else{echo "Articles réguliers en vente immédiate indisponibles pour le moment. <br>";}
    	mysqli_close($db_handle);
        ?>
    </div>
    <br><br>

    <div class="typedevente">
        <div id="liste1">
            <a href="Transaction.php"><button class="btn btn-outline-secondary btn-lg">Transaction vendeur client</button></a> <br><br>
    </div>
    
    <?php 
    //identifier votre BDD
    $database = "parisshopping";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    ?>

    <?php if ($db_found) {
        $sql = 'SELECT * FROM article WHERE Categorie = "Friperie" AND  TypeVente ="Transaction Vendeur-Client"';
        $result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<strong>" . $data['Nom'] . "</strong><br>"; 
                $image = $data['Image'];
                echo "<img src='$image' height='120' width='100'>" . "<br>"; 
                echo $data['Description'] . "<br>";
                echo $data['Prix'] . "€ <br>";
                echo $data['Categorie'] . "<br>";
                echo $data['TypeVente'] . "<br><br>";
                } 
            }else{echo "Articles réguliers en vente immédiate indisponibles pour le moment. <br>";}
        mysqli_close($db_handle);
        ?>
    </div>

    <br><br>
    <div class="typedevente">
        <div id="liste1">
           <a href="MeilleureOffre.php"><button class="btn btn-outline-secondary btn-lg">Meilleure offre</button>
        </a></div>
        <br> Articles réguliers en vente immédiate indisponibles pour le moment. <br>
    </div>
    
    <?php 
    //identifier votre BDD
    $database = "parisshopping";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    ?>

    <?php if ($db_found) {
        $sql = 'SELECT * FROM article WHERE Categorie = "Friperie" AND  TypeVente ="Enchère"';
        $result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<strong>" . $data['Nom'] . "</strong><br>"; 
                $image = $data['Image'];
                echo "<img src='$image' height='120' width='100'>" . "<br>"; 
                echo $data['Description'] . "<br>";
                echo $data['Prix'] . "€ <br>";
                echo $data['Categorie'] . "<br>";
                echo $data['TypeVente'] . "<br><br>";
                } 
        }mysqli_close($db_handle);
        ?>
    </div>
    <br><br>

</body>
</html>

<?php require 'Footer.php'; ?>