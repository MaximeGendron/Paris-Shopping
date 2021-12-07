
<?php

$retour = isset($_POST["retour"])? $_POST["retour"] : "";
    if(isset($_POST['retour']))
    {
        ?>
        <?php
        header('Location: DejacompteAcheteur.php');
        ?>
        <?php
    }
?>