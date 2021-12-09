<?php

    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
    $Adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
    $Ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $CodePostal = isset($_POST["codepostal"])? $_POST["codepostal"] : "";
    $Pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $Telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";

    $database = "parisshopping";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

     if (isset($_POST["creationlivraison"])) {
        if ($db_found) {

            $sql = "INSERT INTO client(nom, prenom, adresse1, adresse2, ville, codepostal, pays, telephone) VALUES('$Nom', '$Prenom', '$Email', '$Adresse1', '$Adresse2', '$Ville', '$CodePostal', '$Pays', '$Telephone')";
                $result =mysqli_query($db_handle, $sql);
                echo "<p>Info de livraison ajouté à la base de donnée</p>";
            $sql = "SELECT * FROM livraison";
             $sql .= " WHERE nom LIKE '%$Nom%'";
                         if ($Prenom != "") {
                    $sql .= " AND prenom LIKE '%$Prenom%'";
                        if ($Adresse1 != "") {
                            $sql .= " AND adresse1 LIKE '%$Adresse1%'";
                                if ($Adresse2 != "") {
                                    $sql .= " AND adresse2 LIKE '%$Adresse2%'";
                                        if ($Ville != "") {
                                            $sql .= " AND ville LIKE '%$Ville%'";
                                            if($CodePostal != ""){
                                                $sql .= " AND codepostal LIKE '%$CodePostal%'";
                                                if($Pays != ""){
                                                    $sql .= " AND pays LIKE '%$Pays%'";
                                                    if($Telephone != ""){
                                                        $sql .= " AND telephone LIKE '%$Telephone%'";
                                                    }
                                                }
                                            }
                                         }
                                    }
                         }
                     }
        }

                }
                $result = mysqli_query($db_handle, $sql);

?> 
                <?php header('Location: http://localhost/Paris-Shopping/Paiement.php'); exit(); ?>

    




mysqli_close($db_handle);
?>