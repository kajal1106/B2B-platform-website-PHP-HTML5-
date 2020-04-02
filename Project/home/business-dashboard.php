<?php

$pagetitle="Business Dashboard";
include('includes/config.php');
if( !$user->is_logged_in() ){ header('Location: index.php'); }
include('includes/head.php');
$change="";
$abc="";
 define ("MAX_SIZE","800");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
  $errors=0;
	?>


<body style="overflow:hidden;">
<?php
	if(isset($_FILES['fileName']))
	{
		$fileName = $_FILES['fileName']['name'];
		$tempName = $_FILES['fileName']['tmp_name'];
		if(isset($fileName))
		{
			if(!empty($fileName))
			{
				$stmt = $db->prepare('SELECT * from businesslogo WHERE businessID = :businessID');
				$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
				$stmt->execute();

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if($row['busienssLogoPath']!="Mylogo/default.png")
				{
					unlink($row['busienssLogoPath']);
				}

				$location = "Mylogo/";

	      if(isset($fileName))
	      {
	        $filename1 = stripslashes($_FILES['fileName']['name']);

	      		$extension = getExtension($filename1);
	     		$extension = strtolower($extension);


	     if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
	     		{

	     			$change='<div class="msgdiv">Unknown Image extension </div> ';
	     			$errors=1;
	     		}
	     		else
	     		{

	     $size=filesize($_FILES['fileName']['tmp_name']);


	    if ($size > MAX_SIZE*1024 || $size == 0)
	    {
	    	echo "<script type='text/javascript'>alert('file limit excited...');</script>";
	    	$errors=1;
	    }
      else{

	    if($extension=="jpg" || $extension=="jpeg" )
	    {
	    $uploadedfile = $_FILES['fileName']['tmp_name'];
	    $src = imagecreatefromjpeg($uploadedfile);

	    }
	    else if($extension=="png")
	    {
	    $uploadedfile = $_FILES['fileName']['tmp_name'];
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

      $watermark = imagecreatefrompng('images/watermark.png');

      $water_width = imagesx($watermark);
      $water_height = imagesy($watermark);
      $dime_x = 0;
      $dime_y = 0;
      imagecopy($tmp, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

	    imagejpeg($tmp,$filename,100);
	    imagedestroy($src);
	    imagedestroy($tmp);


					$a = $filename;
					$stmt = $db->prepare("UPDATE businesslogo set busienssLogoPath = :busienssLogoPath where businessID = :businessID");
		    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
		    	$stmt->bindParam(':busienssLogoPath', $a, PDO::PARAM_STR);
		    	$stmt->execute();
        }
        if($errors==1)
        {
        $a ="Mylogo/default.png";
    		$stmt = $db->prepare("UPDATE businesslogo set busienssLogoPath = :busienssLogoPath where businessID = :businessID");
    		$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
    		$stmt->bindParam(':busienssLogoPath', $a, PDO::PARAM_STR);
    		$stmt->execute();
        }
				}
      }
			}
		}
		header("Refresh:0");
	}
	if(isset($_POST['resetpic'])){
		$stmt = $db->prepare('SELECT * from businesslogo WHERE businessID = :businessID');
		$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['busienssLogoPath']!="Mylogo/default.jpg")
		{
			unlink($row['busienssLogoPath']);
		}
		$a ="Mylogo/default.png";
		$stmt = $db->prepare("UPDATE businesslogo set busienssLogoPath = :busienssLogoPath where businessID = :businessID");
		$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
		$stmt->bindParam(':busienssLogoPath', $a, PDO::PARAM_STR);
		$stmt->execute();
		header("Refresh:0");
	}


?>

		<!--================================responsive log and menu==========================================-->

		<!--================================HEADER==========================================-->
	<?php include('includes/header-logout.php');?>

		<!--================================ABOUT SECTION========================================== -->

<style type="text/css">
		.nav-pills>li>a {
    border-radius: 4px;
    color: black;
    font-weight: bold;
}

</style>
		<div class="container ">
			<?php
						if(isset($_GET['action']))
						{
							if($_GET['action']=='error')
							{
								echo "<script type='text/javascript'>alert('wrong username and password...');</script>";
							}
							if($_GET['action']=='not')
							{
								echo "<script type='text/javascript'>alert('User Not Selected');</script>";
							}
							if($_GET['action']=='joined')
							{
								echo "<script type='text/javascript'>alert('Activation successful..');</script>";
							}
							if($_GET['action']=='success')
							{
								echo "<script type='text/javascript'>alert('product add successful..');</script>";
							}
						}

			?>

<div class="row padding-top-100 padding-bottom-100">
<div class="col-md-12  " style="background-color:white;">
<!--Style for nav menu items-->
<style>



.navheader{
  font-size:14px;
  font-weight: bold;
}


</style>
 <style media="screen">
        .loader {
                border: 16px solid #f3f3f3; /* Light grey */
                border-top: 16px solid #3498db; /* Blue */
                border-radius: 50%;
                width: 120px;
                height: 120px;
                animation: spin 2s linear infinite;
              }

              @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
              }
        </style>
