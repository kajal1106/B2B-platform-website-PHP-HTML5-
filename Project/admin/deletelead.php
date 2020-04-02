<?php
require('includes/config.php');

$id = $_POST['id'];

$stmt = $db->prepare('DELETE from businesslead WHERE businessLeadId = :businessLeadId');
$stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare('SELECT * from businessleadimage WHERE businessLeadId = :businessLeadId');
$stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="businessLead/default.png")
  {
    unlink("../".$row['imagePath']);
  }
}

$stmt = $db->prepare('DELETE from businessleadimage WHERE businessLeadId = :businessLeadId');
$stmt->bindParam(':businessLeadId', $id, PDO::PARAM_INT);
$stmt->execute();
?>
