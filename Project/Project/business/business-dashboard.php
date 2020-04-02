<?php

$pagetitle="Business Dashboard";
include('includes/config.php');
if( !$user->is_logged_in() ){ header('Location: index.php'); }
include('includes/head.php');?>


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
				$location = "Mylogo/";
				if(move_uploaded_file($tempName, $location.$fileName))
				{
					$a = $location.$fileName;
					$stmt = $db->prepare("UPDATE businesslogo set busienssLogoPath = :busienssLogoPath where businessID = :businessID");
		    	$stmt->bindParam(':businessID',$_SESSION["businessID"] , PDO::PARAM_INT);
		    	$stmt->bindParam(':busienssLogoPath', $a, PDO::PARAM_STR);
		    	$stmt->execute();
				}
			}
		}
		header("Refresh:0");
	}
	if(isset($_POST['resetpic'])){
		$a ="Mylogo/default.jpg";
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
		<div class="container">

<div class="row padding-top-100 padding-bottom-100">
<div class="col-md-12  " style="background-color:#f9f7f7;">

<h5>MY DASHBOARD</h5>
  <ul class="nav nav-pills nav-justified">
  	<li ><a href="#tab_a" data-toggle="pill">Dashboard</a></li>
    <li class="active"><a href="#tab_b" data-toggle="pill">My Profile</a></li>
    <li><a href="#tab_c" data-toggle="pill">My Products</a></li>
    <li><a href="#tab_d" data-toggle="pill"> My Leads</a></li>
    <li><a href="#tab_e" data-toggle="pill"> My Enquiries</a></li>
     <li><a href="#tab_f" data-toggle="pill"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></a></li>
  </ul>


  <div class="tab-content" style="min-height:500px;">



   <!--================================Dashboard Section Start=====================================-->
  <div class="tab-pane " id="tab_a" role="tabpanel">





  </div>

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
              <div class="entry-wrap shadow-1"><!-- blog entry -->
                <div class="pull-right" style="margin-top:1%;margin-right:1%;">
    <button class="btn-warning btn-xs small edit">Edit</button>
    <button id="save" name="save" class="btn-success btn-xs small save" disabled>Save</button>
    </div>
                <br>
                <div class="entry-content row">
                <div class="entry-figure col-md-3 col-lg-3 col-xs-12">
									<?php
											$stmtfetch = $db->prepare('SELECT * FROM businesslogo WHERE businessID = :businessID');
											$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$businessLogoPath = $row['busienssLogoPath'];
									?>
									<form id="form" action="business-dashboard.php" method="post" enctype="multipart/form-data">
											<img src="<?php echo 'http://192.168.50.107/thebizroot_f/'.$businessLogoPath;?>" alt="blog entry" style="max-width:200px;max-height:200px;">
											<input type="file" id="fileName"  name="fileName"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ><br><br>
								      <input type="button" id="moveFile" name="moveFile" value="Change">
											<button type="submit" name="resetpic" id="resetpic" >Remove</button>
											<input type="submit" id="moveFile1" name="moveFile1" style ="display: none;">
									</form>
                </div>
                <div class="col-md-9 col-lg-9" style="padding-left:20px;" >
                  <div class="row">
                  <div class="col-md-4 col-xs-12">
                    <label class="small">Country:
											<?php
													$stmtfetch = $db->prepare('SELECT * FROM country WHERE countryID = (select countryID from businessAddress where businessID = :businessID)');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$countryName = $row['countryName'];
											?>
                  <select id="countryID" disabled>
										<option value="<?php echo $row['countryID'];?>"> <?php echo $countryName; ?></option>

										<?php
								                              $q = $db->prepare("SELECT * FROM country");
								                              $q->execute();
								                              while($r = $q->fetch(PDO::FETCH_ASSOC))
								                              {?>
								                                <option value="<?php echo $r['countryID'];?>"><?php echo $r['countryName'];?></option>


								                          <?php } ?>
                  </select></label><br><br>
									<?php
											$stmtfetch = $db->prepare('SELECT * FROM businessProfile WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$isSampleProvide = $row['isSampleProvide'];
											$levelToExpand = $row['levelToExpand'];
											$businessOffer = $row['businessOffer'];

									?>

                  <label class="small">Expanding Level :</span>
										<select id="levelToExpand" name="levelToExpand" disabled>
													<option value="<?php echo $levelToExpand;?>"> <?php echo $levelToExpand;?></option>
													<option value="local">Local</option>
													<option value="district">District</option>
													<option value="state">State</option>
													<option value="national">National</option>
													<option value="international">International</option>
                  </select>
                  </div>
                  <div class="col-md-4 pull-left col-xs-12 ">
                  <label >Provides Sample :</span>
										<select name="isSampleProvide" id="isSampleProvide" disabled>
											<option value="<?php echo $isSampleProvide;?>"> <?php echo $isSampleProvide;?></option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select></label><br><br>

                    <!--span class="label label-success">TRUSTED: </span> <span class="label label-success"> <label class="score-callback" data-score="5">    </span-->
                  </div>


                  <div class="col-md-4 pull-left col-xs-12">


                <span>  <label>OFFER:</span> <select id="offer" disabled>
												<option value="<?php echo $businessOffer;?>"> <?php echo $businessOffer;?></option>
												<option value="NO OFFER">NO OFFER</option>
												<option value="1%-10%">1%-10%</option>
												<option value="11%-20%">11%-20%</option>
												<option value="21%-30%">21%-30%</option>
												<option value="31%-40%">31%-40%</option>
												<option value="41%-50%">31%-40%</option>
												<option value="51%-60%">51%-60%</option>
												<option value="61%-70%">61%-70%</option>
												<option value="71%-80%">71%-80%</option>
												<option value="81%-90%">81%-90%</option>
												<option value="81%-90%">81%-90%</option>
											</select>
                  </label>

                  </div>
                  </div>

                    <div class="row text-center padding-top-10">
											<?php
													$stmtfetch = $db->prepare('SELECT businessName FROM businessContactInformation WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$businessName = $row['businessName'];

											?>
                    <label>Business Name: <input type="text" id="businessName"  name ="businessName" value="<?php echo $businessName;?>" disabled>
											</label>
										</div>

                </div>


                <div class="entry-metas col-md-9 col-md-offset-3 col-xs-12">

                    <ul>
                      <li>INDUSTRY TYPE:</li>
											<?php
													$stmtfetch = $db->prepare("select * from industrylist where industryID = (SELECT industryID FROM businessIndustry WHERE businessID = :businessID)");
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
													$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
													$industryID = $row['industryID'];
													$industryName = $row['industryName'];

											?>
                      <li><select  id="industryID" name ="industryID" onChange="getSubIndustry(this.value);" disabled>
												<option value ="<?php echo $industryID ;?>"><?php echo $industryName ;?></option>
                      <?php
														$q = $db->prepare("SELECT * FROM industrylist");
														$q->execute();
														while($r = $q->fetch(PDO::FETCH_ASSOC))
														{?>
															<option value="<?php echo $r['industryID'];?>"><?php echo $r['industryName'];?></option>


												<?php } ?>

                  </select></li>



                    </ul>

                </div>

								<div class="entry-metas col-md-8 col-md-offset-4 col-xs-12">
									<?php
											$stmtfetch = $db->prepare("select * from industrysublist where IndustrySublistID = (SELECT IndustrySublistID FROM industrysubtype WHERE businessID = :businessID)");
										$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											$subindustryID = $row['IndustrySublistID'];
											$subindustryName = $row['subindustryName'];

									?>
                    <ul>
                      <li>INDUSTRY TYPE:</li>
                      <li><select id="subIndustry" name="IndustrySublistID" disabled>
												<option value ="<?php echo $subindustryID;?>"><?php echo $subindustryName;?></option>
                  </select></li>



                    </ul>

                </div>


                </div>


              </div><!-- blog entry end -->

            </div>
          </div>
        </div>
      </div>


<div class="container bg-white">
<ul class="nav nav-pills nav-stacked col-md-2">

  <li><a href="#tab_about" data-toggle="pill">About</a></li>
   <li class="active"><a href="#tab_product" data-toggle="pill">Products</a></li>


   <li><a href="#tab_contact" data-toggle="pill">Contact Us</a></li>
    <li><a href="#tab_offers" data-toggle="pill">Offers</a></li>
    <div class="row padding-top-30 padding-bottom-30">
<label class="padding-top-20">SOCIAL CONNECT</label>

<div class="padding-top-20">
      <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
      <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
      <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
</div>
<div >
    <button class="btn-warning btn-xs small" data-toggle="modal" data-target="#exampleModal">Edit</button>
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
					$stmtfetch = $db->prepare("select * from businessSocialInformation where businessID = :businessID");
					$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
					$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
					$facebookLink = $row['facebookLink'];
					$instagramLink = $row['instagramLink'];
					$twitterLink = $row['twitterLink'];
				?>
<div class="row">
<div class="col-md-8 col-md-offset-2">


<input type="text" id="facebook" class="form-control" value="<?php echo $facebookLink;?>" disabled/><br>
<input type="text" id="instagram"class="form-control" value ="<?php echo $instagramLink;?>" disabled /><br>
<input type="text" id="twitter" class="form-control" value ="<?php echo $twitterLink;?>" disabled/><br>

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
                    <div class="item col-md-3 col-sm-6 col-xs-12"><!-- .ITEM -->
                      <div class="listing-item clearfix">
                        <div class="figure">
                          <img src="images/listings/270x220/01.jpg" alt="listing item"/>
                          <div class="listing-overlay">
                            <div class="listing-overlay-inner rgba-bgyallow-1">
                              <div class="overlay-content">
                                <ul class="listing-links">
                                  <!--li><a class="bgwhite nohover" href="#"><i class="fa fa-heart green-1 "></i></a></li-->

                                  <li><a class="bgwhite nohover" href="#"><i class="fa fa-plus-circle yallow-1"></i></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="listing-content clearfix">
                          <!--div class="listing-meta-cat">
                            <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                          </div-->
                          <div class="listing-title">
                            <label><a href="single-listing.html">Product Name</a></label>
                          </div>
                          <div class="listing-disc">
                            <p>Morbi accumsan ipsum velit. Nam nec tellus a odio sit tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent permis conubia.Morbi accumsan ipsum velit. Nam nec tellus a odio sit tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent permis conubia.</p>
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


                  </div>
                </div>
            </div>
          </div>
        </div><!-- section container end -->
        </div>





        <!--======================================PRODUCTS TAB END=======================================-->


        <!--======================================ABOUT TAB START=======================================-->
        <div class="tab-pane" id="tab_about">
          <div class="pull-right">
              <button class="btn-warning btn-xs small editabout">Edit</button>
              <button class="btn-success btn-xs small saveabout">Save</button>
         </div>
            <div class="col-md-8 col-md-offset-2 padding-top-30">
							<?php
										$stmtfetch = $db->prepare('SELECT aboutCompany FROM businessProfile WHERE businessID = :businessID');
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
					<form class="form-horizontal padding-top-30 padding-bottom-30">
      <div class="pull-right" style="margin-top:1%;margin-right:1%;">
            <button class="btn-warning btn-xs small editcontact">Edit</button>
            <button class="btn-success btn-xs small savecontact">Save</button>
         </div>

          <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <fieldset>
									<?php
												$stmtfetch = $db->prepare('SELECT businessStreetAddress FROM businessAddress WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessStreetAddress = $row['businessStreetAddress'];



												$stmtfetch = $db->prepare('SELECT * FROM businessContactInformation WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessWebsite = $row['businessWebsite'];
												$businessMobileNo = $row['businessMobileNo'];

												$stmtfetch = $db->prepare('SELECT businessEmail FROM business WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessEmail = $row['businessEmail'];

									?>

<!-- Textarea -->
 <div class="form-group">
      <label class="col-md-4 control-label" for="">Address</label>
          <div class="col-md-6">
              <textarea class="form-control input-sm" id="address" name="" disabled><?php echo $businessStreetAddress;?></textarea>
          </div>
  </div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mobile No</label>
  <div class="col-md-6">
  <input id="mobile" name="textinput" type="number" value="<?php echo $businessMobileNo;?>" class="form-control input-sm"  disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Email</label>
  <div class="col-md-6">
  <input id="bemail" name="" type="email"  value="<?php echo $businessEmail;?>" class="form-control input-sm" disabled>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Website</label>
  <div class="col-md-6">
  <input id="website" name="" type="text" value="<?php echo $businessWebsite;?>" class="form-control input-sm"  disabled>

  </div>
</div>

</fieldset>
</form>


<!--======================USER MAP CANVAS=================-->

      <div id="map_canvas" style="height:300px!important;"></div>


<!--======================USER MAP CANVAS=================-->
      </div>
        </div>
    </div>
<!--======================================CONTACT TAB END=======================================-->


<!--======================================OFFERS TAB START=======================================-->

        <div class="tab-pane" id="tab_offers">
          <div class="pull-right" style="margin-top:1%;margin-right:1%;">
    <button class="btn-warning btn-xs small">Edit</button>
    <button class="btn-success btn-xs small">Save</button>
    </div>


        </div>




 <!--======================================OFFERS TAB END=======================================-->

</div><!-- tab content -->




</fieldset>
</form>








</div><!-- end of container -->

    </section>


  </div>






<!--================================My Profile Section Ends=====================================-->



  <div class="tab-pane bg-white" id="tab_c" role="tabpanel">

<?php include('includes/product-add.php');?>




  </div>
  <div class="tab-pane" id="tab_d" role="tabpanel"><!--h6 class="text-center padding-top-30">Leads</h6-->

  <div class="col-md-8 col-md-offset-2 padding-top-70 padding-bottom-70">
  <?php include('includes/my-leads.php');?>
</div>

  </div>

  <div class="tab-pane" id="tab_e" role="tabpanel"><h6 class="text-center padding-top-30">Enquiries</h6>


    <div class="row padding-top-70 padding-bottom-70 bg-white">

      <div class="col-md-8 col-md-offset-2 ">
      <?php include('includes/enquiries-table.php');?>
      </div>
    </div>



  </div>
   <div class="tab-pane" id="tab_f" role="tabpanel">

<div class="row">

<div class="col-md-8 col-md-offset-2 padding-top-70 padding-bottom-70 bg-white">
<h6 class="text-center padding-top-30 padding-bottom-30"> My Account Settings</h6>

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

		<!--================================SOCIAL CAROUSEL SECTION==========================================-->


		<!--================================RATINGS===========================================-->



		<!--================================ FOOTER AREA ==========================================-->
		<?php include('includes/footer.html');?>


</body>
</html>
