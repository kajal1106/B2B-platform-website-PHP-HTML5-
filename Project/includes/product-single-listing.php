


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
		<div class="wsmenucontent overlapblackbg"></div>
		<div class="wsmenuexpandermain slideRight">
			<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
			<a href="#" class="smallogo"><img src="images/logo.png" width="120" alt="" /></a>
		</div>
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
							<div class="row">
								<div class="col-md-4 col-lg-4 col-xs-12" ><!--image gallary-->

								<div class="single-listing-scroller  bgwhite shadow-1 padding-top-10" style="border:2px solid black;">
									<!-- declare a slideshow -->


									<div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=0 data-cycle-pager="#adv-custom-pager" data-cycle-pager-template="<a href='#'><img class='small' src='{{src}}'></a>">

										<?php
													$stmtfetch = $db->prepare('SELECT imagePath FROM productimage WHERE productID = :productID');
													$stmtfetch->execute(array(':productID' => $_GET['pid']));
													while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
													{
															echo '<img src="'.DIR.$row['imagePath'].'" style="margin:0% auto!important;border:1px solid black;" alt="item">';
													}

										?>

									</div>
									<!-- empty element for pager links -->
									<hr>
									<div id="adv-custom-pager" class="center external"></div>


								</div>
							</div>
								<?php
										$stmtfetch = $db->prepare('SELECT * FROM porductinformation WHERE productID = :productID');
										$stmtfetch->execute(array(':productID' => $_GET['pid']));
										$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
								?>
								<div class="col-md-8 col-lg-8 col-xs-12"><!--Product Description-->


										<p class="padding-top-50 justify col-black padding-bottom-50" ><strong class="strong ">Product Description: </strong><?php echo $row['productDescription'];?></p>
										<label class ="strong col-black wishlist-button btn btn-default" id="<?php echo $_GET['pid'];"  onclick="myFunction(this)">
										<i  class="fa fa-heart " id="<?php echo $_GET['pid']; ?>"  ></i>Add To Wishlist +
										</label>
										<div class="row padding-top-200 text-center ">


<button class="btn btn-orange " ><a href="business-single-listing.php?bid=<?php echo $row['businessID'];?>" style="color:white;">Business Profile</a></button>
<button class="btn btn-orange  margin-left-10"><a href="#" style="color:white;" data-toggle="modal" data-target="#enquiry">Send Enquiry</a></button>
<button class="btn btn-orange margin-left-10" ><a href="business-single-listing.php?bid=<?php echo $row['businessID'];?>" style="color:white;">More Products</a></button>

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



		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->
		<?php include('includes/footer.html');?>

</body>
</html>
