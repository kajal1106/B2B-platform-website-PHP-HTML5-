<?php
      require('includes/config.php');
      $countryID =$_POST['countryID'];
      $levelToExpand =$_POST['levelToExpand'];
      $isSampleProvide=$_POST['isSampleProvide'];
      $businessName=$_POST['businessName'];
      $industryID=$_POST['industryID'];
      $subIndustry=$_POST['subIndustry'];
      $offer =$_POST['offer'];

      $stmt = $db->prepare("UPDATE businessaddress set countryID = :countryID where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->bindParam(':countryID', $countryID, PDO::PARAM_INT);
    	$stmt->execute();

      $stmt = $db->prepare("UPDATE businessprofile set isSampleProvide = :isSampleProvide, levelToExpand = :levelToExpand,  businessOffer = :offer  where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->bindParam(':isSampleProvide', $isSampleProvide, PDO::PARAM_STR);
      $stmt->bindParam(':levelToExpand', $levelToExpand, PDO::PARAM_STR);
      $stmt->bindParam(':offer', $offer, PDO::PARAM_STR);
    	$stmt->execute();

      $stmt = $db->prepare("UPDATE businesscontactinformation set businessName = :businessName where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->bindParam(':businessName', $businessName, PDO::PARAM_STR);
    	$stmt->execute();

      $stmt = $db->prepare("UPDATE businessindustry set industryID = :industryID where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->bindParam(':industryID', $industryID, PDO::PARAM_INT);
    	$stmt->execute();

      $stmt = $db->prepare("UPDATE industrysubtype set IndustrySublistID = :subIndustry, industryID = :industryID where businessID = :businessID");
      $stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
      $stmt->bindParam(':subIndustry', $subIndustry, PDO::PARAM_INT);
      $stmt->bindParam(':industryID', $industryID, PDO::PARAM_INT);
      $stmt->execute();

?>
