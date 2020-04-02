<?php
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
  $errors1=0;
  $errors2=0;
  $errors3=0;
  $flag=0;
  $flag1=0;
  $flag2=0;
  $flag3=0;
include('includes/config.php');
if(isset($_POST['submit'])){
  try {
    $stmt = $db->prepare('SELECT industryID from  businessindustry where businessID =:businessID');
    $stmt->execute(array(':businessID' => $_SESSION['businessID']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $industry = $row['industryID'];
    //insert into database with a prepared statement
    $stmt = $db->prepare('INSERT INTO porductinformation (businessID,productName,productDescription,productType,industryID,productOffer) VALUES (:businessID,:productName,:productDescription,:productType,:industryID,:productOffer)');
    $stmt->execute(array(
      ':businessID' => $_SESSION['businessID'],
      ':productName' => $_POST['productName'],
      ':productDescription' => $_POST['productDescription'],
      ':industryID' => $industry,
      ':productType' => $_POST['productType'],
      ':productOffer' => $_POST['offer']
    ));
    $productID = $db->lastInsertId('productID');
  //  echo $productID;
    $location;
    if(isset($_FILES['fileName1']))
    {

      $fileName = $_FILES['fileName1']['name'];
      $tempName = $_FILES['fileName1']['tmp_name'];
      if(isset($fileName))
      {
        $filename1 = stripslashes($_FILES['fileName1']['name']);
      		$extension = getExtension($filename1);
     		$extension = strtolower($extension);


     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
     		{

     			$change='<div class="msgdiv">Unknown Image extension </div> ';
     			//$errors=1;
     		}
     		else
     		{

     $size=filesize($_FILES['fileName1']['tmp_name']);


    if ($size > MAX_SIZE*1024 || $size==0)
    {
    	echo "<script type='text/javascript'>alert('file limit...');</script>";
    	$errors=1;
    }
    else {

    if($extension=="jpg" || $extension=="jpeg" )
    {
    $uploadedfile = $_FILES['fileName1']['tmp_name'];
    $src = imagecreatefromjpeg($uploadedfile);

    }
    else if($extension=="png")
    {
    $uploadedfile = $_FILES['fileName1']['tmp_name'];
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

    $name = md5(uniqid(rand(),true));
    $name .= '.'.$extension;
    $filename = "businessProduct/".$name;

    $watermark = imagecreatefrompng('images/watermark.png');

    $water_width = imagesx($watermark);
    $water_height = imagesy($watermark);
    $dime_x = 0;
    $dime_y = 0;
    imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

    imagejpeg($tmp,$filename,100);
    imagedestroy($src);
    imagedestroy($tmp);
  }
  if($errors==1)
  {
    $location = "businessProduct/";
    $imagePath = $location.'default.png';
    $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
    $stmt->execute(array(
      ':productID' => $productID,
      ':imagePath' => $imagePath
    ));
    $flag=1;
  }else if(!empty($fileName))
    {
      $location = "businessProduct/";
            $imagePath = $filename;
            $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
            $stmt->execute(array(
              ':productID' => $productID,
              ':imagePath' => $imagePath
            ));
            $flag=1;
      }

}
        if($flag==0) {
            $location = "businessProduct/";
              $imagePath = $location.'default.png';
              $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
              $stmt->execute(array(
                ':productID' => $productID,
                ':imagePath' => $imagePath
              ));
            }

      }
    }

     if(isset($_FILES['fileName2']))
    {
      $fileName = $_FILES['fileName2']['name'];
      $tempName = $_FILES['fileName2']['tmp_name'];
      if(isset($fileName))
      {
        $filename1 = stripslashes($_FILES['fileName2']['name']);

      		$extension = getExtension($filename1);
     		$extension = strtolower($extension);


     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
     		{

     			$change='<div class="msgdiv">Unknown Image extension </div> ';
     			//$errors=1;
     		}
     		else
     		{

     $size=filesize($_FILES['fileName2']['tmp_name']);


    if ($size > MAX_SIZE*1024 || $size==0)
    {
    	echo "<script type='text/javascript'>alert('file limit...');</script>";
    	$errors1=1;
    }
    else{

    if($extension=="jpg" || $extension=="jpeg" )
    {
    $uploadedfile = $_FILES['fileName2']['tmp_name'];
    $src = imagecreatefromjpeg($uploadedfile);

    }
    else if($extension=="png")
    {
    $uploadedfile = $_FILES['fileName2']['tmp_name'];
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

    $name = md5(uniqid(rand(),true));
$name .= '.'.$extension;
$filename = "businessProduct/".$name;
$watermark = imagecreatefrompng('images/watermark.png');

$water_width = imagesx($watermark);
$water_height = imagesy($watermark);
$dime_x = 0;
$dime_y = 0;
imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);
    imagejpeg($tmp,$filename,100);
    imagedestroy($src);
    imagedestroy($tmp);
      }
      if($errors1==1)
      {
        $location = "businessProduct/";
        $imagePath = $location.'default.png';
        $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
        $stmt->execute(array(
          ':productID' => $productID,
          ':imagePath' => $imagePath
        ));
        $flag1=1;
      }else if(!empty($fileName))
      {
        $location = "businessProduct/";

              $imagePath = $filename;
              $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
              $stmt->execute(array(
                ':productID' => $productID,
                ':imagePath' => $imagePath
              ));
              $flag1=1;
      }
    }

        if($flag1==0) {
          $location = "businessProduct/";
          $imagePath = $location.'default.png';
          $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
          $stmt->execute(array(
            ':productID' => $productID,
            ':imagePath' => $imagePath
          ));
        }

      }
    }
    if(isset($_FILES['fileName3']))
      {
        $fileName = $_FILES['fileName3']['name'];
        $tempName = $_FILES['fileName3']['tmp_name'];
        if(isset($fileName))
        {
          $filename1 = stripslashes($_FILES['fileName3']['name']);

        		$extension = getExtension($filename1);
       		$extension = strtolower($extension);


       if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
       		{

       			$change='<div class="msgdiv">Unknown Image extension </div> ';
       			$errors=1;
       		}
       		else
       		{

       $size=filesize($_FILES['fileName3']['tmp_name']);


      if ($size > MAX_SIZE*1024 || $size==0)
      {
      	echo "<script type='text/javascript'>alert('file limit...');</script>";
      	$errors2=1;
      }
      else{

      if($extension=="jpg" || $extension=="jpeg" )
      {
      $uploadedfile = $_FILES['fileName3']['tmp_name'];
      $src = imagecreatefromjpeg($uploadedfile);

      }
      else if($extension=="png")
      {
      $uploadedfile = $_FILES['fileName3']['tmp_name'];
      $src = imagecreatefrompng($uploadedfile);

      }
      else
      {
      $src = imagecreatefromgif($uploadedfile);
      }

    //  echo $scr;

      list($width,$height)=getimagesize($uploadedfile);


      $newwidth=300;
      $newheight=300;
      $tmp=imagecreatetruecolor($newwidth,$newheight);


      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $name = md5(uniqid(rand(),true));
      $name .= '.'.$extension;
      $filename = "businessProduct/".$name;
      $watermark = imagecreatefrompng('images/watermark.png');

      $water_width = imagesx($watermark);
      $water_height = imagesy($watermark);
      $dime_x = 0;
      $dime_y = 0;
      imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);
      imagejpeg($tmp,$filename,100);
      imagedestroy($src);
      imagedestroy($tmp);
    }
    if($errors2==1)
    {
      $location = "businessProduct/";
      $imagePath = $location.'default.png';
      $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
      $stmt->execute(array(
        ':productID' => $productID,
        ':imagePath' => $imagePath
      ));
      $flag2=1;
    }else if(!empty($fileName))
    {
      $location = "businessProduct/";
            $imagePath = $filename;
            $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
            $stmt->execute(array(
              ':productID' => $productID,
              ':imagePath' => $imagePath
            ));
            $flag2=1;
          }
  }

          if($flag2==0) {
            $imagePath = $location.'default.png';
            $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
            $stmt->execute(array(
              ':productID' => $productID,
              ':imagePath' => $imagePath
            ));
          }

        }
    }
    if(isset($_FILES['fileName4']))
      {
        $fileName = $_FILES['fileName4']['name'];
        $tempName = $_FILES['fileName4']['tmp_name'];
        if(isset($fileName))
        {
          $filename1 = stripslashes($_FILES['fileName4']['name']);

        		$extension = getExtension($filename1);
       		$extension = strtolower($extension);


       if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
       		{

       			$change='<div class="msgdiv">Unknown Image extension </div> ';
       			$errors=1;
       		}
       		else
       		{

       $size=filesize($_FILES['fileName4']['tmp_name']);


      if ($size > MAX_SIZE*1024 || $size==0)
      {
      	echo "<script type='text/javascript'>alert('file limit...');</script>";
      	$errors3=1;
      }
      else{

      if($extension=="jpg" || $extension=="jpeg" )
      {
      $uploadedfile = $_FILES['fileName4']['tmp_name'];
      $src = imagecreatefromjpeg($uploadedfile);

      }
      else if($extension=="png")
      {
      $uploadedfile = $_FILES['fileName4']['tmp_name'];
      $src = imagecreatefrompng($uploadedfile);

      }
      else
      {
      $src = imagecreatefromgif($uploadedfile);
      }

      list($width,$height)=getimagesize($uploadedfile);
      $newwidth=300;
      $newheight=300;
      $tmp=imagecreatetruecolor($newwidth,$newheight);
      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $name = md5(uniqid(rand(),true));
      $name .= '.'.$extension;
      $filename = "businessProduct/".$name;
      $watermark = imagecreatefrompng('images/watermark.png');

      $water_width = imagesx($watermark);
      $water_height = imagesy($watermark);
      $dime_x = 0;
      $dime_y = 0;
      imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

      imagejpeg($tmp,$filename,100);
      imagedestroy($src);
      imagedestroy($tmp);
    }
    if($errors3==1)
    {
      $location = "businessProduct/";
      $imagePath = $location.'default.png';
      $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
      $stmt->execute(array(
        ':productID' => $productID,
        ':imagePath' => $imagePath
      ));
      $flag3=1;
    }else if(!empty($fileName))
    {
      $location = "businessProduct/";
            $imagePath = $filename;
            $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
            $stmt->execute(array(
              ':productID' => $productID,
              ':imagePath' => $imagePath
            ));
            $flag3=1;
    }
  }
        if($flag3==0) {
            $imagePath = $location.'default.png';
            $stmt = $db->prepare('INSERT INTO productimage ( productID, imagePath) VALUES (:productID, :imagePath)');
            $stmt->execute(array(
              ':productID' => $productID,
              ':imagePath' => $imagePath
            ));
          }
        }
    }
    echo "<script type='text/javascript'>alert('Product ADDED Successfully..');</script>";
    header('Location: business-dashboard.php');
}
catch(PDOException $e) {
    $error[] = $e->getMessage();
    echo $e->getMessage();
}
}
?>
