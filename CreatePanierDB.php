<?php

class panier {

    private $DB;

    public function __construct($DB) {
        if(!isset($_SESSION)) {
            session_start();
        }
        if(!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        $this->DB = $DB;
        if(isset($_POST['panier'])) {
            $this ->recalc();
        }
    }

     public function ajouter($article_ID) {
        if(isset($_SESSION['panier'][$article_ID])) {
            $_SESSION['panier'][$article_ID]++;
        }
        else {
            $_SESSION['panier'][$article_ID]=1;
        }
    }

    public function recalc() {
        foreach($_SESSION['panier'] as $article_ID => $quantite) {
            if(isset($_POST['panier']['quantite'][$article_ID])) {
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
            $article = array();
        }
        else {
            $article = $this->DB->query('SELECT ID, Prix FROM article WHERE ID IN ('.implode(',',$ids).')');
        }
        foreach ($article as $article) {
            $total += $article->Prix * $_SESSION['panier'][$article->ID];
        }
        return $total;
    }


    public function del($article_ID) {
        unset($_SESSION['panier'][$article_ID]);
    }


}?>
