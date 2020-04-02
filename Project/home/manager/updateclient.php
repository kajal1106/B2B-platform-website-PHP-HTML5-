<?php
include('includes/config.php');
$id=$_POST['id'];
$clientName=$_POST['clientName'];
$countryID=$_POST['countryID'];
$state_list=$_POST['state_list'];
$city_list=$_POST['city_list'];
$zipCode=$_POST['zipCode'];
$clientStreetAddress=$_POST['clientStreetAddress'];
$clientWebsite=$_POST['clientWebsite'];
$clientMobileNo=$_POST['clientMobileNo'];
$clientLandline=$_POST['clientLandline'];
$clientContact2=$_POST['clientContact2'];
$clientFaxNo=$_POST['clientFaxNo'];
$industry=$_POST['industry'];
$subIndustry=$_POST['subIndustry'];

$stmt = $db->prepare('update clientcontactinformation set  clientName=:clientName, clientWebsite=:clientWebsite, clientMobileNo=:clientMobileNo, clientContact2=:clientContact2, clientLandline=:clientLandline, clientFaxNo=:clientFaxNo where clientID =:clientID');
$stmt->bindParam(':clientID',$id, PDO::PARAM_INT);
$stmt->bindParam(':clientName', $clientName, PDO::PARAM_STR);
$stmt->bindParam(':clientWebsite',$clientWebsite , PDO::PARAM_STR);
$stmt->bindParam(':clientMobileNo', $clientMobileNo, PDO::PARAM_INT);
$stmt->bindParam(':clientContact2',$clientContact2 , PDO::PARAM_INT);
$stmt->bindParam(':clientLandline', $clientLandline, PDO::PARAM_INT);
$stmt->bindParam(':clientFaxNo', $clientFaxNo, PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare('update clientaddress set  clientStreetAddress=:clientStreetAddress, countryID=:countryID, stateID=:stateID, cityID=:cityID, zipCode=:zipCode where clientID =:clientID');
$stmt->bindParam(':clientID',$id , PDO::PARAM_INT);
$stmt->bindParam(':clientStreetAddress', $clientName, PDO::PARAM_STR);
$stmt->bindParam(':countryID', $countryID, PDO::PARAM_INT);
$stmt->bindParam(':stateID',$state_list , PDO::PARAM_INT);
$stmt->bindParam(':cityID', $city_list, PDO::PARAM_INT);
$stmt->bindParam(':zipCode', $zipCode, PDO::PARAM_INT);
$stmt->execute();



$stmt = $db->prepare('update clientindustry set  industryID=:industryID, IndustrySublistID=:IndustrySublistID where clientID =:clientID');
$stmt->bindParam(':clientID',$id , PDO::PARAM_INT);
$stmt->bindParam(':industryID', $industry, PDO::PARAM_INT);
$stmt->bindParam(':IndustrySublistID',$subIndustry , PDO::PARAM_INT);
$stmt->execute();



?>
