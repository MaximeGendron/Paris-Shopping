<?php


$user = isset($_POST['user']) ? $_POST['user'] : '';
 
  $req = $DB->query("SELECT Nom FROM article WHERE Nom LIKE '%$user%' LIMIT 10");?>
  <?php foreach ($req as $key => $req): ?>
 
    while($r = mysqli_fetch_assoc($req)){
       echo "<div style='margin-top: 20px 0; border-bottom: 2px solid #ccc'> " . $r['Nom'] . "</div>";
    }
     
  <?php endforeach ?>

?>



    


