<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('DELETE from porductinformation WHERE productID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();
$stmt = $db->prepare('SELECT * from productimage WHERE productID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="businessProduct/default.png")
  {
    unlink("../".$row['imagePath']);
  }
}

$stmt = $db->prepare('DELETE from productimage WHERE productID = :productID');
$stmt->bindParam(':productID', $id, PDO::PARAM_INT);
$stmt->execute();

?>
