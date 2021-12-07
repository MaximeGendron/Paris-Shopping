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
   <div class="InfoLivraison">
   <form method="post" action="traitement.php">
    <h3>Informations de livraison :</h3>
    <br>
   <p>
       <label for="nom">Votre nom</label> : <input type="text" name="nom" id="nom" placeholder="Votre nom:" name="" required autofocus /> 
   </p>
   <p>
       <label for="prenom">Votre prenom</label> : <input type="text" name="prenom" id="prenom" placeholder="Votre prenom:" name="" required/>
   </p>
   <p>
       <label for="adresse1">Votre Adresse</label> : <input type="text" name="adresse1" id="adresse1" placeholder="Votre adresse:" name="" required />
   </p>
   <p>
       <label for="adresse2">Votre complement d'adresse</label> : <input type="text" name="adresse2" id="adresse2" placeholder="Votre adresse:" name="" />
   </p>
   <p>
       <label for="ville">Votre Ville</label> : <input type="text" name="ville" id="ville" placeholder="Votre ville:" name="" required />
   </p>
   <p>
       <label for="codeP">Votre Code Postal</label> : <input type="text" name="codeP" id="codeP" placeholder="Votre Code Postal:" name="" required />
   </p>
   <p>
       <label for="pays">Dans quel pays habitez-vous ?</label><br />
       <select name="pays" id="pays">
           <optgroup label="Europe">
               <option value="france">France</option>
               <option value="espagne">Espagne</option>
               <option value="italie">Italie</option>
               <option value="royaume-uni">Royaume-Uni</option>
           </optgroup>
           <optgroup label="Amérique">
               <option value="canada">Canada</option>
               <option value="etats-unis">Etats-Unis</option>
           </optgroup>
           <optgroup label="Asie">
               <option value="chine">Chine</option>
               <option value="japon">Japon</option>
           </optgroup>
       </select>
   </p>
   <p>
       <label for="num">Votre numero de telephone</label> : <input type="tel" name="num" id="num" placeholder="Votre numero:" name="" required />
   </p>
  
   <input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
</div>
</form>




          
        
</body>



</div>
</header>
</body>
</html>

<?php require 'Footer.php'; ?>

