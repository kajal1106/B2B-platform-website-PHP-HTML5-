<?php
require('includes/config.php');
$a ="clientlead/default.png";
$stmt = $db->prepare('SELECT * from clientleadimage WHERE clientLeadImage = :productimage');
  $stmt->bindParam(':productimage', $_POST['id'], PDO::PARAM_INT);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    if($row['imagePath']!="clientlead/default.png")
    {
      unlink("../".$row['imagePath']);
    }
  }
$stmt = $db->prepare("UPDATE clientleadimage set imagePath = :imagePath where clientLeadImage = :clientLeadImageID");
$stmt->bindParam(':clientLeadImageID',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
$stmt->execute();
?>

<img src="<?php echo DIR.$a?>" style="width: 100px; height: 100px;" alt="Image Not Available" >
