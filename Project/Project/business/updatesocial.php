<?php
      require('includes/config.php');
      $facebook=$_POST['facebook'];
      $instagram=$_POST['instagram'];
      $twitter=$_POST['twitter'];

      $stmt = $db->prepare("UPDATE businessSocialInformation set facebookLink = :facebookLink, instagramLink = :instagramLink, twitterLink =:twitterLink  where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->bindParam(':facebookLink', $facebook, PDO::PARAM_STR);
      $stmt->bindParam(':instagramLink', $instagram, PDO::PARAM_STR);
      $stmt->bindParam(':twitterLink', $twitter, PDO::PARAM_STR);
    	$stmt->execute();
?>
