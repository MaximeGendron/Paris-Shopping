<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['Email']);
unset($_SESSION['pseudo']);
header('Location: VotreCompte.php');
?>