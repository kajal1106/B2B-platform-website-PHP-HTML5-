<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('DELETE FROM manager WHERE managerID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();
?>
