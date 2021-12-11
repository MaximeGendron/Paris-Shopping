<?php

if ( isset($_POST['ajoutnotif']) ) {
$Categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$TypeVente = isset($_POST["typevente"])? $_POST["typevente"] : "";
$Couleur = isset($_POST["couleur"])? $_POST["couleur"] : "";
$Prix = isset($_POST["prix"])? $_POST["prix"] : "";
$erreur = "";
if ($Categorie == "") {
$erreur .= "Le champ Categorie est vide. <br>";
}
if ($TypeVente == "") {
$erreur .= "Le champ TypeVente est vide. <br>";
}
if ($Couleur == "") {
$erreur .= "Le champ Couleur est vide. <br>";
}
if ($Prix == "") {
$erreur .= "Le champ Prix est vide. <br>";
}
if ($erreur == "") {
echo "Formulaire valide.";
} else {
echo "Erreur: <br>" . $erreur;
}
}
echo "<br>La catégorie choisie est : " . $Categorie;
echo "<br>Le type de vente choisi est : " . $TypeVente;
echo "<br>La couleur choisie est : " . $Couleur;
echo "<br>Le prix est : " . $Prix;

?>
