<?php
require('includes/config.php');
$a ="businessProduct/default.png";
 $stmt = $db->prepare('SELECT * from productimage WHERE productImage = :productimage');
  $stmt->bindParam(':productimage', $_POST['id'], PDO::PARAM_INT);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['imagePath']!="businessProduct/default.png")
    {
      unlink("../".$row['imagePath']);
    }

$stmt = $db->prepare("UPDATE productimage set imagePath = :imagePath where productImage = :productImage");
$stmt->bindParam(':productImage',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
$stmt->execute();
?>

<img src="<?php echo DIR.$a?>" style="width: 100px; height: 100px;" alt="Image Not Available" >

