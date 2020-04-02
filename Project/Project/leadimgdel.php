<?php
require('includes/config.php');
$a ="businessLead/default.png";
$stmt = $db->prepare('SELECT * from businessleadimage where businessLeadImageID = :productImage');
$stmt->bindParam(':productImage',$_POST['id'] , PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="businessLead/default.png")
  {
    unlink($row['imagePath']);
  }
}
?>
<img class="small-img-box" src="<?php echo DIR.$a; ?>"  />
<?php
$stmt = $db->prepare("UPDATE businessleadimage set imagePath = :imagePath where businessLeadImageID = :productImage");
$stmt->bindParam(':productImage',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
$stmt->execute();

?>
