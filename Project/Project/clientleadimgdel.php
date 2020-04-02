<?php
require('includes/config.php');
$a ="clientlead/default.png";
$stmt = $db->prepare('SELECT * from clientleadimage where clientLeadImage = :productImage');
$stmt->bindParam(':productImage',$_POST['id'] , PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  if($row['imagePath']!="clientlead/default.png")
  {
    unlink($row['imagePath']);
  }
}
?>
<img class="small-img-box" src="<?php echo DIR.$a; ?>" />
<?php
$stmt = $db->prepare("UPDATE clientleadimage set imagePath = :imagePath where clientLeadImage = :productImage");
$stmt->bindParam(':productImage',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
$stmt->execute();

?>
