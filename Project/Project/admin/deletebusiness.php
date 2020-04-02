<?php
require('includes/config.php');
$id = $_POST['id'];

$stmt = $db->prepare('DELETE from business where businessID = :businessID');
$stmt->execute(array(':businessID' => $id));

$stmt = $db->prepare('DELETE from businesscontactinformation where businessID = :businessID');
$stmt->execute(array(':businessID' => $id));

$stmt = $db->prepare("DELETE from businessaddress where businessID = :businessID");
$stmt->execute(array(':businessID' => $id));

$stmt = $db->prepare("DELETE from businessprofile where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();


$stmt = $db->prepare("DELETE from businesssupportperson where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare("DELETE from businesssalesperson where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare("SELECT productID from porductinformation where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();
while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
		$stmt1 = $db->prepare('SELECT * from productimage WHERE productID = :productID');
		$stmt1->bindParam(':productID', $r1['productID'], PDO::PARAM_INT);
		$stmt1->execute();

		while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
		{
		  if($row['imagePath']!="businessProduct/default.png")
		  {
		    unlink("../".$row['imagePath']);
		  }
		}
}

while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
	
  $stmt1 = $db->prepare('DELETE from productimage WHERE productID = :productID');
  $stmt1->bindParam(':productID', $r1['productID'], PDO::PARAM_INT);
  $stmt1->execute();
}

$stmt = $db->prepare("DELETE from porductinformation where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare("SELECT businessLeadId from businesslead where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();
while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
$stmt1 = $db->prepare('SELECT * from businessleadimage WHERE businessLeadId = :businessLeadId');
$stmt1->bindParam(':businessLeadId', $r1['businessLeadId'], PDO::PARAM_INT);
$stmt1->execute();

while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="businessLead/default.png")
  {
    unlink("../".$row['imagePath']);
  }
}
}
while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
{
  $stmt1 = $db->prepare('DELETE from businessleadimage WHERE businessLeadId = :businessLeadId');
  $stmt1->bindParam(':businessLeadId', $r1['businessLeadId'], PDO::PARAM_INT);
  $stmt1->execute();
}

$stmt = $db->prepare("DELETE from businesslead where businessID = :businessID");
$stmt->bindParam(':businessID',$id , PDO::PARAM_INT);
$stmt->execute();
?>
