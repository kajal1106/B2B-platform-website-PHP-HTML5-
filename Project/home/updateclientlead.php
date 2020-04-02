<?php

require('includes/config.php');
$leadname=$_POST['cleadname'];
$leadde=$_POST['cleadde'];
$name=$_POST['cname'];
$eemail=$_POST['ceemail'];
$mobile = $_POST['cmobile'];
$offerType =$_POST['cofferType'];
$id=$_POST['id'];

$stmt = $db->prepare("UPDATE clientlead set leadName = :leadName, clientName = :name, clientEmail = :eemail, clientMobile = :mobile, leadDescription=:leadde where clientLeadId = :clientLeadId");
$stmt->bindParam(':clientLeadId',$id , PDO::PARAM_INT);
$stmt->bindParam(':leadName', $leadname, PDO::PARAM_STR);
$stmt->bindParam(':leadde', $leadde, PDO::PARAM_STR);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':eemail', $eemail, PDO::PARAM_STR);
$stmt->bindParam(':mobile', $mobile, PDO::PARAM_INT);
$stmt->execute();

?>
