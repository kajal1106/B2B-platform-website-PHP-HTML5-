<?php
require('includes/config.php');
$a ="businessLead/default.png";
$stmt = $db->prepare('SELECT * from businessleadimage WHERE businessLeadImageID = :productimage');
  $stmt->bindParam(':productimage', $_POST['id'], PDO::PARAM_INT);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    if($row['imagePath']!="businessLead/default.png")
    {
      unlink("../".$row['imagePath']);
    }
  }
$stmt = $db->prepare("UPDATE businessleadimage set imagePath = :imagePath where businessLeadImageID = :businessLeadImageID");
$stmt->bindParam(':businessLeadImageID',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
$stmt->execute();
?>
<img src="<?php echo DIR.$a?>" style="width: 100px; height: 100px;" alt="Image Not Available" >