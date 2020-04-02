<?php
require('includes/config.php');
$address=$_POST['address'];
$mobile=$_POST['mobile'];
$website=$_POST['website'];
$supportp=$_POST['supportp'];
$supporte=$_POST['supporte'];
$supportc=$_POST['supportc'];
$salesp=$_POST['salesp'];
$salese=$_POST['salese'];
$salesC=$_POST['salesC'];
$countryID=$_POST['country'];
$city=$_POST['city'];
$state=$_POST['state'];
$zicode=$_POST['zipcode'];
$faxno=$_POST['faxno'];
$contact2=$_POST['contact2'];
$landline = $_POST['landline'];

$stmt = $db->prepare("UPDATE businessaddress set businessStreetAddress = :businessStreetAddress, countryID = :countryID, cityID = :cityID,stateID = :stateID, zipCode = :zipCode where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':businessStreetAddress', $address, PDO::PARAM_STR);
$stmt->bindParam(':countryID', $countryID, PDO::PARAM_INT);
$stmt->bindParam(':cityID', $city, PDO::PARAM_INT);
$stmt->bindParam(':stateID', $state, PDO::PARAM_INT);
$stmt->bindParam(':zipCode', $zicode, PDO::PARAM_INT);

$stmt->execute();

$stmt = $db->prepare("UPDATE businesscontactinformation set businessWebsite = :businessWebsite, businessMobileNo = :businessMobileNo, businessContact2 =:businessContact2, businessLandline = :businessLandline, businessFaxNo = :businessFaxNo where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':businessWebsite',$website , PDO::PARAM_STR);
$stmt->bindParam(':businessMobileNo', $mobile, PDO::PARAM_INT);
$stmt->bindParam(':businessContact2', $contact2, PDO::PARAM_INT);
$stmt->bindParam(':businessLandline', $landline, PDO::PARAM_INT);
$stmt->bindParam(':businessFaxNo', $faxno, PDO::PARAM_INT);
$stmt->execute();


$stmt = $db->prepare("UPDATE businesssupportperson set busienssPersonName = :busienssPersonName,busienssPersonEmail = :busienssPersonEmail, busienssPersonContact = :busienssPersonContact where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':busienssPersonName', $supportp, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonEmail', $supporte, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonContact', $supportc, PDO::PARAM_STR);
$stmt->execute();

$stmt = $db->prepare("UPDATE businesssalesperson set busienssPersonName = :busienssPersonName,busienssPersonEmail = :busienssPersonEmail, busienssPersonContact = :busienssPersonContact where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':busienssPersonName', $salesp, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonEmail', $salese, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonContact', $salesC, PDO::PARAM_STR);
$stmt->execute();


?>
