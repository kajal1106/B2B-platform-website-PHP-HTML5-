<?php
require('includes/config.php');
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "images/".$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<?php
$stmt = $db->prepare('UPDATE profilrpicture set busienssLogoPath = :busienssLogoPath  where businesslogoID = :businesslogoID');
                  $stmt->execute(array(
                    ':busienssLogoPath' => $targetPath,
                    ':businesslogoID' => $_POST['abc']
                  ));
}
}
}
?>
