<?php
session_start();
    $fichierCSS = "style.css";
    echo "<link rel='stylesheet' type='text/css' href='$fichierCSS'>";
    $Nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $Prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $Email = isset($_POST["email"])? $_POST["email"] : "";
    $Adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    $newmdp = isset($_POST["newmdp"])? $_POST["newmdp"] : "";
    
    $database = "article";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);


if(isset($_POST['button1']))
    {

        if ($db_found) {
            $sql = "SELECT * FROM client";
            if ($Email != "") 
            {
                    $sql .= " WHERE email LIKE '%$Email%'";

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
            /*echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "ID" . "</th>";
            echo "<th>" . "Titre" . "</th>";
            echo "<th>" . "Auteur" . "</th>";
            echo "<th>" . "Annee" . "</th>";
            echo "<th>" . "Editeur" . "</th>";
            echo "<th>" . "Couverture" . "</th>";
            while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Titre'] . "</td>";
            echo "<td>" . $data['Auteur'] . "</td>";
            echo "<td>" . $data['Annee'] . "</td>";
            echo "<td>" . $data['Editeur'] . "</td>";
            $image = $data['Couverture'];
            echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
            echo "</tr>";
            }
            echo "</table>";*/
                $_SESSION['email'] = $Email;
              echo "Vous êtes bien connecté en tant que :" . "$Email";

              ?>
                <?php
                header('Location: ToutParcourir.php');
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
                                if ($Email != "") {
                                    $sql .= " AND email LIKE '%$Email%'";                                        
                                                 }
                                            
                                 
                             }
                    }
                    $result = mysqli_query($db_handle, $sql);
                    if (mysqli_num_rows($result) == 0) 
                    {
                        ///Si mdp ou email faux
                        ?>
                        <?php
                        header('Location: PageEnvoidemail.php');
                        ?>
                        <?php
        
        
                    } 
                    
                    else 
                    {

                        $_SESSION['email'] = $Email;
                    echo "Vous êtes bien connecté en tant que :" . "$Email";
                        ?>
                        <?php
                        header('Location: ToutParcourir.php');
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

        









 <?php   
/*$Email = isset($_POST["email"])? $_POST["email"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
    
    $erreur = "";
    if ($Email == "") {
    $erreur .= "Le champ email est vide. <br>";
    }
    if ($mdp == "") {
    $erreur .= "Le champ mot de passe est vide. <br>";
    }
 
    if ($erreur == "") {
    echo "Formulaire valide.";
    } 
    else {
    echo  $erreur;
    }

    $db = new PDO('mysql:host=localhost;dbname=article','root', '');

    $sql = "SELECT * FROM client WHERE email = '$Email'";  
    $result = $db->prepare($sql);
    $result->execute();

        if($result->rowCount()>0)
        {
            
            $data = $result->fetchAll();
            
            if(password_verify($mdp, $data[0]["mdp"]))
            {
                echo "Connexion effectuée";
                $_SESSION['email'] = $Email;?>
                <?php
                session_start();
                unset($_SESSION['email']);
                header('Location: VotreCompte.php');
                ?>
                <?php
                
            }
             
        }   
        else
        {
            $mdp=password_hash($mdp, PASSWORD_DEFAULT);
            $sql = "INSERT INTO client(email, motdepasse) VALUES ('$Email, '$mdp')";
            $req = $db->prepare($sql);
            $req->execute();
            echo "Enregistrement effectué";?>
            <?php
            header('Location: DejacompteAcheteur.php');
            ?>
            <?php


        }*/
        ?>