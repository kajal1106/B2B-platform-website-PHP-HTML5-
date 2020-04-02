<?php
require('includes/config.php');

$id = $_POST['id'];


$stmt = $db->prepare('SELECT * from clientleadimage WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="clientlead/default.png")
  {
    unlink($row['imagePath']);
  }
}

$stmt = $db->prepare('DELETE from clientleadimage WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare('DELETE from clientlead WHERE clientLeadId = :clientLeadId');
$stmt->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
$stmt->execute();

?>
