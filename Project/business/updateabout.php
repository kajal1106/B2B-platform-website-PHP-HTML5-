<?php

require('includes/config.php');
$about=$_POST['about'];

$stmt = $db->prepare("UPDATE businessProfile set aboutCompany = :aboutCompany where businessID = :businessID");
$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
$stmt->bindParam(':aboutCompany', $about, PDO::PARAM_STR);
$stmt->execute();

?>
