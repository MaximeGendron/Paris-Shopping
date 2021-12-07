<?php

    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Email = isset($_POST["email"])? $_POST["email"] : "";
    $Adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    
    $database = "article";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    

  
    if (isset($_POST["button2"])) {
        if ($db_found) {
    $sql = "SELECT * FROM client "; 
    if ($Nom != "") {
            $sql .= " WHERE nom LIKE '%$Nom%'";
                if ($Prenom != "") {
                    $sql .= " AND prenom LIKE '%$Prenom%'";
                        if ($Email != "") {
                            $sql .= " AND email LIKE '%$Email%'";
                                if ($Adresse != "") {
                                    $sql .= " AND adresse LIKE '%$Adresse%'";
                                        if ($mdp != "") {
                                            $sql .= " AND mdp LIKE '%$mdp%'";
                                         }
                                    }
                         }
                     }
        }
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
        
            echo "<p>Client existe déjà</p>";
        } 
        else 
        {
               // $mdp=password_hash($mdp, PASSWORD_DEFAULT);
                $sql = "INSERT INTO client(nom, prenom, email, adresse, mdp) VALUES('$Nom', '$Prenom', '$Email', '$Adresse', '$mdp')";
                $result =mysqli_query($db_handle, $sql);
                echo "<p>Client ajouté à la base de donnée</p>";
                $sql = "SELECT * FROM client";
                if ($Nom != "") {
                    $sql .= " WHERE nom LIKE '%$Nom%'";
                        if ($Prenom != "") {
                            $sql .= " AND prenom LIKE '%$Prenom%'";
                                if ($Email != "") {
                                    $sql .= " AND email LIKE '%$Email%'";
                                        if ($Adresse != "") {
                                            $sql .= " AND adresse LIKE '%$Adresse%'";
                                                if ($mdp != "") {
                                                    $sql .= " AND mdp LIKE '%$mdp%'";
                                                 }
                                            }
                                 }
                             }
                }
                $result = mysqli_query($db_handle, $sql);
               /* echo "<h2>" . "Informations sur le nouveau client ajouté:" . "</h2>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>" . "nom" . "</th>";
                echo "<th>" . "Prenom" . "</th>";
                echo "<th>" . "Email" . "</th>";
                echo "<th>" . "Adresse" . "</th>";
                echo "<th>" . "mdp" . "</th>";
            
                while ($data = mysqli_fetch_assoc($result)) {
                        echo"bojour";
                        echo "<tr>";
                        echo "<td>" . $data['nom'] . "</td>";
                        echo "<td>" . $data['prenom'] . "</td>";
                        echo "<td>" . $data['email'] . "</td>";
                        echo "<td>" . $data['adresse'] . "</td>";
                        echo "<td>" . $data['mdp'] . "</td>";
                        echo "</tr>";
                }
                echo "</table>";*/
                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/ToutParcourir.php'); exit(); ?>  
                <?php
                }
                
            
    } else

    {
        echo "<p>Database not found.</p>";
    }
}
//fermer la connexion
mysqli_close($db_handle);
?>
