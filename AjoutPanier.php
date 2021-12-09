<?php
require 'CreateDB.php';
require 'CreatePanierDB.php';
$DB = new DB();
$panier = new panier($DB);

$json = array('error' => true);

if(isset($_GET['id'])) {
    $article = $DB->query('SELECT ID FROM article WHERE ID=:id', array('id' => $_GET['id']));
    if(empty($article)) {
        $json['message'] = "Ce produit n'existe pas";
    }
    $panier->ajouter($article[0]->ID);
    $json["error"] = false;
    $json["message"] = 'Le produit a bien ete ajoute a votre panier';
}
else {
    $json['message'] = "Vous n'avez pas selectionne de produit a ajouter";
}
echo json_encode($json);

?>

