<?php
  include('includes/config.php');

?>
<?php
   $id=$_POST['id'];
   $f=$_POST['f'];
   $fea="FEATURED";
      $nfea="NOT FEATURED";
   if($f==1)
   {
     $stmtfetch = $db->prepare('UPDATE businessprofile SET status=:status where businessID = :businessID');
     $stmtfetch->execute(array(':businessID' => $id, ':status' => $fea, ));
   }
   else {
     $stmtfetch = $db->prepare('UPDATE businessprofile SET status=:status where businessID = :businessID');
     $stmtfetch->execute(array(':businessID' => $id, ':status' => $nfea, ));
   }

?>
