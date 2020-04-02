<?php
require('includes/config.php');
$id = $_POST['id'];
$stmt = $db->prepare('UPDATE businesscontactinformation SET businessName =:businessName, businessWebsite =:businessWebsite, businessMobileNo =:businessMobileNo, businessContact2 = :businessContact2, businessLandline = :businessLandline, businessFaxNo = :businessFaxNo where businessID = :businessID');
$stmt->execute(array(
  ':businessID' => $id,
  ':businessName' => $_POST['businessName'],
  ':businessWebsite' => $_POST['businessWebsite'],
  ':businessMobileNo' => $_POST['businessMobileNo'],
  ':businessContact2' => $_POST['businessContact2'],
  ':businessLandline' => $_POST['businessLandline'],
  ':businessFaxNo' => $_POST['businessFaxNo'],
));


$stmt = $db->prepare("UPDATE businessaddress set businessStreetAddress = :businessStreetAddress, zipCode = :zipCode where businessID = :businessID");
$stmt->execute(array(
  ':businessID' => $id,
  ':businessStreetAddress' => $_POST['businessStreetAddress'],
  ':zipCode' => $_POST['zipCode']
));
$stmt->execute();

$stmt = $db->prepare("UPDATE businessprofile set companyName = :companyName, establishmentYear	 = :establishmentYear, aboutCompany = :aboutCompany,ProductAndServices=:ProductAndServices  where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->bindParam(':companyName', $_POST['companyName'], PDO::PARAM_STR);
$stmt->bindParam(':establishmentYear', $_POST['establishmentYear'], PDO::PARAM_INT);
$stmt->bindParam(':aboutCompany', $_POST['about'], PDO::PARAM_STR);
$stmt->bindParam(':ProductAndServices', $_POST['ProductAndServices'], PDO::PARAM_STR);
$stmt->execute();

$supportp=$_POST['busiensssalesPersonName'];
$supporte=$_POST['busiensssalesPersonEmail'];
$supportc=$_POST['busiensssalesPersonContact'];
$salesp=$_POST['busienssSupportPersonName'];
$salese=$_POST['busienssSupportPersonEmail'];
$salesC=$_POST['busienssSupportPersonContact'];

$stmt = $db->prepare("UPDATE businesssupportperson set busienssPersonName = :busienssPersonName,busienssPersonEmail = :busienssPersonEmail, busienssPersonContact = :busienssPersonContact where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->bindParam(':busienssPersonName', $supportp, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonEmail', $supporte, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonContact', $supportc, PDO::PARAM_STR);
$stmt->execute();

$stmt = $db->prepare("UPDATE businesssalesperson set busienssPersonName = :busienssPersonName,busienssPersonEmail = :busienssPersonEmail, busienssPersonContact = :busienssPersonContact where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->bindParam(':busienssPersonName', $salesp, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonEmail', $salese, PDO::PARAM_STR);
$stmt->bindParam(':busienssPersonContact', $salesC, PDO::PARAM_STR);
$stmt->execute();

?>
