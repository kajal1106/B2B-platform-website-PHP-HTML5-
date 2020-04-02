

<?php

$pagetitle="Single Buisness";

include('includes/config.php');
include('includes/head.php');

echo '<style>

#adv-custom-pager a > img {
    width: 80%;
    height: 80%;
    border-radius: 50%;
}

#adv-custom-pager a {
    margin-left: 2px;
    }
</style>';



?>
<body>


	<div class="theme-wrap clearfix">
		<!--================================responsive log and menu==========================================-->


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


	<section class="aside-layout-section padding-top-100 padding-bottom-40 ">
			<div class="container"><!-- section container -->
				<div class="row bg-white"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						<?php
										$stmtfetch = $db->prepare('SELECT productName FROM porductinformation WHERE productID = :productID');
										$stmtfetch->execute(array(':productID' => $_GET['pid']));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
								?>
<h6 class="product-section-title col-black padding-top-10"><?php echo $row['productName'];?></h6>
<label class="col-red pull-right" style="font-size:0.8rem;font-weight:bold;" data-toggle="modal" data-target="#error_modal">Report Error</label><br>
<form class="form-horizontal" action="includes/error_reoprt_product.php" method="post">
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal">
<fieldset>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Problem Type</label>
  <div class="col-md-8">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="copyright_issue">Copyright issue</option>
      <option value="images_are_irrelevant">Images are irrelevant</option>
      <option value="Inaccurate_product_description">Inaccurate product description</option>
      <option value="feedback/review_on_product_ quality">Feedback / Review on product quality</option>
      <option value="other">Other</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="message">Message</label>
  <div class="col-md-8">                     
    <textarea class="form-control" id="message" name="message"></textarea>
  </div>
</div>


<div class="form-group">
 <label class="col-md-4 control-label" for="message">Name</label>
  <div class="col-md-8 ">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Email</label>
  <div class="col-md-8">
  <input id="" name="email" type="email" placeholder="Email" class="form-control input-sm" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Mobile No</label>
<div class="col-md-8">
  <input id="" name="mobile" type="number" placeholder="Mobile No" class="form-control input-sm" required="">

  </div>
</div>


</fieldset>
</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--Report Error modal-->
							<div class="row">
								<div class="col-md-4 col-lg-4 col-xs-12" ><!--image gallary-->

								<div class="single-listing-scroller  bgwhite shadow-1 " style="border:2px solid black;">
									<!-- declare a slideshow -->

