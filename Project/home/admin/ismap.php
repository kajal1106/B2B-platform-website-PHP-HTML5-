<?php
  include('includes/config.php');

?>
<?php
   $id=1;
   $f=$_POST['f'];
   $fea="map";
      $nfea="slider";
   if($f==1)
   {
     $stmtfetch = $db->prepare('UPDATE admin SET ismap=:status where  adminID = :adminID');
     $stmtfetch->execute(array(':adminID' => $id, ':status' => $fea, ));
   }
   else {
     $stmtfetch = $db->prepare('UPDATE admin SET ismap=:status where  adminID = :adminID');
     $stmtfetch->execute(array(':adminID' => $id, ':status' => $nfea, ));
   }

?>
