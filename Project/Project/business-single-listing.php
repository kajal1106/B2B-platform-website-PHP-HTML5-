	<?php

		$pagetitle="Single Business";

		include('includes/config.php');
		include('includes/head.php');

	?>
	<style media="screen">
	.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
	color: #fff;
	background-color: ##49ADDC;
}
	</style>
<body>

	<div class="theme-wrap clearfix">


		<!--================================HEADER==========================================-->
		<?php if( $user->is_logged_in() ){
			 include('includes/header-logout.php');

		}else if($user->is_client_logged_in()) {
			 include('includes/client_header.php');
		}else {
			include('includes/header.php');

		}
?>
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
			}

?>
		<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgorange-1 padding-top-0 padding-bottom-0"><!-- section title -->
			<h4 class="white">  </h4>
		</div><!-- section title end -->

		<!--================================listing SECTION==========================================-->


	<section class="aside-layout-section padding-top-10 padding-bottom-70">
			<div class="container"><!-- section container -->
				<?php include('includes/business_panel.php');?>
			</div>


<div class="container bg-white padding-top-10 padding-bottom-30">
<ul class="nav nav-pills nav-stacked col-md-2 " >
 <hr class="visible-xs">
  <li><a href="#tab_b" class="strong col-black" data-toggle="pill">About</a></li>
   <li class="active"><a  class="strong col-black" href="#tab_product" data-toggle="pill">Products</a></li>
    <li><a href="#tab_leads" class="strong col-black" data-toggle="pill">Leads</a></li>
     <li><a href="#tab_offers"  class="strong col-black" data-toggle="pill">Offers</a></li>
     <li><a href="#tab_contact"  class="strong col-black" data-toggle="pill">Contact Us</a></li>
     <hr class="visible-xs">
    <div class="row padding-top-30 padding-bottom-30 hidden-xs">
<a class="padding-top-20 strong col-black">SOCIAL CONNECT</a>
<div class="padding-top-20">
	<?php
				$stmt = $db->prepare('SELECT * from businesssocialinformation WHERE businessID = :businessId');
				$stmt->bindParam(':businessId', $_GET['bid'], PDO::PARAM_INT);
				$stmt->execute();
				$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
			<a class="inline" href="<?php echo $r1['facebookLink']?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
			 <a class="inline" href="<?php echo $r1['twitterLink']?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['instagramLink']?>" target="_blank"> <i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['googlwplus']?>" target="_blank"> <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['linkedin']?>" target="_blank"> <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['youtube']?>" target="_blank"> <i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>

</div>
</div>
</ul>

<div class="tab-content col-md-7 col-sm-7 col-xs-12 col-lg-7">
        <div class="tab-pane active" id="tab_product">
        	<h5 class="strong col-black" style="text-align:center;">Products</h5>
        	<hr>

           <div class="container col-md-12"><!-- section container -->

					<div class="add-listing-wrapper">
						<div class="listing-main gridview tab-content">
							  <div id="latest-listing" class="tab-pane active">
									<div class="listing-wrapper row">

										<?php
										//if( $user->is_logged_in() || $user->is_client_logged_in()  ){
											$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath FROM porductinformation
												LEFT JOIN productimage ON porductinformation.productID = productimage.productID
												WHERE porductinformation.businessID = :businessID group by productID ;');
											$stmtfetch->execute(array(':businessID' => $_GET['bid']));
											while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
														{

									 try{
                           $results = $db->prepare("select * from prductwishlist where productID = :id and businessID =:bid ");
                           $results->bindParam(':id',$row[0],PDO::PARAM_INT);
                          $results->bindParam(':bid',$_SESSION['businessID'],PDO::PARAM_INT);
                           $results->execute();
                           }
                           catch (Exception $ex) {
                              //echo $ex;
                           echo $ex;
                           //  echo "failed";

                           exit();
                           }

                             $wish= $results->fetchALL(PDO::FETCH_BOTH);

									 if(isset($wish[0][0]) && !empty($wish[0][0])){
										 $ac = "activex";

									 }
									 else {
										 $ac="";

									 }

											echo '<div class="item col-md-3 col-sm-3 col-lg-3  col-xs-6 thumbnail"><!-- .ITEM -->
												<div class="listing-item clearfix">
													<div class="figure">
										<a class="" href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded border" salt="listing item"/></a>
											<div style=" position: absolute;top: 8px;right: 16px;"><i  class="fa fa-heart fa-2x push '.$ac.'" id="'.$row[0].'"></i></div>
												<!-- Should not remove <label> tage -->

													</div>
													<div class="listing-content clearfix">

														<div class="listing-title">

															<label class="strong col-black"><a class="single-line-product col-black left-align" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a></label>
														</div>


													</div>
												</div>
												<div class="listing-border-bottom bgyallow-1"></div>
											</div><!-- /.ITEM -->';
										}
										//}
