<?php

    $NewPrix = isset($_POST["newprix"])? $_POST["newprix"] : "";
    $PseudoClient = isset($_POST["pseudoclient"])? $_POST["pseudoclient"] : "";
    $NomArticle= isset($_POST["nomarticle"])? $_POST["nomarticle"] : "";
    $NomVendeur= isset($_POST["nomvendeur"])? $_POST["nomvendeur"] : "";

    $database = "parisshopping";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);


    if (isset($_POST["demanderautreprix"])) {
        if ($db_found) {
        $sql = "SELECT * FROM transaction "; 
        if ($NewPrix != "") {
            $sql .= " WHERE Nouveauprix LIKE '%$NewPrix%'";
                if ($PseudoClient!= "") {
                    $sql .= " AND Pseudoacheteur LIKE '%$PseudoClient%'";
                    
                         }
                     }

        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) {
        
        echo "<p>Prix existe déjà</p>";
        ?> 
                <?php header("Refresh:1");?>  
                <?php
            
        } 
 
        else 
        {
                $sql = "INSERT INTO transaction (Nouveauprix, Pseudoacheteur) VALUES('$NewPrix', '$PseudoClient')";
                $result =mysqli_query($db_handle, $sql);

                $sql = "SELECT Nouveauprix FROM transaction WHERE Pseudoacheteur LIKE '%$PseudoClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PseudoVendeur =$data['Nouveauprix'] ;
                $_SESSION['Nouveauprix'] = $NewPrix;

                $sql = "SELECT Pseudoacheteur FROM transaction WHERE Nouveauprix LIKE '%$NewPrix%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PseudoVendeur =$data['Pseudoacheteur'] ;
                $_SESSION['Pseudoacheteur'] = $PseudoClient;
                
             
                ?> 
               <?php header('Location: http://localhost/Paris-Shopping/DemandePriseEnCompte.php'); exit(); ?>   
                <?php
                }
                
            
    } 
        else

        {
            echo "<p>Database not found.</p>";
        }
    }


    if (isset($_POST["accepterprix"])) {
        if ($db_found) {
     
            $sql = "SELECT * FROM article "; 
            if ($NewPrix != "") {
                $sql .= " WHERE Prix LIKE '%$NewPrix%'";                   
                        if ($NomArticle!= "") {
                            $sql .= " AND Nom LIKE '%$$NomArticle%'";
                            if ($NomVendeur!= "") {
                                $sql .= " AND Proprio LIKE '%$$NomVendeur%'";
                                }
                             }
                         }

                 

               
                $sql = "DELETE FROM transaction WHERE NouveauPrix";
                $result =mysqli_query($db_handle, $sql);
                $sql = "UPDATE article SET Prix ='$NewPrix' WHERE Nom='$NomArticle' AND Proprio='$NomVendeur'";
                $result =mysqli_query($db_handle, $sql);
                
                 

                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/Achat.php'); exit(); ?>  
                <?php
                }
                
            
     
        else

        {
            echo "<p>Database not found.</p>";
        }
    }
    if (isset($_POST["refuserprix"])) {
        if ($db_found) {
     
           
                $sql = "DELETE FROM transaction WHERE Nouveauprix  ";
                $result =mysqli_query($db_handle, $sql);
                
                 

                ?> 
                <?php header('Location: http://localhost/Paris-Shopping/Achat.php'); exit(); ?>  
                <?php
                }
                
            
     
        else

        {
            echo "<p>Database not found.</p>";
        }
    }
    mysqli_close($db_handle);
?>
