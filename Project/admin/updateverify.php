<?php
  include('includes/config.php');

?>
<?php
   $id=$_POST['id'];
   $f=$_POST['f'];
   $fea="Verify";
      $nfea="Not Verify";
   if($f==1)
   {  
     $stmtfetch = $db->prepare('UPDATE businessprofile SET isverified=:status where businessID = :businessID');
     $stmtfetch->execute(array(':businessID' => $id, ':status' => $fea, ));
   }
   else {
     $stmtfetch = $db->prepare('UPDATE businessprofile SET isverified=:status where businessID = :businessID');
     $stmtfetch->execute(array(':businessID' => $id, ':status' => $nfea, ));
   }

?>
