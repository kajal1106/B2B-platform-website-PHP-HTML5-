<?php
  include('includes/config.php');

try {
  $stmt = $db->prepare('UPDATE menulist SET industryID = :industryID, URL = :URL where menuID = :menuID ');
     $stmt->bindParam(':menuID',$_POST['menuid'],PDO::PARAM_INT);
       $stmt->bindParam(':industryID',$_POST['industryID'],PDO::PARAM_INT);
      $stmt->bindParam(':URL',$_POST['url'],PDO::PARAM_INT); 
       $stmt->execute(); 

}
catch(exception $e){
  echo $e;
  exit();

}
  // echo $_POST['menuid'];
 // echo $_POST['industryID'];
 // echo $_POST['url'];


?>
