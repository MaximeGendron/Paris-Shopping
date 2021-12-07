<?php
/*class DataBase{
   private $host = 'localhost';
   private $username = 'root';
   private $password = '';
   private $database = 'parisshopping';
   private $db;

  public function __construct($host = null, $username = null, $password = null, $database = null) {
        if($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        
        $db = newPDO()

        try {
            $this->db = new PDO('mysql:host=' .$this->host. ';dbname=' .$this->database, $this->username, $this->password,
             array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }catch(PDOExeption $e) {
            die('<h1>Impossible de se connecter a la base de donnee</h1>');
        }

    }
//Methode pour faire une requete plus rapidement
    public function requete($sql, $data = array()) {
        $req=$this->db->prepare($sql); //on envoie la requete en para
        $req->execute($data); //on l'execute
        return $req->fetchAll(PDO::FETCH_OBJ); //on retourne le res sous forme d'objet
    }
}
