	<?php

		$pagetitle="Single Business";

		include('includes/config.php');
		include('includes/head.php');

	?>
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

  <li><a href="#tab_b" class="strong col-black" data-toggle="pill">About</a></li>
   <li class="active"><a  class="strong col-black" href="#tab_product" data-toggle="pill">Products</a></li>
    <li><a href="#tab_leads" class="strong col-black" data-toggle="pill">Leads</a></li>
     <li><a href="#tab_offers"  class="strong col-black" data-toggle="pill">Offers</a></li>
     <li><a href="#tab_contact"  class="strong col-black" data-toggle="pill">Contact Us</a></li>
    <div class="row padding-top-30 padding-bottom-30">
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
			<a class="inline" href="" target="_blank"> <i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
			<a class="inline" href="" target="_blank"> <i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>

</div>
</div>
</ul>

<div class="tab-content col-md-7 col-sm-7 col-xs-12 col-lg-7">
        <div class="tab-pane active" id="tab_product">

           <div class="container col-md-12"><!-- section container -->

					<div class="add-listing-wrapper">
						<div class="listing-main gridview tab-content">
							  <div id="latest-listing" class="tab-pane active">
									<div class="listing-wrapper row">

										<?php
										if( $user->is_logged_in() || $user->is_client_logged_in()  ){
											$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath FROM porductinformation
												LEFT JOIN productimage ON porductinformation.productID = productimage.productID
												WHERE porductinformation.businessID = :businessID group by productID ;');
											$stmtfetch->execute(array(':businessID' => $_GET['bid']));
											while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
														{
											echo '<div class="item col-md-3 col-sm-6 col-xs-12 thumbnail" ><!-- .ITEM -->
												<div class="listing-item clearfix">
													<div class="figure">
															<a class="" href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded border" salt="listing item"/></a>
														<!--div style=" position: absolute;top: 8px;right: 16px;"><i onclick="myFunction(this)" class="fa fa-heart fa-2x"></i></div-->
														 <!-- Should not remove <label> tage -->
    <div class="pretty p-icon p-toggle" style=" position: absolute;top: 8px;right: 16px;">
        <input type="checkbox" />
        <div class="state p-success-o p-on">
            <i class="icon mdi mdi-reply"></i>
            <label></label>
        </div>
        <div class="state p-info-o p-off">
            <i class="icon mdi mdi-share"></i>
            <label></label>
        </div>
    </div>

													</div>
													<div class="listing-content clearfix">

														<div class="listing-title">
														<button
															<label class="strong col-blackk" ><a class="single-line-product col-black" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a></label>
														</div>
														
														<div class="listing-location pull-left"><!-- location-->


														</div><!-- location end-->
														<!--div class="star-rating pull-right">
															<div class="score-callback" data-score="5"></div>
														</div><!-- rating end-->
													</div>
												</div>
												<div class="listing-border-bottom bgyallow-1"></div>
											</div><!-- /.ITEM -->';
										}
										}else {
											$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath FROM porductinformation
												LEFT JOIN productimage ON porductinformation.productID = productimage.productID
												WHERE porductinformation.businessID = :businessID group by productID ;');
											$stmtfetch->execute(array(':businessID' => $_GET['bid']));
											while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
														{
											echo '<div class="item col-md-3 col-sm-6 col-xs-12 thumbnail"><!-- .ITEM -->
												<div class="listing-item clearfix">
													<div class="figure">
														<a class="single-line-product col-black" href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded " salt="listing item"/></a>


													</div>
													<div class="listing-content clearfix">

														<div class="listing-title">
															<label class="strong col-black" ><a class="single-line-product col-black" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a></label>
														</div>
													
														<div class="listing-location pull-left"><!-- location-->


														</div><!-- location end-->
														<!--div class="star-rating pull-right">
															<div class="score-callback" data-score="5"></div>
														</div><!-- rating end-->
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
        <div class="tab-pane" id="tab_b">
					<?php
								$stmtfetch = $db->prepare('SELECT aboutCompany FROM businessprofile WHERE businessID = :businessID');
								$stmtfetch->execute(array(':businessID' => $bid));
								$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
								$aboutCompany = $row['aboutCompany'];
					?>
            <p class="lead-description" style="background-color:#f7edde;"><?php echo $aboutCompany; ?></p><br><br>
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

           <table>
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
                          </table>

           
        </div>



         <div class="tab-pane" id="tab_offers">


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
															echo '<div class="item col-md-3 col-sm-6 col-xs-12 thumbnail" style="margin-right:5px;"><!-- .ITEM -->

											<div class="listing-item clearfix">

												<div class="figure">
												<div class="ribbon"><span>'.$row[3].'%</span></div>
													<a class="" href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded border" salt="listing item"/></a>
													
												</div>
												<div class="listing-content clearfix">
													<!--div class="listing-meta-cat">
														<a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
													</div-->
													<div class="listing-title ">
														<label><a class="single-line-product col-black" href="product-single-listing.php?pid=".$row[0]."">'.$row[1].'</a></label>
													</div>
													
													<div class="listing-location pull-left"><!-- location-->


													</div><!-- location end-->
													<!--div class="star-rating pull-right">
														<div class="score-callback" data-score="5"></div>
													</div><!-- rating end-->
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
    </div>


        <div class="tab-pane" id="tab_leads">

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
				echo '<img style="display:inline;" class="leads-img-box thumbnail image-rounded" src="'.DIR.$r1['imagePath'].'" alt="Image Not Available" >';
			}
			echo'</div>
    </div>
  </div></br>';

$i++;
}

	?>

</div>


        </div>

</div><!-- tab content -->



<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3" style="background-color:#cff3f9;padding:1% 0 1% 0;border-radius:3%;margin:1% 0 1% 0;">
	<form class="form-horizontal" action="enquiry.php" method="post">

		<h6 class="text-center padding-top-10 padding-bottom-10 strong col-black" >Quick Enquiry Form</h6>
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
    <button type ="submit" id="" name="submit" class="btn btn-success">SEND</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div><!-- end of container -->

		</section>



		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->


		<!--================================ FOOTER AREA ==========================================-->

		<?php include('includes/footer.html');?>
</body>
</html>
