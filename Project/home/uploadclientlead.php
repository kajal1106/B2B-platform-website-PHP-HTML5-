<?php
require('includes/config.php');
$change="";
$abc="";
 define ("MAX_SIZE","400");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
  $errors=0;

if(is_array($_FILES)) {
  $stmt = $db->prepare('SELECT * from clientleadimage WHERE clientLeadImage = :productimage');
  $stmt->bindParam(':productimage', $_POST['abc1'], PDO::PARAM_INT);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    if($row['imagePath']!="clientlead/default.png")
    {
      unlink($row['imagePath']);
    }
  }

  $filename1 = stripslashes($_FILES['userImage1']['name']);

    $extension = getExtension($filename1);
  $extension = strtolower($extension);


if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
  {

    $change='<div class="msgdiv">Unknown Image extension </div> ';
    $errors=1;
  }
  else
  {

$size=filesize($_FILES['userImage1']['tmp_name']);


if ($size > MAX_SIZE*1024 || $size==0)
{
echo "<script type='text/javascript'>alert('file limit exceeded...');</script>";
$errors=1;
}
else {
      if($extension=="jpg" || $extension=="jpeg" )
      {
      $uploadedfile = $_FILES['userImage1']['tmp_name'];
      $src = imagecreatefromjpeg($uploadedfile);

      }
      else if($extension=="png")
      {
      $uploadedfile = $_FILES['userImage1']['tmp_name'];
      $src = imagecreatefrompng($uploadedfile);

      }
      else
      {
      $src = imagecreatefromgif($uploadedfile);
      }

      //echo $scr;

      list($width,$height)=getimagesize($uploadedfile);


      $newwidth=300;
      $newheight=300;
      $tmp=imagecreatetruecolor($newwidth,$newheight);


      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $filename = "clientlead/".$_FILES['userImage1']['name'];
      $name = md5(uniqid(rand(),true));
      $name .= '.'.$extension;
      $filename = "clientlead/".$name;

      $watermark = imagecreatefrompng('images/watermark.png');

      $water_width = imagesx($watermark);
      $water_height = imagesy($watermark);
      $dime_x = 0;
      $dime_y = 0;
      imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);


      imagejpeg($tmp,$filename,100);
      imagedestroy($src);
      imagedestroy($tmp);

      if(is_uploaded_file($_FILES['userImage1']['tmp_name'])) {

      ?>
      <img class="small-img-box" src="<?php echo DIR.$filename; ?>" />
      <?php

      $stmt = $db->prepare('UPDATE clientleadimage set imagePath = :picturePath  where clientLeadImage = :pictureID');
      $stmt->execute(array(
            ':picturePath' => $filename,
            ':pictureID' => $_POST['abc1']
      ));
      }
      }
    }
if($errors==1)
{
  $a ="clientlead/default.png";
  ?>
  <img class="small-img-box" src="<?php echo DIR.$a; ?>" />
  <?php

  $stmt = $db->prepare("UPDATE clientleadimage set imagePath = :imagePath where clientLeadImage = :productImage");
  $stmt->bindParam(':productImage',$_POST['abc1'] , PDO::PARAM_INT);
  $stmt->bindParam(':imagePath', $a, PDO::PARAM_STR);
  $stmt->execute();

}
}
?>
