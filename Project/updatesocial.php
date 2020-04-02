<?php
      require('includes/config.php');
      $facebook=$_POST['facebook'];
      $instagram=$_POST['instagram'];
      $twitter=$_POST['twitter'];
      $google=$_POST['google'];
      $linkedin=$_POST['linkedin'];
      $youtube=$_POST['youtube'];

      $stmt = $db->prepare("SELECT businessID from businesssocialinformation where businessID = :businessID");
    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    	$stmt->execute();
      if($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $stmt = $db->prepare("UPDATE businesssocialinformation set facebookLink = :facebookLink, instagramLink = :instagramLink, twitterLink =:twitterLink, googleplus = :google ,linkedin	= :linkedin, youtube = :youtube  where businessID = :businessID");

      	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
      	$stmt->bindParam(':facebookLink', $facebook, PDO::PARAM_STR);
        $stmt->bindParam(':instagramLink', $instagram, PDO::PARAM_STR);
        $stmt->bindParam(':twitterLink', $twitter, PDO::PARAM_STR);
        $stmt->bindParam(':google', $google, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindParam(':youtube', $youtube, PDO::PARAM_STR);
      	$stmt->execute();

      }else {
        $stmt = $db->prepare("INSERT INTO businesssocialinformation(businessID, facebookLink, instagramLink,twitterLink, googleplus, linkedin, youtube) VALUES (:businessID, :facebookLink, :instagramLink,:twitterLink, :google, :linkedin, :youtube)");
      	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
      	$stmt->bindParam(':facebookLink', $facebook, PDO::PARAM_STR);
        $stmt->bindParam(':instagramLink', $instagram, PDO::PARAM_STR);
        $stmt->bindParam(':twitterLink', $twitter, PDO::PARAM_STR);
        $stmt->bindParam(':google', $google, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindParam(':youtube', $youtube, PDO::PARAM_STR);
      	$stmt->execute();

      }

?>
