
<?php

    
    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Email = isset($_POST["email"])? $_POST["email"] : "";
    $Adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $PseudoVendeur = isset($_POST["pseudovendeur"])? $_POST["pseudovendeur"] : "";

    $pp = isset($_POST["pp"])? $_POST["pp"] : "";
    $banniere = isset($_POST["banniere"])? $_POST["banniere"] : "";


    $database = "parisshopping";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    

  
    if (isset($_POST["creationclient"])) {
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
                                            if ($pp != "") {
                                                $sql .= " AND pp LIKE '%$pp%'";
                                                if ($banniere != "") {
                                                    $sql .= " AND banniere LIKE '%$banniere%'";
                                                    
                                                 }

                                             }
                                         }
                                    }
                         }
                     }
        }
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
        
            echo "<p>Client existe déjà</p>";
            ?>
                <?php
                header('Location: AcheteurConnexion.php');
                ?>
                <?php
            
        } 
        else 
        {
               // $mdp=password_hash($mdp, PASSWORD_DEFAULT);
                $sql = "INSERT INTO client(nom, prenom, email, adresse, mdp, pp, banniere) VALUES('$Nom', '$Prenom', '$Email', '$Adresse', '$mdp', '$pp', '$banniere')";
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
                                                    if ($pp != "") {
                                                        $sql .= " AND pp LIKE '%$pp%'";
                                                        if ($banniere != "") {
                                                            $sql .= " AND banniere LIKE '%$banniere%'";
                                                         }
                                                     }
                                                 }
                                            }
                                 }
                             }
                }
                $result = mysqli_query($db_handle, $sql);
                
                ///$NomClient=

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
                <?php header('Location: http://localhost/Paris-Shopping/DejacompteAcheteur.php'); exit(); ?>  
                <?php
                }
                
            
        } 
        else

        {
            echo "<p>Database not found.</p>";
        }
    }
        //crea vendeur
        if (isset($_POST["creationvendeur"])) {
            if ($db_found) {
        $sql = "SELECT * FROM vendeur "; 
        if ($PseudoVendeur != "") {
                $sql .= " WHERE Pseudo LIKE '%$PseudoVendeur%'";
                    if ($Email != "") {
                        $sql .= " AND Email LIKE '%$Email%'";
                            if ($mdp != "") {
                                $sql .= " AND MDP LIKE '%$mdp%'";                                                                     
                             }
                         }
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) != 0) {
            
                echo "<p>Client existe déjà</p>";
                ?>
                    <?php
                    header('Location: VendeurConnexion.php');
                    ?>
                    <?php
                
            } 
            else 
            {
                   // $mdp=password_hash($mdp, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO vendeur(Pseudo, Email, MDP) VALUES('$PseudoVendeur', '$Email', '$mdp')";
                    $result =mysqli_query($db_handle, $sql);
                    echo "<p>Client ajouté à la base de donnée</p>";
                    $sql = "SELECT * FROM vendeur";
                    if ($PseudoVendeur != "") {
                        $sql .= " WHERE Pseudo LIKE '%$PseudoVendeur%'";
                            if ($Email != "") {
                                $sql .= " AND Email LIKE '%$Email%'";
                                    if ($mdp != "") {
                                        $sql .= " AND MDP LIKE '%$mdp%'";                                           
                                     }
                                 }
                    }
                    $result = mysqli_query($db_handle, $sql);
                 
                    ?> 
                    <?php header('Location: http://localhost/Paris-Shopping/VotreCompte.php'); exit(); ?>  
                    <?php
                    }
                    
                
        } 
            else
    
            {
                echo "<p>Database not found.</p>";
            }
        }

    //fermer la connexion
    mysqli_close($db_handle);
?>