?>

									</div>
								</div>
						</div>
					</div>
				</div><!-- section container end -->

        </div>

        <div class="tab-pane" id="tab_b">
        	<h5 class="strong col-black" style="text-align:center;">About Us</h5>
        	<hr>
					<?php
								$stmtfetch = $db->prepare('SELECT aboutCompany FROM businessprofile WHERE businessID = :businessID');
								$stmtfetch->execute(array(':businessID' => $bid));
								$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
								$aboutCompany = $row['aboutCompany'];
					?>
            <p class="lead-description info" ><?php echo $aboutCompany; ?></p><br><br>
<style>
table{
	max-width: 100%;
    width: 100%;
    empty-cells: show;
    display: table;
    border-collapse: separate;
    border-spacing: 2px;

}
tr{
	background-color: #f7edde;
}
</style>

           <!--table>
                               <tbody>
                               			<tr>
                                            <td class="strong col-black">Industry</td>
                                            <td><b>Computers and IT</b></td>
                                        </tr>
                                        <tr>
                                            <td class="strong col-black">Sub Industry</td>
                                            <td><b>Computers and IT</b></td>
                                        </tr>
                                        <tr>
                                            <td  class="strong col-black">Company Type</td>
                                            <td><b>Manufacturer</b><b>Manufacturer</b><b>Manufacturer</b><b>Manufacturer</b><b>Manufacturer</b></td>
                                        </tr>

                                        <tr>
                                            <td  class="strong col-black">Establishment Year</td>
                                            <td><b>2000</b></td>
                                        </tr>


                                        <tr>
                                            <td  class="strong col-black">Firm Type</td>
                                            <td><b>Proprietorship</b></td>
                                        </tr>


                                        <tr>
                                            <td  class="strong col-black">Expand Level</td>
                                            <td><b>International</b></td>
                                        </tr>

                                    </tbody>
                          </table-->

<hr>
        </div>



         <div class="tab-pane" id="tab_offers">

<h5 class="strong col-black" style="text-align:center;">Offers</h5>
        	<hr>
  <div class="container col-md-12"><!-- section container -->

          <div class="add-listing-wrapper">
            <div class="listing-main gridview tab-content">
                <div id="latest-listing" class="tab-pane active">
                  <div class="listing-wrapper row">

										<?php
										$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath,porductinformation.productOffer FROM porductinformation
											LEFT JOIN productimage ON porductinformation.productID = productimage.productID
											WHERE porductinformation.businessID = :businessID group by productID ;');
										$stmtfetch->execute(array(':businessID' => $_GET['bid']));
										while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
													{
														if($row[3]!="")
														{
															echo '<div class="item col-md-3 col-sm-6 col-xs-6 thumbnail" ><!-- .ITEM -->

											<div class="listing-item clearfix">

												<div class="figure">
												<div class="ribbon"><span>'.$row[3].'%</span></div>
													<a class="" href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded border" salt="listing item"/></a>
													<div style=" position: absolute;top: 8px;left: 16px;"><i onclick="myFunction(this)" class="fa fa-heart fa-2x"></i></div>

												</div>
												<div class="listing-content clearfix">

													<div class="listing-title ">
														<label><a class="single-line-product col-black" href="product-single-listing.php?pid=".$row[0]."">'.$row[1].'</a></label>
													</div>


												</div>
											</div>
											<div class="listing-border-bottom bgyallow-1"></div>
										</div><!-- /.ITEM -->';
									}
								}

											?>



                  </div>
                </div>
            </div>
          </div>
        </div><!-- section container end -->





        </div>
 <!--======================================OFFERS TAB END=======================================-->



        <div class="tab-pane" id="tab_contact">
