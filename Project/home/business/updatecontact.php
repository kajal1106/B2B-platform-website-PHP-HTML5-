<?php
require('includes/config.php');
$address=$_POST['address'];
$mobile=$_POST['mobile'];
$bemail=$_POST['bemail'];
$website=$_POST['website'];

$stmt = $db->prepare("UPDATE businessAddress set businessStreetAddress = :businessStreetAddress where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':businessStreetAddress', $address, PDO::PARAM_STR);
$stmt->execute();

$stmt = $db->prepare("UPDATE businessContactInformation set businessWebsite = :businessWebsite, businessMobileNo = :businessMobileNo where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':businessWebsite',$website , PDO::PARAM_STR);
$stmt->bindParam(':businessMobileNo', $mobile, PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare("UPDATE business set businessEmail = :businessEmail where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':businessEmail', $bemail, PDO::PARAM_STR);
$stmt->execute();

?>
