<?php
      require('includes/config.php');
      $stmt = $db->prepare("UPDATE porductinformation set productName = :productName, productDescription = :productDescription, productType =:productType, productOffer =:productOffer  where productID = :productID");
    	$stmt->bindParam(':productID',$_POST['id'] , PDO::PARAM_INT);
    	$stmt->bindParam(':productName', $_POST['productname'], PDO::PARAM_STR);
      $stmt->bindParam(':productDescription', $_POST['productdesc'], PDO::PARAM_STR);
      $stmt->bindParam(':productType', $_POST['xproductType'], PDO::PARAM_STR);
      $stmt->bindParam(':productOffer', $_POST['poffer'], PDO::PARAM_STR);
    	$stmt->execute();
?>
