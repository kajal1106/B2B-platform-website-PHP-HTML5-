<?php
require('includes/config.php');
$id = $_POST['id'];

$stmt = $db->prepare('DELETE from client where clientID = :clientID');
$stmt->execute(array(':clientID' => $id));

$stmt = $db->prepare('DELETE from clientcontactinformation where clientID = :clientID');
$stmt->execute(array(':clientID' => $id));

$stmt = $db->prepare("DELETE from clientaddress where clientID = :clientID");
$stmt->execute(array(':clientID' => $id));

$stmt = $db->prepare("DELETE from clientprofile where clientID = :clientID");
$stmt->bindParam(':clientID',$id , PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare("SELECT clientLeadId from clientlead where clientID = :clientID");
$stmt->bindParam(':clientID',$id , PDO::PARAM_INT);
$stmt->execute();
while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
		$stmt1 = $db->prepare('SELECT * from clientleadimage WHERE clientLeadId = :clientLeadId');
		$stmt1->bindParam(':clientLeadId', $id, PDO::PARAM_INT);
		$stmt1->execute();

		while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
		  if($row['imagePath']!="clientlead/default.png")
		  {
		    unlink("../".$row['imagePath']);
		  }
		}

}

while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
  $stmt1 = $db->prepare('DELETE from clientleadimage WHERE clientLeadId = :clientLeadId');
  $stmt1->bindParam(':clientLeadId', $r1['clientLeadId'], PDO::PARAM_INT);
  $stmt1->execute();
}

$stmt = $db->prepare("DELETE from clientlead where clientID = :clientID");
$stmt->bindParam(':clientID',$id , PDO::PARAM_INT);
$stmt->execute();
?>
