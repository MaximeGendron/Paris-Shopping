<?php
/*class Panier{

	public function __construct(){
		  if(!isset($_SESSION)) {
            session_start(); //initialise la session qui permet de pas perdre les varaibles d'une page à l'autre
        }
        if(!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        $this->DB = $DB;
        if(isset($_POST['panier'])) {
            $this ->recalc();
        }
    }

    public function recalc() {
        foreach($_SESSION['panier'] as $produit_Id_Item => $quantite) {
            if(isset($_POST['panier']['quantite'][$produit_Id_Item])) {
                $_SESSION['panier'] = $_POST['panier']['quantite'];
            }
        }
    }

    public function count() {
        return array_sum($_SESSION['panier']);
    }

    public function total() {
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)) {
            $produit = array();
        }
        else {
            $produit = $this->DB->query('SELECT Id_Item, Prix FROM produit WHERE Id_Item IN ('.implode(',',$ids).')');
        }
        foreach ($produit as $produit) {
            $total += $produit->Prix * $_SESSION['panier'][$produit->Id_Item];
        }
        return $total;
    }

    public function ajouter($produit_Id_Item) {
        if(isset($_SESSION['panier'][$produit_Id_Item])) {
            $_SESSION['panier'][$produit_Id_Item]++;
        }
        else {
            $_SESSION['panier'][$produit_Id_Item]=1;
        }
    }

    public function del($produit_Id_Item) {
        unset($_SESSION['panier'][$produit_Id_Item]);
    }


}
	}
  ?>}