<!--Style for nav menu items-->

  <ul class="nav nav-pills nav-justified">
  	<!--li ><a href="#tab_a" data-toggle="pill">Dashboard</a></li-->
    <li class="active bg-info"><a href="#tab_b" data-toggle="pill" class="navheader">My Profile</a></li>
    <!--li class="bg-info"><a href="#tab_c" data-toggle="pill" class="navheader">My Products</a></li-->
    <li class="bg-info"><a href="#tab_d" data-toggle="pill" class="navheader"> My Leads</a></li>
    <li class="bg-info"><a href="#tab_e" data-toggle="pill" class="navheader"> My Enquiries</a></li>
     <li class="bg-info"><a href="#tab_f" data-toggle="pill" class="navheader"><i class="fa fa-cog " style="font-size:140%;" aria-hidden="true"></i></a></li>
  </ul>


  <div class="tab-content" style="min-height:500px;">



   <!--================================Dashboard Section Start=====================================-->
  <!--div class="tab-pane " id="tab_a" role="tabpanel">





  </div-->

 <!--================================Dashboard Section End=====================================-->





  <!--================================My Profile Section Starts=====================================-->

  <div class="tab-pane active" id="tab_b" role="tabpanel">

<style type="text/css">

.small{
  font-size:15px;
}
  </style>


  <section class="aside-layout-section">
      <div class="container"><!-- section container -->
        <div class="row padding-top-30"><!-- row -->
          <div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
            <div class="blog-section padding-bottom-1">
              <div class="entry-wrap shadow-1" style="border:1px solid;"><!-- blog entry -->
                <div class="pull-right hidden-xs" style="margin-top:1%;margin-right:1%;margin-bottom:1%">
    <button class="btn-warning btn-xs  edit" style="background-color: #0b3c5d;border-color: #0b3c5d;">Edit</button>
    <button id="save" name="save" class="btn-success btn-xs  save" style="background-color: orange;border-color: orange;" disabled>Save</button>
    </div>
                <br>
                <div class="entry-content row" >
                <div class=" col-md-3 col-lg-3 col-sm-3 col-xs-12 ">
									<?php
											$stmtfetch = $db->prepare('SELECT * FROM businesslogo WHERE businessID = :businessID');
											$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$businessLogoPath = $row['busienssLogoPath'];
									?>
									<div style="margin:0px 10% 0px 10%;" >
									<form id="form" action="business-dashboard.php" method="post"  class="" enctype="multipart/form-data">
											<center ><img  src="<?php echo DIR.$businessLogoPath;?>"  alt="Image Not Available" style="margin:0% auto;" class="business-logo thumbnail  img-responsive image-rounded">
											<input type="file" id="fileName"  name="fileName"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ><br>
								      <input type="button" class="btn btn-xs btn-warning" style="background-color: #0b3c5d;border-color: #0b3c5d;" id="moveFile" name="moveFile" value="Change">
											<button type="submit" name="resetpic" class="btn btn-xs btn-danger" style="background-color: orange;border-color: orange;"  id="resetpic" >Remove</button>
											<input type="submit" id="move" name="moveFile1" style ="display: none;">
									</form>

									<br><label style="color:red;font-size:10px;font-weight:bold;text-align:center;">*Image should be less than 2MB.</label>
								<div class="visible-xs" style="margin-top:1%;margin-right:1%;margin-bottom:1%">
    							<button class="btn-warning btn-xs  edit">Edit</button>
   								 <button id="save" name="save" class="btn-success btn-xs  save" disabled>Save</button><br>
   							 </div>
   							 </center>


								</div>
                </div>
               	<div class="col-md-9 col-sm-9 col-lg-9 col-xs-12" style="padding-left:20px;" >
                  <div class="row">
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <label class="small-label-size inline" style="font-weight: 600;">Country:
											<?php
													$stmtfetch = $db->prepare('SELECT * FROM country WHERE countryID = (select countryID from businessaddress where businessID = :businessID)');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$countryName = $row['countryName'];
                          $countryID = $row['countryID'];
											?>
                  <select id="country" class="input-sm inline form-control"  disabled >
										<option value="<?php echo $row['countryID'];?>" class="selected-item"> <?php echo $countryName; ?></option>
										<?php
								                              $q = $db->prepare("SELECT * FROM country");
								                              $q->execute();
								                              while($r = $q->fetch(PDO::FETCH_ASSOC))
								                              {?>
								                                <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>


								                          <?php } ?>
                  </select></label><br>
									<?php
											$stmtfetch = $db->prepare('SELECT * FROM businessprofile WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$isSampleProvide = $row['isSampleProvide'];
											$levelToExpand = $row['levelToExpand'];
											$businessOffer = $row['businessOffer'];

									?>


                  </div>
               <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                  <label class="small-label-size inline" style="font-weight: 600;">Provides Sample :</span></label>
										<select class="input-sm inline form-control" name="isSampleProvide" id="isSampleProvide" disabled >
											<option value="<?php echo $isSampleProvide;?>" class="selected-item"> <?php echo $isSampleProvide;?></option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
										</select>

                    <!--span class="label label-success">TRUSTED: </span> <span class="label label-success"> <label class="score-callback" data-score="5">    </span-->
               </div>
</div>
<div class="row">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">


       <label class="small-label-size inline" style="font-weight: 600;">
       	<b>Offer : </b><select id="offer"  class="input-sm inline form-control" disabled>
       	<option value="<?php echo $businessOffer;?>" class="selected-item" >
       		<?php echo $businessOffer;?></option>
												<option value="NO OFFER">NO OFFER</option>
												<option value="1%-10%">1%-10%</option>
												<option value="11%-20%">11%-20%</option>
												<option value="21%-30%">21%-30%</option>
												<option value="31%-40%">31%-40%</option>
												<option value="41%-50%">41%-50%</option>
												<option value="51%-60%">51%-60%</option>
												<option value="61%-70%">61%-70%</option>
												<option value="71%-80%">71%-80%</option>
												<option value="81%-90%">81%-90%</option>
												<option value="81%-90%">81%-90%</option>
											</select>
                  </label>

                  </div>

                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                    	<label class="small-label-size inline" style="
    font-weight: 600;
">Expanding Level :
										<select class="input-sm inline form-control uppercase" id="levelToExpand" name="levelToExpand" disabled >
													<option value="<?php echo $levelToExpand;?>" class="selected-item"> <?php echo $levelToExpand;?></option>
													<option value="local">Local</option>
													<option value="district">District</option>
													<option value="state">State</option>
													<option value="national">National</option>
													<option value="international">International</option>
                  </select></label>
              </div>
                  </div>

                    <div class="row padding-top-10">


<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
											<?php
													$stmtfetch = $db->prepare('SELECT businessName FROM businesscontactinformation WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$businessName = $row['businessName'];

											?>
                    <label class="small-label-size inline" style="
    font-weight: 600;
">Business Name: <input class="input-sm inline form-control" type="text" id="businessName" name ="businessName" value="<?php echo $businessName;?>" disabled>
											</label>
										</div>

                </div>


                <div class="row padding-top-10">

                   <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                      <label class="small-label-size inline" style="
    font-weight: 600;
">Industry Type:
											<?php
													$stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM businessindustry WHERE businessID = :businessID)");
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$industryID = $row['industryID'];
													$industryName = $row['industryName'];

											?>
                      <select  class="input-sm inline form-control" id="industryID" name ="industryID" onChange="getSubIndustry(this.value);" disabled >
												<option value ="<?php echo $industryID ;?>" class="selected-item"><?php echo $industryName ;?></option>
                      <?php
														$q = $db->prepare("SELECT * FROM industrylist");
														$q->execute();
														while($r = $q->fetch(PDO::FETCH_ASSOC))
														{?>
															<option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>


												<?php } ?>

                  </select></label>

</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">






									<?php
											$stmtfetch = $db->prepare("select * from industrysublist where IndustrySublistID = (SELECT IndustrySublistID FROM industrysubtype WHERE businessID = :businessID)");
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$subindustryID = $row['IndustrySublistID'];
											$subindustryName = $row['subindustryName'];

									?>
									                      <label class="small-label-size inline" style="font-weight: 600;"> Sub Industry Type:
                     <select id="subIndustry" class ="inline form-control" name="IndustrySublistID" disabled >
												<option value ="<?php echo $subindustryID;?>" class="selected-item"><?php echo $subindustryName;?></option>
                  </select>



                    </label>

                </div>


                </div>

</div>
              </div><!-- blog entry end -->

            </div>
          </div>
        </div>
      </div>

<hr class="visible-xs">
<div class="container bg-white" >
<ul class="nav nav-pills nav-stacked col-md-2 " >

  <li><a href="#tab_about"  data-toggle="pill">About</a></li>
   <li class="active"><a href="#tab_product" data-toggle="pill">Products</a></li>
    <li><a href="#tab_offers" data-toggle="pill">Offers</a></li>
       <li><a href="#tab_contact" data-toggle="pill">Contact Us</a></li>
       <hr class="visible-xs">
    <div class="row padding-top-30 padding-bottom-30 hidden-xs">
<label class="padding-top-20 strong col-black">SOCIAL CONNECT</label>

<div class="padding-top-20">
  <?php
        $stmt = $db->prepare('SELECT * from businesssocialinformation WHERE businessID = :businessId');
        $stmt->bindParam(':businessId', $_SESSION['businessID'], PDO::PARAM_INT);
        $stmt->execute();
        $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
      <a class="inline" href="<?php echo $r1['facebookLink']?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
       <a class="inline" href="<?php echo $r1['twitterLink']?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
      <a class="inline" href="<?php echo $r1['instagramLink']?>" target="_blank"> <i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
      <a class="inline" href="<?php echo $r1['googleplus']?>" target="_blank"> <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
       <a class="inline" href="<?php echo $r1['linkedin']?>" target="_blank"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
      <a class="inline" href="<?php echo $r1['youtube']?>" target="_blank"> <i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
</div>
 <button class="btn-warning btn-xs " style="background-color: orange;border-color: orange;" data-toggle="modal" data-target="#exampleModal">Edit</button>
<div >

    <!--button class="btn-success btn-xs small">Save</button-->



    <!--  Social Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Social Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<?php
					$stmtfetch = $db->prepare("select * from businesssocialinformation where businessID = :businessID");
					$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
					$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
					$facebookLink = $row['facebookLink'];
					$instagramLink = $row['instagramLink'];
					$twitterLink = $row['twitterLink'];
          $googleplus=$row["googleplus"];
          $linkedin=$row["linkedin"];
          $youtube=$row["youtube"];
				?>
<div class="row">



<div class="col-md-8 col-md-offset-2">
<style type="text/css">
    .errspan {
        float: right;
        margin-right: 6px;
        margin-top: -28px;
        position: relative;
        z-index: 2;
        color: gray;
    }
</style>

<input type="text" id="facebook"  class="form-control" value="<?php echo $facebookLink;?>" disabled/><span><i class="fa fa-facebook-square fa-2x errspan" aria-hidden="true"></i></span><br>
<input type="text" id="instagram" class="form-control" value ="<?php echo $instagramLink;?>" disabled /><span><i class="fa fa-instagram fa-2x errspan" aria-hidden="true"></i></span><br>
<input type="text" id="twitter"  class="form-control" value ="<?php echo $twitterLink;?>" disabled/><span><i class="fa fa-twitter fa-2x errspan" aria-hidden="true"></i></span><br>
<input type="text" id="google" class="form-control" value ="<?php echo $googleplus?>" disabled /><span><i class="fa fa-google-plus fa-2x errspan" aria-hidden="true"></i></span><br>
<input type="text" id="linkedin" class="form-control" value ="<?php echo $linkedin?>" disabled /><span><i class="fa fa-linkedin fa-2x errspan" aria-hidden="true"></i></span><br>
<input type="text" id="youtube" class="form-control" value ="<?php echo $youtube?>" disabled/><span><i class="fa fa-youtube fa-2x errspan" aria-hidden="true"></i></span><br>

</div>
</div>

      </div>
      <div class="modal-footer">
				<button type="button" class="btn btn-primary saveModal">Save</button>
				<button type="button" class="btn btn-primary editModal">Edit</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>




    </div>
</div>
</ul>

<div class="tab-content col-md-10">





  <!--======================================PRODUCTS TAB START=======================================-->
        <div class="tab-pane active" id="tab_product">


           <div class="container col-md-12"><!-- section container -->

          <div class="add-listing-wrapper">
            <div class="listing-main gridview tab-content">
                <div id="latest-listing" class="tab-pane active">
                  <div class="listing-wrapper row">
                    <div class="item col-md-2 col-lg-2 col-sm-2 col-xs-6 thumbnail"><!-- .ITEM -->
                      <div class="listing-item clearfix">
                        <div class="figure">
                          <img src="images/add_product.png" class="small-img-box image-rounded border" alt="listing item" data-toggle="modal" data-target="#product_add"/>

                        </div>
                        <div class="listing-content clearfix">

                          <div class="listing-title">
                            <label><a class="col-black left-align"  data-toggle="modal" data-target="#product_add">Add Product</a></label>
                          </div>

                          <div class="listing-location pull-left"><!-- location-->


                          </div><!-- location end-->
                          <!--div class="star-rating pull-right">
                            <div class="score-callback" data-score="5"></div>
                          </div><!-- rating end-->
                        </div>
                      </div>
                      <div class="listing-border-bottom bgyallow-1"></div>
                    </div><!-- /.ITEM -->

										<?php
										$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath FROM porductinformation
											LEFT JOIN productimage ON porductinformation.productID = productimage.productID
											WHERE porductinformation.businessID = :businessID group by productID ;');
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
										while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
													{
										echo '<div class="item col-md-2 col-sm-2 col-xs-6 thumbnail"><!-- .ITEM -->
                      <div class="listing-item clearfix">
                        <div class="figure">
                          <img src="'.DIR.$row[2].'" class="small-img-box image-rounded border" alt="listing item"/>
                          <div class="listing-overlay">
                            <div class="listing-overlay-inner rgba-bgyallow-1">
                              <div class="overlay-content">
                                <ul class="listing-links">
                                  <!--li><a class="bgwhite nohover" href="#"><i class="fa fa-heart green-1 "></i></a></li-->
                                  <li><button class="bgwhite nohover deleteproduct" id="'.$row[0].'"><i class="fa fa-times red-1"></i></button></li>
                                  <li><button class="bgwhite nohover updateproduct" id="'.$row[0].'" data-toggle="modal" data-target="#product_edit"><i class="fa fa-pencil blue-1"></i></button></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="listing-content clearfix">

                          <div class="listing-title">
                            <label><a class="col-black left-align single-line-product" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a></label>
                          </div>


                        </div>
                      </div>
                      <div class="listing-border-bottom bgyallow-1"></div>
                    </div><!-- /.ITEM -->';
									}
											?>

                  </div>
                </div>
            </div>
          </div>
        </div><!-- section container end -->
			</div>




        <!--======================================PRODUCTS TAB END=======================================-->


        <!--======================================ABOUT TAB START=======================================-->
        <div class="tab-pane" id="tab_about">
        	<div class="text-center visible-xs" >
              <button class="btn-warning btn-xs editabout">Edit</button>
              <button class="btn-success btn-xs saveabout">Save</button>
         </div>
          <div class="pull-right hidden-xs" style="margin-top:1%;margin-right:1%;margin-bottom:1%;">
              <button class="btn-warning btn-xs editabout">Edit</button>
              <button class="btn-success btn-xs saveabout">Save</button>
         </div>
            <div class="col-md-10 col-md-offset-1 padding-top-30">
							<?php
										$stmtfetch = $db->prepare('SELECT aboutCompany FROM businessprofile WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
										$aboutCompany = $row['aboutCompany'];
							?>
          <textarea cols="15" rows="6" class="form-control " id="about" disabled><?php echo $aboutCompany;?></textarea>
        </div>
        </div>

          <!--======================================ABOUT TAB END=======================================-->






            <!--======================================CONTACT TAB START=======================================-->
        <div class="tab-pane" id="tab_contact">
					<div class="form-horizontal">

		<div class="text-center  padding-top-10 padding-bottom-10 visible-xs" >
            <button class="btn-warning btn-xs  editcontact">Edit</button>
            <button class="btn-success btn-xs savecontact">Save</button>
         </div>

      <div class="pull-right  padding-top-10 padding-bottom-10 hidden-xs" style="margin-top:1%;margin-right:1%;">
            <button class="btn-warning btn-xs  editcontact">Edit</button>
            <button class="btn-success btn-xs savecontact">Save</button>
         </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

                <fieldset>
									<?php
												$stmtfetch = $db->prepare('SELECT * FROM businessaddress WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessStreetAddress = $row['businessStreetAddress'];
                        $zipCode = $row['zipCode'];
                        $stmtfetch1 = $db->prepare('SELECT * FROM state WHERE stateID = :stateID');
												$stmtfetch1->execute(array(':stateID' => $row['stateID']));
												$row1 = $stmtfetch1->fetch(PDO::FETCH_ASSOC);
                        $state = $row1['stateName'];
                        $stateID  = $row1["stateID"];
                        $stmtfetch1 = $db->prepare('SELECT * FROM city WHERE cityID = :cityID');
												$stmtfetch1->execute(array(':cityID' => $row['cityID']));
												$row1 = $stmtfetch1->fetch(PDO::FETCH_ASSOC);
                        $city = $row1['cityName'];
                        $cityID = $row1['cityID'];
												$stmtfetch = $db->prepare('SELECT * FROM businesscontactinformation WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessWebsite = $row['businessWebsite'];
												$businessMobileNo = $row['businessMobileNo'];
                        $businessContact2 = $row['businessContact2'];
                        $businessLandline = $row['businessLandline'];
                        $businessFaxNo = $row['businessFaxNo'];

												$stmtfetch = $db->prepare('SELECT businessEmail FROM business WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessEmail = $row['businessEmail'];

									?>

<!-- Textarea -->

 <div class="form-group">
      <label class="col-md-2 control-label strong col-black" for="">Address</label>
          <div class="col-md-10">
              <textarea class="form-control input-sm" id="address" name="" disabled><?php echo $businessStreetAddress;?></textarea>
          </div>
  </div>

<div class="row">

	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="textinput">Country</label>
  <div class="col-md-8">
  <select name="countryID" id="countryID" value="" class="form-control input-sm" onChange="getState(this.value);" disabled>
  	<option value="<?php echo $countryID;?>" class="selected-item"> <?php echo $countryName; ?></option>
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
  <label class="col-md-4 control-label strong col-black" for="">City</label>
  <div class="col-md-8">
  <select  class="form-control" id="city-list" name="cityID" disabled>
  	<option value="<?php echo $cityID;?>"><?php echo $city;?></option>
  </select>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="">Landline</label>
  <div class="col-md-8">
  <input id="landlineno" name="" type="number"  value="<?php echo $businessLandline;?>" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="">Contact 1</label>
  <div class="col-md-8">
  <input id="mobile" name="" type="text" value="<?php echo $businessMobileNo;?>" class="form-control input-sm"  disabled>

  </div>
</div>



	<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="textinput">Website</label>
  <div class="col-md-8">
  <input id="website" name="textinput" type="number" value="<?php echo $businessMobileNo;?>" class="form-control input-sm"  disabled>

  </div>
</div>



</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
	<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="textinput">State</label>
  <div class="col-md-8">
    <select  class="form-control" id="state-list" name="stateID" disabled onChange="getCity(this.value);" >
      <option value="<?php echo $stateID;?>"><?php echo $state;?></option>
  </select>

  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="">Zipcode</label>
  <div class="col-md-8">
  <input id="zicode" name="" type="email"  value="<?php echo $zipCode;?>" class="form-control input-sm" disabled>

  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="">Contact 2</label>
  <div class="col-md-8">
  <input id="contact2" name="" type="text" value="<?php echo $businessContact2;?>" class="form-control input-sm"  disabled>

  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label strong col-black" for="textinput">Fax No</label>
  <div class="col-md-8">
  <input id="faxno" name="textinput" type="number" value="<?php echo $businessFaxNo;?>" class="form-control input-sm"  disabled>

  </div>
</div>

</div>
</div>

<div class="row">

	<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<!-- Text input-->


<!-- Text input-->




</div>

</div>
<hr>
<div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12" >
            	<label class="padding-top-5 padding-bottom-5 strong col-black">Support</label>
            	<hr>
<!-- Text input-->

<?php
			$stmtfetch = $db->prepare('SELECT * FROM businesssupportperson WHERE businessID = :businessID');
			$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
			$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
			$busienssPersonName = $row['busienssPersonName'];
			$busienssPersonEmail = $row['busienssPersonEmail'];
			$busienssPersonContact = $row['busienssPersonContact'];
?>
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-4 control-label strong col-black" for="">Name</label>
</div>
  <div class="col-md-8">
  <input id="busiensssupportPersonName" name="busiensssupportPersonName" type="text" placeholder="Name" class="form-control input-sm" value="<?php echo $busienssPersonName;?>" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-4 control-label strong col-black" for="">Email</label>
</div>
  <div class="col-md-8">
  <input id="busiensssuportPersonEmail" name="busiensssuportPersonEmail" type="email" placeholder="Email" class="form-control input-sm" value="<?php echo $busienssPersonEmail;?>" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-4 control-label strong col-black" for="">Contact No</label>
</div>
  <div class="col-md-8">
  <input id="busiensssupportPersonContact" name="busiensssupportPersonContact" type="text" placeholder="Contact No" class="form-control input-sm" value="<?php echo $busienssPersonContact;?>" disabled>

  </div>
</div>


</div>

  <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12" >
            	<label class="text-center padding-top-5 padding-bottom-5 strong col-black"> Sales</label>
            	<hr>
<!-- Text input-->
<?php
			$stmtfetch = $db->prepare('SELECT * FROM businesssalesperson WHERE businessID = :businessID');
			$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
			$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
			$busienssPersonName = $row['busienssPersonName'];
			$busienssPersonEmail = $row['busienssPersonEmail'];
			$busienssPersonContact = $row['busienssPersonContact'];
?>
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-2 control-label strong col-black" for="">Name</label>
</div>
  <div class="col-md-8">
  <input id="busiensssalesPersonName" name="busienssSalesPersonName" type="text" placeholder="Name" class="form-control input-sm" value="<?php echo $busienssPersonName;?>" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-2 control-label strong col-black" for="">Email</label>
</div>
  <div class="col-md-8">
  <input id="busiensssalesPersonEmail" name="busienssSalesPersonEmail" type="email" placeholder="Email" class="form-control input-sm" value="<?php echo $busienssPersonEmail;?>" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<div class="col-md-4">
	<label class="col-md-2 control-label strong col-black" for="">Contact No</label>
</div>
  <div class="col-md-8">
  <input id="busiensssalesPersonContact" name="busienssSalesPersonContact" type="text" placeholder="Contact No" class="form-control input-sm" value="<?php echo $busienssPersonContact;?>" disabled>

  </div>
</div>

</fieldset>
</div>






<!--======================USER MAP CANVAS=================-->

      <!--div id="map_canvas" style="height:300px!important;"></div-->


<!--======================USER MAP CANVAS=================-->
      </div>
        </div>
    </div>
<!--======================================CONTACT TAB END=======================================-->


<!--======================================OFFERS TAB START=======================================-->

        <div class="tab-pane" id="tab_offers">


  <div class="container col-md-12"><!-- section container -->

          <div class="add-listing-wrapper">
            <div class="listing-main gridview tab-content">
                <div id="latest-listing" class="tab-pane active">
                  <div class="listing-wrapper row">

										<?php
										$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath, porductinformation.productOffer FROM porductinformation
											LEFT JOIN productimage ON porductinformation.productID = productimage.productID
											WHERE porductinformation.businessID = :businessID group by productID ;');
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
										while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
													{
														if($row[3]!='')
														{
										echo '<div class="item  col-md-2 col-sm-2 col-xs-6  thumbnail"><!-- .ITEM -->

                      <div class="listing-item clearfix">
                        <div class="figure">
                        <div class="ribbon"><span>'.$row[3].'%</span></div>
                          <img src="'.DIR.$row[2].'" class="small-img-box" alt="listing item"/>

                        </div>
                        <div class="listing-content clearfix">
                          <!--div class="listing-meta-cat">
                            <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                          </div-->
                          <div class="listing-title">
                            <label><a class="col-black left-align single-line-product" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a></label>
                          </div>




                        </div>
                      </div>
                      <div class="listing-border-bottom bgyallow-1"></div>
                    </div><!-- /.ITEM -->';
									}}
											?>


                  </div>
                </div>
            </div>
          </div>
        </div><!-- section container end -->





        </div>
 <!--======================================OFFERS TAB END=======================================-->

</div><!-- tab content -->
<hr class="visible-xs">

<!--FOOTER SOCIAL MOBILE -->
 <div class="row padding-top-10 padding-bottom-10 visible-xs" style="border:1px solid;">

<div class="padding-top-10 text-center">
	<label class="padding-top-10 strong col-black">SOCIAL CONNECT</label><br>

  <?php
        $stmt = $db->prepare('SELECT * from businesssocialinformation WHERE businessID = :businessId');
        $stmt->bindParam(':businessId', $_SESSION['businessID'], PDO::PARAM_INT);
        $stmt->execute();
        $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
      <a class="inline" href="<?php echo $r1['facebookLink']?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
       <a class="inline" href="<?php echo $r1['twitterLink']?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
      <a class="inline" href="<?php echo $r1['instagramLink']?>" target="_blank"> <i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
       <a class="inline" href="" target="_blank"> <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
       <a class="inline" href="" target="_blank"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
      <a class="inline" href="" target="_blank"> <i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
<br><button class="btn-warning btn-xs " data-toggle="modal" data-target="#exampleModal">Edit</button>
</div>

</div >

</div><!-- end of container -->

    </section>


  </div>






<!--================================My Profile Section Ends=====================================-->



  <div class="tab-pane bg-white" id="tab_c" role="tabpanel">

<?php include('includes/product-add.php');?>




  </div>

 <div class="tab-pane" id="tab_d" role="tabpanel">
<div class="pull-right   padding-top-10 padding-bottom-10">
<button class="btn-sm btn-primary pull-right" style="background-color: #0b3c5d;border-color: #0b3c5d;" data-toggle="modal" data-target="#addlead">POST LEAD</button>


<!-- Modal -->
<div class="modal fade" id="addlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus-circle" aria-hidden="true"></i>Post Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

            <div class="row">


              <div class="col-md-12  col-xs-12 col-sm-12">

<form class="form-horizontal" action="addLead.php" method="POST" enctype="multipart/form-data">
<fieldset>



<!-- Multiple Radios (inline) -->
<div class="form-group ">
  <label class="col-md-4 col-xs-4 control-label" for="radios">Offer Type</label>
  <div class="col-md-8 col-xs-4 ">
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="offerType" id="radios-0" value="buy" checked="checked">
      Buy
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="offerType" id="radios-1" value="sell">
      Sell
    </label>
    <label class="radio-inline" for="radios-2">
      <input type="radio" name="offerType" id="radios-2" value="business">
      Business
    </label>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="radios">Select</label>
  <div class="col-md-8 col-xs-8">
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="selectType" id="radios-0" value="product" checked="checked">
      Product
    </label>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="selectType" id="radios-1" value="services">
      Services
    </label>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="">Lead Name</label>
  <div class="col-md-6 col-xs-8">
  <input id="" name="leadName" type="text" required placeholder="Lead Name" class="form-control input-md">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label" for="leaddescription">Lead Description</label>
  <div class="col-md-6 col-xs-8">
    <textarea class="form-control" cols="250"  id="leaddescription" Name="leadDescription"></textarea>
  </div>
</div>
<hr>
<!-- File Button -->



<div class="row ">

  <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                       <img  id="uploadPreview1" class="small-img-box " src="images/noimage.jpeg" alt="NO IMAGE" >
                         <label class="btn btn-xs btn-success addlabel" ><i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName1"  name="fileName1"  accept="image/x-png,image/gif,image/jpeg" style ="display: none; " onchange="PreviewImage1();"></label>
   </div>

  </div>


  <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" >
  <div class="figure">
                      <img  id="uploadPreview2"  class="small-img-box " src="images/noimage.jpeg"  alt="NO IMAGE" >

                         <label class="btn btn-xs btn-success addlabel" ><i class="fa fa-plus" aria-hidden="true"></i>ADD
                           <input type="file" id="fileName2"  name="fileName2"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImage2();"></label>
                    </div>

  </div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6   thumbnail" >
  <div class="figure">
                       <img  id="uploadPreview3"  class="small-img-box" src="images/noimage.jpeg"   alt="NO IMAGE" >
                         <label class="btn btn-xs btn-success addlabel" > <i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName3"  name="fileName3"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImage3();"></label>
                    </div>

  </div>
	<div class="col-md-3 col-sm-3 col-lg-3 col-xs-6   thumbnail" >
  <div class="figure">
                       <img  id="uploadPreview4"  class="small-img-box" src="images/noimage.jpeg"   alt="NO IMAGE" >
                         <label class="btn btn-xs btn-success addlabel" ><i class="fa fa-plus" aria-hidden="true"></i>ADD
                          <input type="file" id="fileName4"  name="fileName4"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImage4();"></label>
     </div>

  </div>
  <label style="color:red;font-size:10px;font-weight:bold;text-align:center;">*Image should be less than 2MB.</label>
  </div>
<hr>
<!-- Button -->
<div class="form-group">

  <div class="col-md-4 col-md-offset-5">
    <button id="submit" name="submit" class="btn btn-success">Submit</button>
  </div>
</div>

</fieldset>
</form>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</div>

<div class="row padding-top-60">
  <div class="col-md-6  padding-top-10">
   	<h6 style="text-align:center;" class=" bg-warning">Incoming Leads</h6>
   	<ul class="nav nav-pills nav-justified">

    <li class="active bg-info"><a href="#tab_business_leads" data-toggle="pill" class="navheader">Business Leads</a></li>
    <li class="bg-info"><a href="#tab_client_leads" data-toggle="pill" class="navheader">Client Leads</a></li>
     </ul>


  <div class="tab-content" style="min-height:60%;">



   <!--================================Dashboard Section Start=====================================-->
  <div class="tab-pane active" id="tab_business_leads" role="tabpanel">

<?php include('includes/business-leads-incoming.php');?>



  </div>

<!--=====================================================================-->

  <div class="tab-pane " id="tab_client_leads" role="tabpanel">

<?php include('includes/client-leads-incoming.php');?>



  </div>
</div>






</div>
 <div class="col-md-6 padding-top-10">
 	<h6 style="text-align:center;" class=" bg-warning">Outgoing Leads</h6>
  <?php include('includes/business-leads-outgoing.php');?>
</div>
</div>
  </div>


  <div class="tab-pane" id="tab_e" role="tabpanel">


    <div class="row padding-top-30 padding-bottom-30 bg-white">

      <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
      <?php include('includes/enquiries-table.php');?>
  	</div>


</div>


  </div>
   <div class="tab-pane" id="tab_f" role="tabpanel">

<div class="row">

<div class="col-md-8 col-md-offset-2 padding-top-70 padding-bottom-70 bg-white">
<h6 class="text-center padding-top-10 padding-bottom-30 strong col-black"> My Account Settings</h6>

<?php include('includes/business-setting.php');
		if(isset($_GET['action']))
		{
				$error = $_GET['action'];
				echo "<script type='text/javascript'>alert('$error');</script>";
		}
?>

</div>

</div>


   </div>




  </div>




</div>

</div>


		</div>

		     <!-- Modal -->
<div class="modal fade" id="product_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      	<div class="row padding-top-10 padding-bottom-10">


<form action="addproduct.php" method="POST" enctype="multipart/form-data">

<div class="col-md-12  col-sm-12 col-lg-12 col-xs-12 padding-70 ">

<div class="panel panel-default">
  <div class="panel-heading">Information</div>
  <div class="panel-body">

      <div class="form-horizontal">
              <!-- Select Basic -->


              <!-- Multiple Radios (inline) -->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4  control-label" for="radios">Select </label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                  <label class="radio-inline" for="radios-0">
                    <input type="radio" name="productType" id="radios-0" value="product" checked="checked">
                    Product
                  </label>
                  <label class="radio-inline" for="radios-1">
                    <input type="radio" name="productType" id="radios-1" value="service">
                    Service
                  </label>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Product Name</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                <input id="textinput" name="productName" type="text" placeholder="" class="form-control input-md" required="">

                </div>
              </div>

               <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Offer %</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                <input id="textinput" name="offer" type="number"  size="3" placeholder="" class="form-control input-md">

                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="product_description">Product Description</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                  <textarea class="form-control" id="product_description" name="productDescription" rows="10"></textarea>
                </div>
              </div>


      </div>

  </div>
</div>
</div>


<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="background-color:">

  <div class="panel panel-default">
    <div class="panel-heading">Images</div>
    <div class="panel-body">

  <!--div id="wrapper">
   <form action="includes/upload-file.php" method="post" enctype="multipart/form-data">
    <input class="btn btn-success btn-sm" type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
    <input class="btn btn-success btn-sm" type="submit" name="submit_image" value="Upload Image"/>
   </form>
   <div id="image_preview" style="max-height:100px;max-width:100px;"></div>
  </div-->


  <!--image add row-->
  <div class="row">

  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure  ">
                       <img  id="uploadPreviewc1" class="small-img-box" src="images/noimage.jpeg"  alt="NO IMAGE" >

                         <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
						<input type="file" id="fileNamec1"  name="fileName1"  accept="image/x-png,image/gif,image/jpeg" style ="display: none; " onchange="PreviewImagec1();"></label>
   </div>
  </div>
   <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure  ">
                      <img id="uploadPreviewc2" class="small-img-box" src="images/noimage.jpeg"  alt="NO IMAGE" >

                         <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                           <input type="file" id="fileNamec2"  name="fileName2"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImagec2();"></label>


                    </div>

  </div>


  <!--image add row-->
  <!--image add row-->


  <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure  ">
                       <img id="uploadPreviewc3"  class="small-img-box" src="images/noimage.jpeg"    alt="NO IMAGE" >

                         <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                           <input type="file" id="fileNamec3"  name="fileName3"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImagec3();"></label>


                    </div>

  </div>


 <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 thumbnail" >
  <div class="figure  ">
                      <img id="uploadPreviewc4" class="small-img-box" src="images/noimage.jpeg"   alt="NO IMAGE" >

                          <label class="btn btn-xs btn-success leadslabel"><i class="fa fa-plus" aria-hidden="true"></i>ADD
                           <input type="file" id="fileNamec4"  name="fileName4"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" onchange="PreviewImagec4();"></label>

                    </div>

  </div>

  	<label style="color:red;font-size:10px;font-weight:bold;text-align:center;">*Image should be less than 2MB.</label>
  </div>

  <!--image add row-->
  </div>
  </div>
</div>

<div class="form-group">

	<div class="col-md-4 col-md-offset-5  col-sm-4 col-sm-offset-5">
		<button id="submit" name="submit" class="btn btn-success">Add Product</button>
	</div>
</div>

    </form>



</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

		<!--================================SOCIAL CAROUSEL SECTION==========================================-->


		<!--================================RATINGS===========================================-->



		<!--================================ FOOTER AREA ==========================================-->
		<?php include('includes/footer.html');?>



<!-- Modal -->
<div class="modal fade" id="product_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewproduct">
      		<div class="loader" id="loader"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
</body>
</html>
