<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Regulier</title>
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
                <li class="nav-item"><a class="nav-link" href="Notification.php">Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="Image/panier.png"><img src="Image/panier.png" alt="Panier" width="30 px"></a></li>
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
    <h2>Vêtements réguliers</h2></div>

    <div class="description2">
    	
        <p><strong>Les vêtements réguliers sont des vêtements de toutes marques, à prix abordables, et que l'on trouve régulièrement dans les sites de magasinages concurrents. Paris-shopping vous offre l'opportunité faire une affaire en fonction de leur type de vente. Bon shopping ! <br> </strong></p> 
    </div>

    <?php 
    //identifier votre BDD
    $database = "parisshopping";
    //identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    ?>

     <div class="article">
    <?php if ($db_found) {
    	$sql = 'SELECT * FROM article WHERE Categorie = "Regulier"';
    	$result = mysqli_query($db_handle, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                echo $data['Nom'] . "<br>"; 
                echo $data['Description'] . "<br>";
                echo $data['Prix'] . "<br>";
                echo $data['Categorie'] . "<br>";
                echo $data['TypeVente'] . "<br>";
                $image = $data['Image'];
                echo "<img src='$image' height='120' width='100'>" . "<br>";
                }//end while
                }//end if
                //si le BDD n'existe pas

            ?>
        </div>

    	//fermer la connexion
    	<?php mysqli_close($db_handle); ?>

</body>
</html>