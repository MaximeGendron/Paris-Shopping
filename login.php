
<?php

    session_start();
    $fichierCSS = "style.css";
    echo "<link rel='stylesheet' type='text/css' href='$fichierCSS'>";
    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $EmailClient = isset($_POST["email"])? $_POST["email"] : "";
    $Adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $newmdp = isset($_POST["newmdp"])? $_POST["newmdp"] : "";
    $Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $Emailvendeur = isset($_POST["emailvendeur"])? $_POST["emailvendeur"] : "";

    $Admin=NULL;
    $Client=NULL;
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
                
                
                $_SESSION['email'] = $EmailClient;
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
                if ($Pseudo != "") {
                    $sql .= " WHERE Pseudo LIKE '%$Pseudo%'";
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

    mysqli_close($db_handle);
?>
