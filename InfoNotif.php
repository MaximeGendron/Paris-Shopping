<?php

    
    $Categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $TypeVente = isset($_POST["typevente"])? $_POST["typevente"] : "";
    $Couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
    $Prix = isset($_POST["prix"])? $_POST["prix"] : "";

    $database = "parisshopping";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);


     if (isset($_POST["ajoutnotif"])) {
        if ($db_found) {

            
            $sql = "SELECT * FROM notification";

                if ($Categorie != "") {
                    $sql .= " WHERE Categorie LIKE '%$Categorie%'";
                        if ($TypeVente != "") {
                            $sql .= " AND TypeVente LIKE '%$TypeVente%'";
                                if ($Couleur != "") {
                                    $sql .= " AND Couleur LIKE '%$Couleur%'";
                                                if($Prix != ""){
                                                    $sql .= " AND Prix LIKE '%$Prix%'";
                                                }
                                            }
                                        }
                                    }
                                
                
                $result = mysqli_query($db_handle, $sql);

                $sql = "INSERT INTO notification (Categorie, TypeVente, Couleur, Prix) 
                VALUES('$Categorie', '$TypeVente', '$Couleur', '$Prix')";
                $result =mysqli_query($db_handle, $sql);
                 
                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/Notif.php'); exit(); ?>  
                <?php
        }
        else
        {
            echo "<p>Database not found.</p>";
        }
         
    }

?>