<center>
									<div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=0 data-cycle-pager="#adv-custom-pager" data-cycle-pager-template="<a href='#'><img class='small' src='{{src}}'></a>">

										<?php
													$stmtfetch = $db->prepare('SELECT imagePath FROM productimage WHERE productID = :productID');
													$stmtfetch->execute(array(':productID' => $_GET['pid']));
													while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
													{
															echo '<img src="'.DIR.$row['imagePath'].'" style="border:1px solid black;" alt="item">';
													}

										?>

									</div>
									</center>
									<!-- empty element for pager links -->
									<hr>
									<div id="adv-custom-pager" class="center external" style="padding-top: 0;"></div>


								</div>
							</div>
								<?php
										$stmtfetch = $db->prepare('SELECT * FROM porductinformation WHERE productID = :productID');
										$stmtfetch->execute(array(':productID' => $_GET['pid']));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
										$productindustryID = $row['industryID'];
										 try{
                           $results = $db->prepare("select * from prductwishlist where productID = :id and businessID =:bid ");
                           $results->bindParam(':id',$_GET['pid'],PDO::PARAM_INT);
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




								?>
								<div class="col-md-8 col-lg-8 col-xs-12"><!--Product Description-->


										<p class="padding-top-50 justify col-black padding-bottom-50" ><strong class="strong ">Product Description: </strong><?php echo $row['productDescription'];?></p>
										<label class ="strong col-black wishlist-button btn btn-default push <?php echo $ac;  ?> "  id="<?php echo $_GET['pid'];?>" >
										<i  class="fa fa-heart  " id="<?php echo $_GET['pid'];?>"></i>Add To Wishlist +
										</label>
										<div class="row padding-top-200 text-center ">


<button class="btn btn-orange " onclick="location.href='business-single-listing.php?bid=<?php echo $row['businessID'];?>';" style="color:white;">Business Profile</button>
<button class="btn btn-orange  margin-left-10"  style="color:white;" data-toggle="modal" data-target="#enquiry">Send Enquiry</button>
<button class="btn btn-orange margin-left-10"  onclick="location.href='business-single-listing.php?bid=<?php echo $row['businessID'];?>';" style="color:white;">More Products</button>

</div>


								</div>


							  </div>





							</div>









						</div>
					</div>

					<!-- Modal -->
<div class="modal fade" id="enquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="enquiry.php" method="post">


<fieldset>

<!-- Form Name -->

<div class="form-group">

  <div class="col-md-10 col-md-offset-1">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">

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
<input type="hidden" name="bid" value="<?php echo $row['businessID'];?>">
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
   <center> <button type ="submit" id="" name="submit" class="btn btn-success">SEND</button></center>
  </div>
</div>

</fieldset>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


		</section>


					<!-- similar products -->
<section class="feature-section margin-top-30 margin-bottom-30 hidden-xs" >
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
					<h5 class="index-section-title">SIMILAR PRODUCTS</h5>

				</div><!-- section title end -->
			</div><!-- section container end -->
			<div class="container"><!-- section container -->
				<div class="feature-wrap">
					<ul class="feature-slider clearfix">

<?php

$stmtfetch = $db->prepare('SELECT porductinformation.productID, porductinformation.productName, productimage.imagePath, industrylist.industryName,porductinformation.businessID, businesscontactinformation.businessName,porductinformation.productOffer FROM porductinformation
	LEFT JOIN productimage ON porductinformation.productID = productimage.productID
	LEFT JOIN businessindustry ON porductinformation.businessID = businessindustry.businessID
	LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where porductinformation.businessID = businessindustry.businessID)
	LEFT JOIN businesscontactinformation ON porductinformation.businessID = businesscontactinformation.businessID  where porductinformation.industryID = :industryID
	and porductinformation.productID != :productID group by productID DESC limit 10;');
	$stmtfetch->bindParam(':industryID',$productindustryID ,PDO::PARAM_INT);
	$stmtfetch->bindParam(':productID',$_GET['pid'],PDO::PARAM_INT);
$stmtfetch->execute();
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
									
				

echo '
						<li class="item col-xs-12"><!-- .ITEM -->

							<div class="feature-item">
								<div class="figure thumbnail margin-bottom-0">
								';
								if($row[6]!="")
								{
										echo '<div class="ribbon"><span>'.$row[6].'%</span></div>';
								}

							echo '<a href="product-single-listing.php?pid='.$row[0].'"><img class="small-img-box" src="'.DIR.$row[2].'" alt="feature item"/></a>
											<div style=" position: absolute;top: 8px;left: 16px;">
														<i class="fa fa-heart push '.$ac.' fa-2x" id="'.$row[0].'" ></i>
													</div>
										<!--div class="feature-overlay">
										<div class="feature-overlay-inner rgba-bgyallow-1">
											<div class="overlay-content">
												<ul class="feature-links">
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-heart green-1"></i></a></li>
													<li><a class="bgwhite nohover" href="single-listing.html"><i class="fa fa-shopping-cart blue-1"></i></a></li>
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-share yallow-1"></i></a></li>
												</ul>
											</div>
										</div>
									</div-->
								</div>
								<div class="feature-content clearfix">
									<!--div class="feature-meta-cat">
										<a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
									</div-->
									<div class="feature-title single-line ">
										<a href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a>
									</div>
									<div class="feature-title single-line">
										<a class="col-orange">'.$row[3].'</a>
									</div>
									<div class="feature-title single-line">
										<a>'.$row[5].'</a>
									</div>


								</div>
							<div class="listing-border-bottom bgyallow-1"></div>
						</li><!-- /.ITEM -->';
}
		?>
	</ul>
	</div>
	</div>

	</section>



	
	<!--similar businesses for mobile-->
	

		<section class="feature-section margin-top-10 margin-bottom-30 visible-xs">
			<div class="section-title-wrap margin-bottom-10"><!-- section title -->
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

	<!--similar businesses for mobile-->




		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->
		<?php include('includes/footer.php');?>
		<script type="text/javascript" src="js/cart.js"></script>

</body>
</html>
