<?php

    session_start();

    $EmailClient = isset($_POST["email"])? $_POST["email"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $newmdp = isset($_POST["newmdp"])? $_POST["newmdp"] : "";
    $Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $PseudoVendeur = isset($_POST["pseudovendeur"])? $_POST["pseudovendeur"] : "";

    $Emailvendeur = isset($_POST["emailvendeur"])? $_POST["emailvendeur"] : "";
    $pp = isset($_POST["pp"])? $_POST["pp"] : "";
    $banniere = isset($_POST["banniere"])? $_POST["banniere"] : "";

    $Admin=NULL;
    $NomClient=NULL;
    $Vendeur=NULL;
    
    $database = "parisshopping";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    
        if(isset($_POST['coacheteur']))
        {

        if ($db_found) {
            $sql = "SELECT * FROM client";
            if ($EmailClient != "") 
            {
                    $sql .= " WHERE email LIKE '%$EmailClient%'";

                    if ($mdp != "") 
                    {
                        $sql .= " AND mdp LIKE '%$mdp%'";
                    }
                    

            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) 
            {
                ///Si mdp ou email faux
                ?>
                <?php
                header('Location: DejacompteAcheteur.php');
                ?>
                <?php


            } 
            
            else 
            {
               
                

                $sql = "SELECT nom FROM client WHERE email LIKE '%$EmailClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $NomClient =$data['nom'] ;
                $_SESSION['nom'] = $NomClient;

                $sql = "SELECT prenom FROM client WHERE email LIKE '%$EmailClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PrenomClient =$data['prenom'] ;
                $_SESSION['prenom'] = $PrenomClient;

                $sql = "SELECT adresse FROM client WHERE email LIKE '%$EmailClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $AdresseClient =$data['adresse'] ;
                $_SESSION['adresse'] = $AdresseClient;

                $sql = "SELECT pp FROM client WHERE email LIKE '%$EmailClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PPClient=NULL;
                $PPClient =$data['pp'] ;
                $_SESSION['pp'] = $PPClient;

                $sql = "SELECT banniere FROM client WHERE email LIKE '%$EmailClient%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $banniere=NULL;
                $banniere =$data['banniere'] ;
                $_SESSION['banniere'] = $banniere;
               
                $_SESSION['email'] = $EmailClient;
                $_SESSION['mdp'] = $mdp;


               ///bien connecté
                ?>
                <?php
                header('Location: Accueil.php');
                ?>
                <?php

            }

            }
             
            else 
            {
                echo "<p>Database not found.</p>";
            }
        }
        
        
        

            if(isset($_POST['covendeur']))
            {
            if ($db_found) {
                $sql = "SELECT * FROM vendeur";
                if ($Emailvendeur != "") {
                    $sql .= " WHERE Email LIKE '%$Emailvendeur%'";
                        if ($mdp != "") {
                            $sql .= " AND MDP LIKE '%$mdp%'";
 
                             }
                    }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) 
            {
                ///Si mdp ou email faux
                ?>
                <?php
                header('Location: DejacompteVendeur.php');
                ?>
                <?php


            } 
            
            else 
            {
                
                
                
                $sql = "SELECT Pseudo FROM vendeur WHERE Email LIKE '%$Emailvendeur%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PseudoVendeur =$data['Pseudo'] ;
                $_SESSION['Pseudo'] = $PseudoVendeur;

                $sql = "SELECT MDP FROM vendeur WHERE Email LIKE '%$Emailvendeur%' ";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $PseudoVendeur =$data['MDP'] ;
                $_SESSION['MDP'] = $PseudoVendeur;
                
                $_SESSION['Email'] = $Emailvendeur;

                
                ?>
                <?php
                header('Location: Accueil.php');
                ?>
                <?php

            }

            }
             
            else 
            {
                echo "<p>Database not found.</p>";
            }
        }

        if(isset($_POST['coadmin']))
        {

        if ($db_found) {
            $sql = "SELECT * FROM admin";
            if ($Pseudo != "") 
            {
                    $sql .= " WHERE pseudo LIKE '%$Pseudo%'";

                    if ($mdp != "") 
                    {
                        $sql .= " AND mdp LIKE '%$mdp%'";
                    }
            }
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) 
            {
                ///Si mdp ou email faux
                ?>
                <?php
                header('Location: AdminConnexion.php');
                ?>
                <?php


            } 
            
            else 
            {
                
                
                $_SESSION['pseudo'] = $Pseudo;
                
               ///bien connecté
                ?>
                <?php
                header('Location: Accueil.php');
                ?>
                <?php

            }

            }
             
            else 
            {
                echo "<p>Database not found.</p>";
            }
        }
        if(isset($_POST['reinitmdp']))
        {
            if ($db_found) {
                $sql = "SELECT * FROM client";
                if ($Nom != "") {
                    $sql .= " WHERE nom LIKE '%$Nom%'";
                        if ($Prenom != "") {
                            $sql .= " AND prenom LIKE '%$Prenom%'";
                                if ($EmailClient != "") {
                                    $sql .= " AND email LIKE '%$EmailClient%'";      
                                    if($mdp != "")
                                    {
                                        $sql.= " AND mdp LIKE '%$newmdp'";
                                    }                                  
                                                 }
                                            
                                 
                             }
                    }
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) 
                    {
                        ///Si nom ou prenom ou email faux
                        ?>
                        <?php
                        header('Location: PageEnvoidemail.php');
                        ?>
                        <?php
        
        
                    } 
                    
                    else //si ok pour nom mail et prénom
                    {
                            
                            $sql = "UPDATE client SET mdp = '$newmdp' WHERE email='$EmailClient'";
                            $result =mysqli_query($db_handle, $sql);
                            ?>
                            <?php
                            header('Location: DejacompteAcheteur.php');
                            ?>
                            <?php
                       

                    }
    
                }
                 
                else 
                {
                    echo "<p>Database not found.</p>";
                }


            }


            if(isset($_POST['reinitmdpvendeur']))
        {
            if ($db_found) {
                $sql = "SELECT * FROM vendeur";
                if ($PseudoVendeur != "") {
                    $sql .= " WHERE Pseudo LIKE '%$PseudoVendeur%'";
                        if ($Emailvendeur != "") {
                            $sql .= " AND Email LIKE '%$Emailvendeur%'";
                            if($mdp != "")
                                    {
                                        $sql.= " AND mdp LIKE '%$newmdp'";
                                    }       
  
                             }
                    }
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) == 0) 
                    {
                        ///Si nom ou prenom ou email faux
                        ?>
                        <?php
                        header('Location: PageEnvoidemail.php');
                        ?>
                        <?php
        
        
                    } 
                    
                    else //si ok pour nom mail et prénom
                    {
                            
                            $sql = "UPDATE vendeur SET MDP = '$newmdp' WHERE Email='$Emailvendeur'";
                            $result =mysqli_query($db_handle, $sql);
                            ?>
                            <?php
                            header('Location: DejacompteVendeur.php');
                            ?>
                            <?php
                       

                    }
    
                }
                 
                else 
                {
                    echo "<p>Database not found.</p>";
                }

                

            }


            
                    //crea photo
        if (isset($_POST["ajoutpp"])) {
            if ($db_found) {
        $sql = "SELECT * FROM client "; 
        if ($EmailClient!= "") {
                $sql .= " AND email LIKE '%$EmailClient%'";
                
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
                    $sql = "UPDATE client SET pp ='$pp' WHERE email='$EmailClient'";
                    $result =mysqli_query($db_handle, $sql);
                    $sql = "UPDATE client SET banniere ='$banniere' WHERE email='$EmailClient'";
                    $result =mysqli_query($db_handle, $sql);

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

    mysqli_close($db_handle);
?>
