<?php

require('includes/config.php');
$leadde=$_POST['leaddesc'];
$leadname=$_POST['leadname'];
$id=$_POST['id'];

$stmt = $db->prepare("UPDATE businesslead set leadName = :leadName, leadDescription=:leadde where businessLeadId = :businessLeadId");
$stmt->bindParam(':businessLeadId',$id , PDO::PARAM_INT);
$stmt->bindParam(':leadName', $leadname, PDO::PARAM_STR);
$stmt->bindParam(':leadde', $leadde, PDO::PARAM_STR);
$stmt->execute();

?>
