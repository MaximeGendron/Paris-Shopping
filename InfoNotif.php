<?php
   
   if ( isset($_POST['ajoutnotif']) ) {
     
     echo "<h2>" . "Informations sur la notification ajoutée :" . "</h2>";
     echo "<table border='1'>";
     echo "<tr>";
     echo "<th>" . "Categorie" . "</th>";
     echo "<th>" . "Type de Vente" . "</th>";
     echo "<th>" . "Couleur" . "</th>";
     echo "<th>" . "Prix" . "</th>";
     
     echo $_POST['categorie']; 
     echo "<br>";
     echo $_POST['typevente']; 
     echo "<br>";
     echo $_POST['couleur'];
     echo "<br>";
     echo $_POST['prix']; 

     echo "</table>";
 
  }
?>
