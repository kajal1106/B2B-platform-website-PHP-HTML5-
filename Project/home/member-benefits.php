


<?php

$pagetitle="Member Benefits";

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
				<h6 class="index-section-title">Member Benefits</h6>
			</div><!-- section title end -->
				<div class="row bg-white"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						<div class="row">
							<center><h3>KNOW THEM, USE THEM, LOVE THEM.</h3></center>
						
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-bullhorn fa-3x"></i></center><br>
								<h5> Promote your Company and its products On Global Platform</h5>
							</div>
						</div>

						
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-money fa-3x"></i></center><br>
							
								<h5>Improve Your Advertising Effectiveness, Save Money on Printing and Distribution Costs </h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-user fa-3x"></i></center><br>
							
								<h5>Easy Access to New Buyers, Sellers And Customers</h5>	
						</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-map-marker fa-3x"></i></center><br>
							
							<h5>Easy to Use, Update Profile, Product and Improve Productivity</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-globe fa-3x"></i></center><br>
							<h5>We Educate Our Customers and Expand Your Reach In Local and Globle Market</h5>	
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-bolt fa-3x"></i></center><br>
							<h5>Promote Your Business, Buy / Sell Products & Services For Free</h5>
							</div>
						</div>
					<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-gavel fa-3x"></i></center><br>
							<h5>Great Tool for Finding New Products, Leads and Business</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-magic fa-3x"></i></center><br>
							<h5>Improve Your Business and Customer Service</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-search fa-3x"></i></center><br>
							<h5>Relevant Search Results And Connect with a large audience</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-clock-o fa-3x"></i></center><br>
							<h5>Simplify Business And Save Effort, Time and Money</h5>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 main-wrap">
							<div class="box">
								<br><center><i class="fa fa-square-o fa-3x"></i></center><br>
							<h5>Build your Brand And It's Free</h5>
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
