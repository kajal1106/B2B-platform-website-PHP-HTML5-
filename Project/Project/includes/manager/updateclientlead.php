<?php

require('includes/config.php');
$leadde=$_POST['leaddesc'];
$leadname=$_POST['leadname'];
$id=$_POST['id'];

$stmt = $db->prepare("UPDATE clientlead set leadName = :leadName, leadDescription=:leadde where clientLeadId = :clientLeadId");
$stmt->bindParam(':clientLeadId',$id , PDO::PARAM_INT);
$stmt->bindParam(':leadName', $leadname, PDO::PARAM_STR);
$stmt->bindParam(':leadde', $leadde, PDO::PARAM_STR);
$stmt->execute();

?>