<h5 class="strong col-black" style="text-align:center;">Contact Us</h5>
        	<hr>

        	<div class="row">
        		<div class="col-md-12 ">
           					<div class="listing-contact-detail-wrap">
												<?php
												if( $user->is_logged_in() || $user->is_client_logged_in())
												{
												$stmtfetch = $db->prepare('SELECT * FROM businessaddress WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $bid));
												$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessStreetAddress = $row['businessStreetAddress'];

												$stmtfetch = $db->prepare('SELECT * FROM businesscontactinformation WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $bid));
												$row2 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessWebsite = $row2['businessWebsite'];
												$businessMobileNo = $row2['businessMobileNo'];

												$stmtfetch = $db->prepare('SELECT businessEmail FROM business WHERE businessID = :businessID');
												$stmtfetch->execute(array(':businessID' => $bid));
												$row1 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												$businessEmail = $row1['businessEmail'];

												?>
									<div class="listing-contact-section-table">
<style type="text/css">
	.left{
		text-align:left!important;

	}

</style>



										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info" style="width:17%!important; ">Address:</li>
												<li class="details" style="text-align: left!important;"><?php echo $businessStreetAddress;?></li>
											</ul>
										</div>
										<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Country:</li>
													<?php
													$stmtfetch = $db->prepare('SELECT countryName FROM country WHERE countryID = :countryID');
													$stmtfetch->execute(array(':countryID' => $row['countryID']));
													$row3 = $stmtfetch->fetch(PDO::FETCH_ASSOC);

													?>
												<li class="details"><?php echo $row3['countryName'];?></li>
											</ul>
										</div>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">State:</li>
												<?php
												$stmtfetch = $db->prepare('SELECT stateName FROM state WHERE stateID = :stateID');
												$stmtfetch->execute(array(':stateID' => $row['stateID']));
												$row4 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												?>
												<li class="details"><?php echo $row4['stateName'];?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">City:</li>
												<?php
												$stmtfetch = $db->prepare('SELECT cityName FROM city WHERE cityID = :cityID');
												$stmtfetch->execute(array(':cityID' => $row['cityID']));
												$row4 = $stmtfetch->fetch(PDO::FETCH_ASSOC);
												?>
												<li class="details"><?php echo $row4['cityName'];?></li>
											</ul>
										</div>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Zipcode:</li>
												<li class="details"><?php echo $row['zipCode'];?></li>
											</ul>
										</div>
									</div>
								</div>


										<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Contact 1:</li>
												<li class="details"><?php echo $businessMobileNo;?></li>
											</ul>
										</div>

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Contact 2:</li>
												<li class="details"><?php echo $row2['businessContact2'];?></li>
											</ul>
										</div>

									</div>
										<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Landline No:</li>
												<li class="details"><?php echo $row2['businessLandline'];?></li>
											</ul>
										</div>

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Fax No:</li>
												<li class="details"><?php echo $row2['businessFaxNo'];?></li>
											</ul>
										</div>
											</div>
										</div>
<div class="row">
											<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">E-mail:</li>
												<li class="details"><?php echo $businessEmail;?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="info">Website:</li>
												<li class="details"><?php echo $businessWebsite;?></li>
											</ul>
										</div>


										<?php
										$stmtfetch = $db->prepare('SELECT * FROM businesssalesperson WHERE businessID = :businessID');
										$stmtfetch->execute(array(':businessID' => $bid));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
										?>

									</div>
								</div>
							</div>

										<div class="row">
											<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
									<div class="listing-contact-section-table">
										<h6 class="small-label-black">Sales</h6>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Name:</li>
												<li class="details"><?php echo $row['busienssPersonName'];?></li>
											</ul>
										</div>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Email:</li>
												<li class="details"><?php echo $row['busienssPersonEmail'];?></li>
											</ul>
										</div>

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Contact No:</li>
												<li class="details"><?php echo $row['busienssPersonContact'];?></li>
											</ul>
										</div>



											</div>
											<?php
											$stmtfetch = $db->prepare('SELECT * FROM businesssupportperson WHERE businessID = :businessID');
											$stmtfetch->execute(array(':businessID' => $bid));
											$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
											?>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

										<div class="listing-contact-section-table">
										<h6 class="small-label-black">Support</h6>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Name:</li>
												<li class="details"><?php echo $row['busienssPersonName'];?></li>
											</ul>
										</div>
										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Email:</li>
												<li class="details"><?php echo $row['busienssPersonEmail'];?></li>
											</ul>
										</div>

										<div class="listing-contact-table-field">
											<ul class="left">
												<li class="subinfo">Contact No:</li>
												<li class="details"><?php echo $row['busienssPersonContact'];;?></li>
											</ul>
										</div>



											</div>

											</div>

									</div>



									<?php
								}else {

								?>
								<div class="listing-contact-section-table">
									<div class="listing-contact-table-field">
										<ul>
											<li >Please Login to View More Details</li>

										</ul>
									</div>
								</div>
								<?php
									}

								?>
								</div>
								<!--div id="map_canvas" style="height:300px!important;"></div-->



</div>

        </div>
         	<hr>
    </div>


        <div class="tab-pane" id="tab_leads">
        	<h5 class="strong col-black" style="text-align:center;">Leads</h5>
        	<hr>

 <div id="exampleAccordion"  data-children=".item">
	 <?php
		 $i=1;
			 $stmtfetch = $db->prepare('SELECT * FROM businesslead WHERE businessID = :businessID');
			 $stmtfetch->execute(array(':businessID' => $bid));
			 while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
			 {
  echo '<div class="item padding-5 clearfix">
    <a data-toggle="collapse" class="label-size  pull-left" data-parent="#exampleAccordion" href="#exampleAccordion'.$i.'" aria-expanded="true" aria-controls="exampleAccordion'.$i.'">
      '.$row['businessName'].'
    </a>
		<h6><span class="label label-info pull-right">'.$row['offerType'].'</span></h6>
    <div id="exampleAccordion'.$i.'" class="collapse pull-left" role="tabpanel">
   <p class="padding-top-10 padding-bottom-10 left-align col-black" ><strong class="strong col-black">Date of Posting : </strong>22/08/2017</p>
      <p class="padding-top-10 left-align col-black" ><strong class="strong col-black">Lead Description : </strong>
				'.$row['leadDescription'].'
      </p>
			<div class="row padding-top-20 padding-bottom-20">';
			$stmt = $db->prepare('SELECT * from businessleadimage WHERE businessLeadId = :businessLeadId');
			$stmt->bindParam(':businessLeadId', $row['businessLeadId'], PDO::PARAM_INT);
			$stmt->execute();
			while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo '<a data-fancybox="gallery" style="display:inline;"  href="'.DIR.$r1['imagePath'].'"><img class="leads-img-box thumbnail image-rounded col-xs-6" src="'.DIR.$r1['imagePath'].'" alt="Image Not Available" ></a>';
			}
			echo'</div>
    </div>
  </div></br>';

$i++;
}

	?>

</div>
</hr>

        </div>

</div><!-- tab content -->



<div class="col-md-3 col-sm-3 col-xs-12  col-lg-3 bg-steelblue" style="padding:1% 0 1% 0;border-radius:3%;margin:1% 0 1% 0;">

	<form class="form-horizontal " action="enquiry.php" method="post">

		<h6 class="text-center padding-top-10 padding-bottom-10 strong col-black" style="color: white;">Quick Enquiry Form</h6>
<fieldset>

<!-- Form Name -->

<div class="form-group">

  <div class="col-md-10 col-md-offset-1">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">
	<input type="text" name="bid" value="<?php echo $_GET['bid']?>" style="display: none;">
  </div>
</div>

<!-- Text input-->
<div class="form-group">

  <div class="col-md-10 col-md-offset-1">
  <input id="" name="eemail" type="email" placeholder="Email" class="form-control input-sm" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">

<div class="col-md-10 col-md-offset-1">
  <input id="" name="mobile" type="number" placeholder="Mobile No" class="form-control input-sm" required="">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">

<div class="col-md-10 col-md-offset-1">
    <textarea class="form-control" id="" placeholder="Message" name="message"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">

  <div class="col-md-4 col-md-offset-4">
    <button type ="submit" id="" name="submit" class="btn btn-success" style="background-color:orange;border-color: orange;">SEND</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div><!-- end of container -->

<div class="row padding-top-30 padding-bottom-30 visible-xs" style="border:1px solid black;">
<a class="strong col-black">SOCIAL CONNECT</a><br>
<div class=" text-center">
	<?php
				$stmt = $db->prepare('SELECT * from businesssocialinformation WHERE businessID = :businessId');
				$stmt->bindParam(':businessId', $_GET['bid'], PDO::PARAM_INT);
				$stmt->execute();
				$r1 = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
			<a class="inline" href="<?php echo $r1['facebookLink']?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['twitterLink']?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="<?php echo $r1['instagramLink']?>" target="_blank"> <i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="" target="_blank"> <i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="" target="_blank"> <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="" target="_blank"> <i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>

</div>
</div>


		</section>


		<!-- similar business -->

	<!--================================FEATURE LISTING SECTION==========================================-->
	<section class="feature-section margin-top-30 margin-bottom-30 hidden-xs">
		<div class="container"><!-- section container -->
			<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">SIMILAR BUSINESSES</h6>



			</div><!-- section title end -->
		</div><!-- section container end -->
		<div class="container "><!-- section container -->
			<div class="feature-wrap">
				<ul class="feature-slider clearfix owl-carousel owl-theme owl-loaded owl-responsive-0">
				<?php
		$stmtfetch = $db->prepare("SELECT industryID FROM businessindustry WHERE businessID = :businessID");
													$stmtfetch->execute(array(':businessID' => $bid));
														$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
														$industryID = $row['industryID'];

												?>

					<?php
								$stmtfetch = $db->prepare('SELECT business.businessID, businessprofile.companyName, industrylist.industryName, businessprofile.status, country.countryName, country.countryFlag, businesslogo.busienssLogoPath, businessprofile.isverified FROM business
									LEFT JOIN businesscontactinformation ON business.businessID = businesscontactinformation.businessID
									LEFT JOIN businessprofile ON business.businessID = businessprofile.businessID
									LEFT JOIN businesslogo ON business.businessID = businesslogo.businessID
									LEFT JOIN businessaddress ON business.businessID = businessaddress.businessID
									LEFT JOIN country ON country.countryID = (select countryID from businessaddress where business.businessID = businessaddress.businessID)
									LEFT JOIN businessindustry ON business.businessID = businessindustry.businessID
									LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where business.businessID = businessindustry.businessID)
									 WHERE isActive = :isActive
									 and businessprofile.status =:status
									 and businessindustry.industryID = :industryID and business.businessID != :businessID LIMIT 10');
								$a ='Yes';
								$b = 'FEATURED';
								$stmtfetch->execute(array(':isActive' => $a, ':status' => $b, 'industryID' => $industryID, ':businessID' => $bid ));
								while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
								{
										echo '<li class="item "><!-- .ITEM -->
											<div class="feature-item ">
												<div class="figure thumbnail margin-bottom-0">
													<a  href="business-single-listing.php?bid='.$row[0].'"><img class="small-img-box" src="'.DIR.$row[6].'" alt="Image Not Available"/></a>

												</div>
												<div class="feature-content clearfix">

													<div class="feature-title single-line">
														<a  href="business-single-listing.php?bid='.$row[0].'">'.$row[1].'</a>
													</div>
													<div class="feature-title single-line" >
													<a class="col-orange">'.$row[2].'</a>
													</div>
													<div class="feature-location"><!-- location-->
													<img src="'.DIR.$row[5].'" style="display:inline;">&ensp;'.$row[4].'
													</div><!-- location end-->';
													if($row[7]=='Verify')
														{
															echo '<span class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i> VERIFIED</span>';

														}
														else
														{
															echo '<span class="label"> </span>';
														}

												echo '<span class="label" style="background-color:#0b3c5d;margin-left:1rem;"><i class="fa fa-check" aria-hidden="true"></i> FEATURED</span></div>
											</div>
											<div class="listing-border-bottom bgyallow-1"></div>

										</li><!-- /.ITEM -->';
									}
				?>
				</ul>
			</div>
		</div>
	</section>




	<!--Similar businesses -->


	<!--similar businesses-->


		<section class="feature-section margin-top-10 margin-bottom-30 visible-xs">
			<div class="section-title-wrap margin-bottom-10">
				<h6 class="index-section-title">SIMILAR BUSINESSES</h6>



			</div><!-- section title end -->
			<div class="container "><!-- section container -->
				<div class="add-listing-wrapper">
						<div class="listing-main gridview tab-content">
							  <div id="latest-listing" class="tab-pane active">
									<div class="listing-wrapper row">
									<div class="item col-md-3 col-sm-3 col-lg-3  col-xs-6 thumbnail"><!-- .ITEM -->
											<div class="listing-item clearfix">
											<div class="figure">
												<a class="" href=""><img src="images/noimage.jpeg" class="small-img-box image-rounded border" salt="listing item"/></a>
												<!-- Should not remove <label> tage -->

													</div>
															<div class="feature-content clearfix">

													<div class="feature-title single-line">
														<a  href="business-single-listing.php?bid='.$row[0].'">Steinn Labs</a>
													</div>
													<div class="feature-title single-line" >
													<a class="col-orange">Maza dhanda</a>
													</div>
													<div class="feature-location"><!-- location-->
													<img src="'.DIR.$row[5].'" style="display:inline;">&ensp;Mazha Desh
													</div><!-- location end-->
													<span class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i> VERIFIED</span>

														<span class="label"> </span>


												<span class="label" style="background-color:#0b3c5d;margin-left:1rem;"><i class="fa fa-check" aria-hidden="true"></i> FEATURED</span></div>
											</div>
												</div><!-- /.ITEM -->

														<div class="item col-md-3 col-sm-3 col-lg-3  col-xs-6 thumbnail"><!-- .ITEM -->
											<div class="listing-item clearfix">
											<div class="figure">
												<a class="" href=""><img src="images/noimage.jpeg" class="small-img-box image-rounded border" salt="listing item"/></a>
												<!-- Should not remove <label> tage -->

													</div>
															<div class="feature-content clearfix">

													<div class="feature-title single-line">
														<a  href="business-single-listing.php?bid='.$row[0].'">Steinn Labs</a>
													</div>
													<div class="feature-title single-line" >
													<a class="col-orange">Maza dhanda</a>
													</div>
													<div class="feature-location"><!-- location-->
													<img src="'.DIR.$row[5].'" style="display:inline;">&ensp;Mazha Desh
													</div><!-- location end-->
													<span class="label" style="background-color:#0b3c5d;"><i class="fa fa-check" aria-hidden="true"></i> VERIFIED</span>

														<span class="label"> </span>


												<span class="label" style="background-color:#0b3c5d;margin-left:1rem;"><i class="fa fa-check" aria-hidden="true"></i> FEATURED</span></div>
											</div>
												</div><!-- /.ITEM -->

											</div>





									</div>
								</div>
						</div>
					</div>
					</div>

		</section>




		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->


		<!--================================ FOOTER AREA ==========================================-->

		<?php include('includes/footer.php');?>
		  <script type="text/javascript" src="js/cart.js"></script>
</body>
</html>
