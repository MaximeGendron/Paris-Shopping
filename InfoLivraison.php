<?php

    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
    $Adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
    $Ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $CodePostal = isset($_POST["codepostal"])? $_POST["codepostal"] : "";
    $Pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $Telephone = isset($_POST["num"])? $_POST["num"] : "";

    $database = "parisshopping";
    //connectez-vous dans BDD
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);



     if (isset($_POST["creationlivraison"])) {
        if ($db_found) {

            
            $sql = "SELECT * FROM livraison";

            if ($Nom != "") {
                $sql .= " WHERE Nom LIKE '%$Nom%'";
                if ($Prenom != "") {
                    $sql .= " AND Prenom LIKE '%$Prenom%'";
                        if ($Adresse1 != "") {
                            $sql .= " AND Adresse1 LIKE '%$Adresse1%'";
                                if ($Adresse2 != "") {
                                    $sql .= " AND Adresse2 LIKE '%$Adresse2%'";
                                        if ($Ville != "") {
                                            $sql .= " AND Ville LIKE '%$Ville%'";
                                                if($CodePostal != ""){
                                                    $sql .= " AND CodePostal LIKE '%$CodePostal%'";
                                                        if($Pays != ""){
                                                            $sql .= " AND Pays LIKE '%$Pays%'";
                                                                if($Telephone != ""){
                                                                    $sql .= " AND Telephone	 LIKE '%$Telephone%'";

                                                                }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }

                
                $result = mysqli_query($db_handle, $sql);

                $sql = "INSERT INTO livraison (nom, prenom, adresse1, adresse2, ville, codepostal, pays, telephone) 
                VALUES('$Nom', '$Prenom', '$Adresse1', '$Adresse2', '$Ville', '$CodePostal', '$Pays', '$Telephone')";
                $result =mysqli_query($db_handle, $sql);
                 

 
                
                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/Paiement2.php'); exit(); ?>  
                <?php
        }
        else

        {
            echo "<p>Database not found.</p>";
        }
    
         
    }

    $TypePaiement = isset($_POST["ChoixCarte"])? $_POST["ChoixCarte"] : "";
    $NumCard = isset($_POST["numCarte"])? $_POST["numCarte"] : "";
    $NomSurCarte = isset($_POST["nomCarte"])? $_POST["nomCarte"] : "";
    $DateExp = isset($_POST["dateExp"])? $_POST["dateExp"] : "";
    $CodeCarte = isset($_POST["codeS"])? $_POST["codeS"] : "";




    if (isset($_POST["Paiement2"])) {
        if ($db_found) {

            
            $sql = "SELECT * FROM paiement";

            if ($TypePaiement != "") {
                $sql .= " WHERE TypeP LIKE '%$TypePaiement%'";
                if ($NumCard != "") {
                    $sql .= " AND Numero LIKE '%$NumCard%'";
                        if ($NomSurCarte != "") {
                            $sql .= " AND Nom LIKE '%$NomSurCarte%'";
                                if ($DateExp != "") {
                                    $sql .= " AND DateExp LIKE '%$DateExp%'";
                                        if ($CodeCarte != "") {
                                            $sql .= " AND Code LIKE '%$CodeCarte%'";
                                                

                                                                }
                                                        }
                                                    }
                                                }
                                            }
                                     

                
                $result = mysqli_query($db_handle, $sql);

                $sql = "INSERT INTO paiement (TypeP, Numero, Nom, DateExp, Code) 
                VALUES('$TypePaiement', '$NumCard', '$NomSurCarte', '$DateExp', '$CodeCarte')";
                $result =mysqli_query($db_handle, $sql);
                 

 
                
                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/Remerciement.php'); exit(); ?>  
                <?php
        }
        else

        {
            echo "<p>Database not found.</p>";
        }
    
         
    }
    
    mysqli_close($db_handle);
    ?>



