


<?php

$pagetitle="Single Buisness";

include('includes/config.php');
include('includes/head.php');





?>
<body style="background-color:white;">


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
<style type="text/css">
.box{
	border:2px solid orange;
	max-height: 220px!important;
	height: 220px;
	margin:5px;
	padding:2px;
	white-space: wrap!important;
	color: orange;

}


.box h5{
	margin-bottom: 10px;
	font-size:1rem;
	text-transform: capitalize;
}



</style>

	<section class="aside-layout-section padding-top-100 padding-bottom-40 ">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">About Us</h6>
			</div><!-- section title end -->
				<div class="row bg-white"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12 main-wrap">
							<img src="images/devices.jpg">
						</div>

						<div class="col-md-6 col-sm-6 col-xs-12 main-wrap">
							 <h3>WHO WE ARE</h3>
            <p class="col-black" style="text-align:justify;">
             TheBizRoot is an online Global B2B marketplace connecting Buyers and Suppliers at a common platform. TheBizRoot is one of the most reliable B2B promoters, which is rapidly growing in international trade. It contains tools that are easy to access, extremely efficient and can give our registered clients  reach quickly to their target audience. Register for free and empower your business by being a part of this leading and ever-growing community.
              
            </p>
						</div>

					</div>

					<div class="row padding-top-30 padding-bottom-3">
 							<h3 class="text-center">OUR AIM </h3>
							<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-paper-plane fa-3x"></i></center><br>
								<h5> To Build A Trusted And Verified B2B Community that Uses The Power Of The Internet To Simplify And Expand Business. To Lead Buyers, Suppliers, Manufacturers, Service-Providers On A Familiar Platform.</h5>
							</div>
						</div>
						
						

					</div>
						

					<div class="row padding-top-30 padding-bottom-3">
 							<h3 class="text-center">OUR STRENGTH </h3>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-rocket fa-3x"></i></center><br>
								<h5> Progressive Presence And Free Services That leads to Effective Co-Operation.</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-clone fa-3x"></i></center><br>
								<h5> An Interface That Provides Easy Browsing And Better Understanding Of the Services.</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-question-circle fa-3x"></i></center><br>
								<h5>Help Organizations To Develop And Spread Their Businesses.</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-search fa-3x"></i></center><br>
								<h5>Quick And Significant Search  That Helps In Getting Efficient Information.</h5>
							</div>
						</div>
						

						</div>

						


					</div>
				</div>
			</div>
		

		</div>



	</section>



		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->
		<?php include('includes/footer.php');?>
		<script type="text/javascript" src="js/cart.js"></script>

</body>
</html>
