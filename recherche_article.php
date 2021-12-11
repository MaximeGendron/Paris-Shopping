<?php
require 'login.php'; 
require 'CreateDB.php';
$DB = new DB();
 
  if(isset($_GET['user'])){
    $user = (String) trim($_GET['user']);
 
    $req = $DB->query("SELECT * FROM article WHERE Nom LIKE ? LIMIT 10", array("$user%"));
 
    $req = $req->fetchALL(PDO::FETCH_OBJ);
  
    foreach($req as $r):{
?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['Nom'] . " " . $r['Description'] ?></div>
        <?php    
    }
  } 
?>

