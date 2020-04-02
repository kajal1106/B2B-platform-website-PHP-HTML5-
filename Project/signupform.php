<?php

$pagetitle="Register With Us Free";

include('includes/config.php');
include('includes/head.php');
include('includes/classes/phpmailer/mailacoounts.php');
if( $user->is_logged_in() ){ header('Location: business-dashboard.php'); }
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

if(isset($_POST['submit'])){
	//very basic validation
	if(strlen($_POST['businessEmail']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT businessEmail FROM business WHERE businessEmail = :businessEmail');
		$stmt->execute(array(':businessEmail' => $_POST['businessEmail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['businessEmail'])){
			$error[] = 'Username provided is already in use.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['businessEmail'], FILTER_VALIDATE_EMAIL)){
			$error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT businessEmail FROM business WHERE businessEmail = :businessEmail');
		$stmt->execute(array(':businessEmail' => $_POST['businessEmail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO business (businessEmail,businessPassword,isActive) VALUES (:businessEmail, :businessPassword,:isActive)');
			$stmt->execute(array(
				':businessEmail' => $_POST['businessEmail'],
				':businessPassword' => $hashedpassword,
				':isActive' => $activasion
			));
			$businessID = $db->lastInsertId('businessID');

			$stmt = $db->prepare('INSERT INTO businesscontactinformation ( businessID, businessName, businessWebsite, businessMobileNo, businessContact2, businessLandline, businessFaxNo) VALUES (:businessID, :businessName, :businessWebsite, :businessMobileNo, :businessContact2, :businessLandline, :businessFaxNo)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':businessName' => $_POST['businessName'],
				':businessWebsite' => $_POST['businessWebsite'],
				':businessMobileNo' => $_POST['businessMobileNo'],
				':businessContact2' => $_POST['businessContact2'],
				':businessLandline' => $_POST['businessLandline'],
				':businessFaxNo' => $_POST['businessFaxNo'],
			));

			$stmt = $db->prepare('INSERT INTO businessaddress ( businessID, businessStreetAddress, countryID, stateID, cityID, zipCode)
			VALUES (:businessID, :businessStreetAddress, :countryID, :stateID, :cityID, :zipCode)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':businessStreetAddress' => $_POST['businessStreetAddress'],
				':countryID' => $_POST['countryID'],
				':stateID' => $_POST['stateID'],
				':cityID' => $_POST['cityID'],
				':zipCode' => $_POST['zipCode']
			));

			$stmt = $db->prepare('INSERT INTO businesssalesperson ( businessID, busienssPersonName, busienssPersonEmail, busienssPersonContact)
			VALUES (:businessID, :busienssPersonName, :busienssPersonEmail, :busienssPersonContact)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':busienssPersonName' => $_POST['busienssSalesPersonName'],
				':busienssPersonEmail' => $_POST['busienssSalesPersonEmail'],
				':busienssPersonContact' => $_POST['busienssSalesPersonContact']

			));

			$stmt = $db->prepare('INSERT INTO businesssupportperson ( businessID, busienssPersonName, busienssPersonEmail, busienssPersonContact)
			VALUES (:businessID, :busienssPersonName, :busienssPersonEmail, :busienssPersonContact)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':busienssPersonName' => $_POST['busienssSupportPersonName'],
				':busienssPersonEmail' => $_POST['busienssSupportPersonEmail'],
				':busienssPersonContact' => $_POST['busienssSupportPersonContact']

			));


			$stmt = $db->prepare('INSERT INTO businessprofile ( businessID, companyName, establishmentYear, levelToExpand, aboutCompany, ProductAndServices, isSampleProvide ,firmTypeName)
			VALUES (:businessID, :companyName, :establishmentYear, :levelToExpand, :aboutCompany, :ProductAndServices, :isSampleProvide,:firmTypeName)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':companyName' => $_POST['companyName'],
				':establishmentYear' => $_POST['establishmentYear'],
				':levelToExpand' => $_POST['levelToExpand'],
				':aboutCompany' => $_POST['aboutCompany'],
				':ProductAndServices' => $_POST['ProductAndServices'],
				':isSampleProvide' => $_POST['isSampleProvide'],
				':firmTypeName' => $_POST['firmTypeName'],
			));
			if(isset($_FILES['busienssLogoPath']))
			{
				$fileName = $_FILES['busienssLogoPath']['name'];
				$tempName = $_FILES['busienssLogoPath']['tmp_name'];
				if(isset($fileName))
				{
					$filename1 = stripslashes($_FILES['busienssLogoPath']['name']);
	      		$extension = getExtension($filename1);
	     		$extension = strtolower($extension);


	     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
	     		{

	     			$change='<div class="msgdiv">Unknown Image extension </div> ';
	     			//$errors=1;
	     		}
	     		else
	     		{

	     $size=filesize($_FILES['busienssLogoPath']['tmp_name']);


	    if ($size > MAX_SIZE*1024 || $size==0)
	    {
	    	echo "<script type='text/javascript'>alert('file limit...');</script>";
	    	$errors=1;
	    }
	    else {

	    if($extension=="jpg" || $extension=="jpeg" )
	    {
	    $uploadedfile = $_FILES['busienssLogoPath']['tmp_name'];
	    $src = imagecreatefromjpeg($uploadedfile);

	    }
	    else if($extension=="png")
	    {
	    $uploadedfile = $_FILES['busienssLogoPath']['tmp_name'];
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
	    $filename = "Mylogo/".$name;
	    imagejpeg($tmp,$filename,100);
	    imagedestroy($src);
	    imagedestroy($tmp);
	  }
	  if($errors==1)
	  {
	    $location = "Mylogo/";
			$busienssLogoPath = $location.'default.jpg';
			$stmt = $db->prepare('INSERT INTO businesslogo ( businessID, busienssLogoPath)
			VALUES (:businessID, :busienssLogoPath)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':busienssLogoPath' => $busienssLogoPath
			));
	    $flag=1;
	  }else if(!empty($fileName))
	    {
	      $location = "Mylogo/";

							$busienssLogoPath = $filename;
							$stmt = $db->prepare('INSERT INTO businesslogo ( businessID, busienssLogoPath)
							VALUES (:businessID, :busienssLogoPath)');
							$stmt->execute(array(
								':businessID' => $businessID,
								':busienssLogoPath' => $busienssLogoPath
							));
	            $flag=1;
	      }

	}
	        if($flag==0) {
	            $location = "Mylogo/";
							$busienssLogoPath = $location.'default.jpg';
							$stmt = $db->prepare('INSERT INTO businesslogo ( businessID, busienssLogoPath)
							VALUES (:businessID, :busienssLogoPath)');
							$stmt->execute(array(
								':businessID' => $businessID,
								':busienssLogoPath' => $busienssLogoPath
							));
	            }
				}
			}
			$stmt = $db->prepare('INSERT INTO businessindustry ( businessID, industryID)
			VALUES (:businessID, :industryID)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':industryID' => $_POST['industryID'],
			));
			if(isset($_POST['busienssTypeName'])){
				$busienssTypeName = $_POST['busienssTypeName'];
				}

				for( $i = 0; $i < sizeof($busienssTypeName); $i++ )
				{
						$stmt = $db->prepare('INSERT INTO businesstype ( businessID, busienssTypeName)
						VALUES (:businessID, :busienssTypeName)');
						$stmt->execute(array(
							':businessID' => $businessID,
							':busienssTypeName' => $busienssTypeName[$i]
						));
				}

			$stmt = $db->prepare('INSERT INTO industrysubtype(businessID, industryID, IndustrySublistID) VALUES (:businessID,:industryID,:IndustrySublistID)');
			$stmt->execute(array(
				':businessID' => $businessID,
				':industryID' => $_POST['industryID'],
				':IndustrySublistID' => $_POST['IndustrySublistID']
			));


			//send email
			$to = $_POST['businessEmail'];
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering at the Blender site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."http://localhost/project/activate.php?x=$businessID&y=$activasion'>".DIR."activate.php?x=$businessID&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

			$mail = new Mail();
			$mail->setFrom(blender);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
				$error[] = $e->getMessage();
		}

	}

}

if(isset($_POST['csubmit'])){
	//very basic validation
	if(strlen($_POST['clientEmail']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT clientEmail FROM client WHERE clientEmail = :clientEmail');
		$stmt->execute(array(':clientEmail' => $_POST['clientEmail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['clientEmail'])){
			$error[] = 'Email provided is already in use.';
		}

	}

	if(strlen($_POST['cpassword']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['cpasswordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['cpassword'] != $_POST['cpasswordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['clientEmail'], FILTER_VALIDATE_EMAIL)){
			$error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT clientEmail FROM client WHERE clientEmail = :clientEmail');
		$stmt->execute(array(':clientEmail' => $_POST['clientEmail']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['clientEmail'])){
			$error[] = 'Email provided is already in use.';
		}

	}

	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['cpassword'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO client (clientEmail,clientPassword,isActive) VALUES (:clientEmail, :clientPassword,:isActive)');
				$stmt->execute(array(
				':clientEmail' => $_POST['clientEmail'],
				':clientPassword' => $hashedpassword,
				':isActive' => $activasion
));
$clientID = $db->lastInsertId('clientID');

			$stmt = $db->prepare('INSERT INTO clientcontactinformation ( clientID, clientName, clientWebsite, clientMobileNo, clientContact2, clientLandline, clientFaxNo) VALUES ( :clientID, :clientName, :clientWebsite, :clientMobileNo, :clientContact2, :clientLandline, :clientFaxNo)');
			$stmt->execute(array(
				':clientID' => $clientID,
				':clientName' => $_POST['clientName'],
				':clientWebsite' => $_POST['clientWebsite'],
				':clientMobileNo' => $_POST['clientMobileNo'],
				':clientContact2' => $_POST['clientContact2'],
				':clientLandline' => $_POST['clientLandline'],
				':clientFaxNo' => $_POST['clientFaxNo'],
			));

			$stmt = $db->prepare('INSERT INTO clientaddress ( clientID, clientStreetAddress, countryID, stateID, cityID, zipCode)
			VALUES (:clientID, :clientStreetAddress, :countryID, :stateID, :cityID, :zipCode)');
			$stmt->execute(array(
				':clientID' => $clientID,
				':clientStreetAddress' => $_POST['clientStreetAddress'],
				':countryID' => $_POST['ccountryID'],
				':stateID' => $_POST['cstateID'],
				':cityID' => $_POST['ccityID'],
				':zipCode' => $_POST['czipCode']
			));


			$stmt = $db->prepare('INSERT INTO clientindustry ( clientID, industryID, IndustrySublistID)
			VALUES (:clientID, :industryID,:IndustrySublistID)');
			$stmt->execute(array(
				':clientID' => $clientID,
				':industryID' => $_POST['cindustryID'],
				':IndustrySublistID' => $_POST['cIndustrySublistID']
			));

			//send email
			$to = $_POST['clientEmail'];
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering at the Blender site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."http://localhost/project/client-activate.php?x=$clientID&y=$activasion'>".DIR."client-activate.php?x=$clientID&y=$activasion</a></p>
			<p>Regards Site Admin</p>";

			$mail = new Mail();
			$mail->setFrom(Blender);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
				$error[] = $e->getMessage();
		}

	}

}
?>
<style>
.control-label{
	font-size:12px;
}
.em{
	color:red
}





</style>
<style>

</style>
<body style="overflow:hidden;">


		<!--================================HEADER==========================================-->
		<?php include('includes/header.php');?>
		<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgorange-1 padding-top-0 padding-bottom-0"><!-- section title -->
			<h4 class="white">  </h4>
		</div><!-- section title end -->
<div class="container bg-white">
		<!--================================listing SECTION==========================================-->
<ul class="nav nav-pills nav-justified padding-top-30 padding-bottom-30" style="margin-top:5%;">
  	<li class="active" class="bg-warning"><a href="#tab_business_owner" data-toggle="pill" style="font-size:14px">Business Owner</a></li>
    <li class="bg-warning"><a href="#tab_client" data-toggle="pill" style="font-size:14px">Client</a></li>


  </ul>

</div>
  <div class="tab-content" style="min-height:500px;">



   <!--================================Dashboard Section Start=====================================-->
  <div class="tab-pane active" id="tab_business_owner" role="tabpanel">

<section class="aside-layout-section padding-top-20 padding-bottom-20">
		<div class="container bg-white ">
			<?php
			//check for any errors
			if(isset($error)){
				foreach($error as $error){
					echo '<p class="bg-danger">'.$error.'</p>';
				}
			}

			//if action is joined show sucess
			if(isset($_GET['action']) && $_GET['action'] == 'joined'){
				echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
			}
			?>


			<div class="row">

				<div class="col-md-12">


				<form class="form-horizontal" action = "signupform.php" method="POST" enctype="multipart/form-data">
					<fieldset>

				<div class="row">
				<div class="col-md-10">
					<h6 class="text-center smallheading padding-top-5 padding-bottom-5">Login Information</h6>
</div>


<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" style="padding-top: 4px;" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="businessEmail" name="businessEmail" type="email" placeholder="Email" class="form-control input-sm">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" style="padding-top: 4px;" for=""><i class="fa fa-key" aria-hidden="true"></i> Password<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="password" name="password" type="Password" placeholder="Password" class="form-control  input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" style="padding-top: 4px;" for=""><i class="fa fa-key" aria-hidden="true"></i> Re-Enter Password<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="passwordConfirm" name="passwordConfirm" type="Password" placeholder="Password" class="form-control input-sm">

  </div>
</div>
</div>



				<!--=====================Login Information  End=====-->

<div class="col-md-10">
	<hr>
					<h6 class="text-center smallheading padding-top-5 padding-bottom-5">Contact Information</h6>
</div>
<br>
<!-- Text input-->
<div class="col-md-8">
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<!--em class="em">*</em--></label>
  <div class="col-md-8">
  <input id="businessName" name="businessName" type="text" placeholder="Name" class="form-control input-sm">

  </div>
</div>
</div>





<!---left column-->
<div class="col-md-5">
	<hr>
		<h6 class="text-center small-label-size-form padding-top-5 padding-bottom-5"> Sales</h6>
		<br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonName" name="busienssSalesPersonName" type="text" placeholder="Name" class="form-control input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonEmail" name="busienssSalesPersonEmail" type="email" placeholder="Email" class="form-control input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-mobile" aria-hidden="true"></i> Contact No<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busiensssalesPersonContact" name="busienssSalesPersonContact" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
</div>
<hr>
</div>


<div class="col-md-5">
<!---Right column-->
<hr>
	<h6 class="text-center small-label-size-form padding-top-5 padding-bottom-5"> Support</h6>
	<br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonName" name="busienssSupportPersonName" type="text" placeholder="Name" class="form-control input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonEmail" name="busienssSupportPersonEmail" type="email" placeholder="Email" class="form-control input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-mobile" aria-hidden="true"></i> Contact No<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <input id="busienssSupportPersonContact" name="busienssSupportPersonContact" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
</div>
<hr>
</div>



<!-- Text input-->



<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Country<em class="em">*</em></label>
  <div class="col-md-8">
  <select  name="countryID" id="countryID"  class="form-control"  onChange="getState(this.value);" required>
		<option>Country</option>
		<?php
                              $q = $db->prepare("SELECT * FROM country");
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {?>
                                <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>


                          <?php } ?>
  </select>

  </div>
</div>
</div>

<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">State<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <select  class="form-control" id="state-list" name="stateID" onChange="getCity(this.value);" required> <option>State</option>
  </select>

  </div>
</div>
</div>

<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">City<!-- <em class="em">*</em> --></label>
  <div class="col-md-8">
  <select  class="form-control" id="city-list" name="cityID" required> <option>City</option>
  </select>

  </div>
</div>
</div>

<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Zip Code</label>
  <div class="col-md-8">
   <input id="zipCode" name="zipCode" type="tel" placeholder="Zip Code" class="form-control input-sm">

  </div>
</div>
</div>



<!------row details end-->


<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Street Address</label>
  <div class="col-md-8">
  <textarea id="businessStreetAddress" name="businessStreetAddress" type="text" placeholder="Enter your street address here" class="form-control input-sm"></textarea>

  </div>
</div>
</div>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Website</label>
  <div class="col-md-8">
  <input id="businessWebsite" name="businessWebsite" type="text" placeholder="Website" class="form-control input-sm">

  </div>
</div>
</div>




<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Mobile No<em class="em">*</em></label>
  <div class="col-md-8">
  <input id="businessMobileNo" name="businessMobileNo" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
  </div>
</div>
<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Landline No</label>
  <div class="col-md-8">
 <input id="businessLandline" name="businessLandline" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
  </div>
</div>



<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Contact 2</label>
  <div class="col-md-8">
  <input id="businessContact2" name="businessContact2" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
</div>
</div>
<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Fax No</label>
  <div class="col-md-8">
 <input id="businessFaxNo" name="businessFaxNo" type="number" placeholder="[Country Code] [Area Code] [Contact]" class="form-control input-sm">

  </div>
  </div>


	</div>







<!--=====================Business Profile  Start=====-->

<div class="col-md-10">
					<h6 class="text-center smallheading padding-top-5 padding-bottom-5">Business Profile</h6>
					</div>
					</br>
<div class="col-md-5">
	<hr>
	<div class="form-group">
  			<label class="col-md-4 control-label lable" for="">Company Name<em class="em">*</em></label>
 				 <div class="col-md-8">
			 <input id="companyName" name="companyName" type="text" placeholder="Company Name" class="form-control input-sm">

 				 </div>
	</div>
	</div>
<div class="col-md-5">
	<hr>
	<div class="form-group">
  			<label class="col-md-4 control-label lable" for="">Company Logo</label>
 				 <div class="col-md-8">
			 <input id="busienssLogoPath" name="busienssLogoPath" type="file" accept="image/x-png,image/gif,image/jpeg" placeholder="Company Name" class="btn btn-sm">

 				 </div>
 				 <label class="col-md-8 col-md-offset-4 control-label lable" style="color:red;font-size:10px;font-weight:bold;text-align:left;">*Image should be less than 2MB.</label>
	</div>
	</div>

	<!-- Multiple Checkboxes -->
	<div class="col-md-5">
<div class="form-inline">
  <label class="col-md-4 control-label lable" for="">Company Type<em class="em">*</em></label>
  <div class="col-md-8">
  <div class="checkbox">
    <label for="-0">
      <input type="checkbox" name="busienssTypeName[]" id="-0" value="Manufacturer">
      Manufacturer
    </label>
	</div>
  <div class="checkbox">
    <label for="-1">
      <input type="checkbox" name="busienssTypeName[]" id="-1" value="Exporter">
      Exporter
    </label>
	</div>
  <div class="checkbox">
    <label for="-2">
      <input type="checkbox" name="busienssTypeName[]" id="-2" value="Importer">
      Importer
    </label>
	</div>
  <div class="checkbox">
    <label for="-3">
      <input type="checkbox" name="busienssTypeName[]" id="-3" value="Wholesale Supplier">
      Wholesale Supplier
    </label>
	</div>
  <div class="checkbox">
    <label for="-4">
      <input type="checkbox" name="busienssTypeName[]" id="-4" value="Service Provider">
      Service Provider
    </label>
	</div>
  <div class="checkbox">
    <label for="-5">
      <input type="checkbox" name="busienssTypeName[]" id="-5" value="Buyer">
      Buyer
    </label>
	</div>
  <div class="checkbox">
    <label for="-6">
      <input type="checkbox" name="busienssTypeName[]" id="-6" value="Trader">
      Trader
    </label>
	</div>
  <div class="checkbox">
    <label for="-7">
      <input type="checkbox" name="busienssTypeName[]" id="-7" value="Retailer">
      Retailer
    </label>
	</div>
  </div>
</div>
</div>


<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-8">
  <select class="form-control" id="industry" name ="industryID" onChange="getSubIndustry(this.value);" >
		<option>Industry</option>
		<?php
                              $q = $db->prepare("SELECT * FROM industrylist");
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {?>
                                <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                          <?php } ?>
  </select>
  </div>
</div>
</div>
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Sub Industry</label>
  <div class="col-md-8">


  <select id="subIndustry" name="IndustrySublistID" class="form-control" >
		<option>Sub Industry</option>

  </select>
  </div>
</div>
</div>





<!-- Text input-->

<!-- Text input-->
<!-- Select Basic -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Firm Type<em class="em">*</em></label>
  <div class="col-md-8">
    <select id="" name="firmTypeName" class="form-control">
      <option value="organization">Firm Type</option>
      <option value="partnership">Organization</option>
      <option value="proprietorship">Partnership</option>
      <option value="publicltd">Proprietorship</option>
      <option value="pvtltd">Public Ltd.</option>
      <option value="">Pvt Ltd.</option>
    </select>
  </div>
</div>
</div>




<!-- Text input-->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Establishment Year</label>
  <div class="col-md-8">
  <input id="" name="establishmentYear" type="number" placeholder="Establishment Year" class="form-control input-sm">

  </div>
</div>
</div>
<!-- Select Basic -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Level to Expand</label>
  <div class="col-md-8">
    <select id="" name="levelToExpand" class="form-control">
      <option value="local">Select Level</option>
      <option value="district">Local</option>
      <option value="state">District</option>
      <option value="national">State</option>
      <option value="international">National</option>
      <option value="">International</option>
    </select>
  </div>
</div>
</div>





<!-- Textarea -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Product / Service</label>
  <div class="col-md-8">
    <textarea class="form-control" id="" name="ProductAndServices">Product/Service</textarea>
  </div>
</div>
</div>

<!-- Multiple Radios (inline) -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="sample">Sample Provide</label>
  <div class="col-md-8">
    <label class="radio-inline" for="sample-0">
      <input type="radio" name="isSampleProvide" id="sample-0" value="yes" checked="checked">
      Yes
    </label>
    <label class="radio-inline" for="sample-1">
      <input type="radio" name="isSampleProvide" id="sample-1" value="no">
      No
    </label>
  </div>
</div>
</div>




<!-- Textarea -->
<div class="col-md-5">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">About Company</label>
  <div class="col-md-8">
    <textarea class="form-control" id="" name="aboutCompany">About Your Company</textarea>
  </div>
</div>

</div>
<!-- Multiple Checkboxes (inline) -->
<div class="col-md-10">
<div class="form-group">


  <div class="col-md-6  col-md-offset-3">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="checkboxes" id="checkboxes-0" value="yes" required>
      I agree and accept <a href="terms-and-conditions.php" class="col-black inline">Terms and Conditions </a><em class="em">*</em> & <a href="disclaimer.php" class="col-black inline">Disclaimer </a><em class="em">*</em>
    </label>

  </div>
</div>
</div>

<!-- Button -->
<div class="col-md-10">
<div class="form-group text-center">
  <label class="col-md-4 control-label lable" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" id="submit" name="submit" class="btn btn-primary" style="background-color: #0b3c5d;border-color: #0b3c5d;">Create Profile</button>
  </div>
</div>

</div>
</div>
				<div class="col-md-3">
				</div>

</fieldset>
</form>
</div>
</div>


		<!-- end of container -->

		</section>






  </div>




   <div class="tab-pane " id="tab_client" role="tabpanel">



   	<!--================================client==========================================-->
		<section class="aside-layout-section padding-top-20 padding-bottom-20">
		<div class="container bg-white ">



			<div class="row" style="margin-left:0px;margin-right: 0px; ">

				<div class="col-md-10">


				<form class="form-horizontal" action = "signupform.php" method="POST" enctype="multipart/form-data">
					<fieldset>

				<div class="row">
					<h6 class="text-center smallheading padding-top-5 padding-bottom-5">Login Information</h6>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-envelope" aria-hidden="true"></i> Email<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="clientEmail" name="clientEmail" type="email" placeholder="Email" class="form-control input-sm">

  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-key" aria-hidden="true"></i> Password<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="cpassword" name="cpassword" type="Password" placeholder="Password" class="form-control  input-sm">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label lable" for=""><i class="fa fa-key" aria-hidden="true"></i> Re-Enter Password<em class="em">*</em></label>
  <div class="col-md-4">
  <input id="cpasswordConfirm" name="cpasswordConfirm" type="Password" placeholder="Password" class="form-control input-sm">

  </div>
</div>
<hr ></hr>


				<!--=====================Login Information  End=====-->


<h6 class="text-center smallheading padding-top-5 padding-bottom-5">Contact Information</h6>

<!-- Text input-->
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="col-md-4 control-label lable" for=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Name<em class="em">*</em></label>
      <div class="col-md-8">
      <input id="clientName" name="clientName" type="text" placeholder="Name" class="form-control input-sm">

      </div>
    </div>

    <!-- Text input-->




    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Country<em class="em">*</em></label>
      <div class="col-md-8">
      <select  name="ccountryID" id="countryID"  class="form-control"  onChange="cgetState(this.value);" >
    		<option>Country</option>
    		<?php
                                  $q = $db->prepare("SELECT * FROM country");
                                  $q->execute();
                                  while($r = $q->fetch(PDO::FETCH_ASSOC))
                                  {?>
                                    <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>


                              <?php } ?>
      </select>

      </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">State<!-- <em class="em">*</em> --></label>
      <div class="col-md-8">
      <select  class="form-control" id="cstate-list" name="cstateID" onChange="cgetCity(this.value);" > <option>State</option>
      </select>

      </div>
    </div>


    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">City<!-- <em class="em">*</em> --></label>
      <div class="col-md-8">
      <select  class="form-control" id="ccity-list" name="ccityID"> <option>City</option>
      </select>

      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Street Address</label>
      <div class="col-md-8">
      <textarea id="clientStreetAddress" name="clientStreetAddress" type="text" placeholder="Enter your street address here" class="form-control input-sm"></textarea>

      </div>
    </div>

  </div>
  <div class="col-md-6">

    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Zip Code</label>
      <div class="col-md-8">
       <input id="czipCode" name="czipCode" type="number" placeholder="Zip Code" class="form-control input-sm">

      </div>
    </div>



    <!------row details end-->


    <!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Website</label>
      <div class="col-md-8">
      <input id="clientWebsite" name="clientWebsite" type="text" placeholder="Website" class="form-control input-sm">

      </div>
    </div>




    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Mobile No<em class="em">*</em></label>
      <div class="col-md-8">
      <input id="clientMobileNo" name="clientMobileNo" type="number" placeholder="Mobile No" class="form-control input-sm">

      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Landline No</label>
      <div class="col-md-8">
     <input id="clientLandline" name="clientLandline" type="number" placeholder="Landline No" class="form-control input-sm">

      </div>
    </div>



    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Contact 2</label>
      <div class="col-md-8">
      <input id="clientContact2" name="clientContact2" type="number" placeholder="Mobile No" class="form-control input-sm">

      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label lable" for="">Fax No</label>
      <div class="col-md-8">
     <input id="clientFaxNo" name="clientFaxNo" type="number" placeholder="Landline No" class="form-control input-sm">

      </div>


    	</div>

  </div>
</div>




<hr ></hr>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Industry<em class="em">*</em></label>
  <div class="col-md-8">
  <select type="multiselect" class="form-control" id="industry" name ="cindustryID" onChange="cgetSubIndustry(this.value);" >
		<option>Industry</option>
		<?php
                              $q = $db->prepare("SELECT * FROM industrylist");
                              $q->execute();
                              while($r = $q->fetch(PDO::FETCH_ASSOC))
                              {?>
                                <option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>
                          <?php } ?>
  </select>
  </div>
</div>

</div>
<div class="col-md-6">
<div class="form-group">
  <label class="col-md-4 control-label lable" for="">Sub Industry</label>
  <div class="col-md-8">

  <select id="csubIndustry" name="cIndustrySublistID" class="form-control" >
		<option>Sub Industry</option>

  </select>
  </div>
</div>
</div>
</div>

<!-- Text input-->

<!-- Text input-->
</div>
<!-- Multiple Checkboxes (inline) -->

<div class="form-group">


  <div class="col-md-6  col-md-offset-3">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="checkboxes" id="checkboxes-0" value="yes" required>
   I agree and accept <a href="terms-and-conditions.php" class="col-black inline">Terms and Conditions </a><em class="em">*</em> & <a href="disclaimer.php" class="col-black inline">Disclaimer </a><em class="em">*</em>
    </label>

  </div>
</div>


<!-- Button -->

<div class="form-group text-center">
  <label class="col-md-4 control-label lable" for="submit"></label>
  <div class="col-md-4">
    <button type="submit" id="csubmit" name="csubmit" class="btn btn-primary" style="background-color: #0b3c5d;border-color: #0b3c5d;">Create Profile</button>
  </div>
</div>


				<div class="col-md-3">
				</div>

</fieldset>
</form>
</div>
</div>
		</div><!-- end of container -->

		</section>

  </div>
</div>

		<!--================================client end==========================================-->


		<!--================================ FOOTER AREA ==========================================-->

		<?php include('includes/footer.php');?>


</body>


</html>
