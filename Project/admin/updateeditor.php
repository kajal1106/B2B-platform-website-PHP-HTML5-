<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('UPDATE manager SET username =:username,email= :email WHERE managerID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->bindParam(':username', $_POST['name'], PDO::PARAM_INT);
$stmt->bindParam(':email', $_POST['emailid'], PDO::PARAM_INT);
$stmt->execute();
?>
