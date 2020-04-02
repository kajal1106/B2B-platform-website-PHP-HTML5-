<?php

require('includes/config.php');
$leadname=$_POST['leadname'];
$leadde=$_POST['leadde'];
$name=$_POST['name'];
$eemail=$_POST['eemail'];
$mobile =$_POST['mobile'];
$offerType =$_POST['offerType'];
$id=$_POST['id'];

$stmt = $db->prepare("UPDATE businesslead set leadName = :leadName, businessName = :name, businessEmail = :eemail, businessMobile = :mobile, offerType = :offerType, leadDescription=:leadde where businessLeadId = :businessLeadId");
$stmt->bindParam(':businessLeadId',$id , PDO::PARAM_INT);
$stmt->bindParam(':leadName', $leadname, PDO::PARAM_STR);
$stmt->bindParam(':leadde', $leadde, PDO::PARAM_STR);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':eemail', $eemail, PDO::PARAM_STR);
$stmt->bindParam(':mobile', $mobile, PDO::PARAM_INT);
$stmt->bindParam(':offerType', $offerType, PDO::PARAM_STR);
$stmt->execute();

?>
