<?php
require('includes/config.php');
$a ="Mylogo/default.png";
$stmt = $db->prepare('SELECT * from businesslogo WHERE businessID = :businessID');
				$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
				$stmt->execute();

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if($row['busienssLogoPath']!="Mylogo/default.png")
				{
					unlink("../".$row['busienssLogoPath']);
				}
$stmt = $db->prepare("UPDATE businesslogo set busienssLogoPath = :busienssLogoPath where businessID = :businessID");
$stmt->bindParam(':businessID',$_POST['id'] , PDO::PARAM_INT);
$stmt->bindParam(':busienssLogoPath', $a, PDO::PARAM_STR);
$stmt->execute();

?>
<img class="img-box profilepic" src="<?php echo DIR.$a?>">
