


<?php

$pagetitle="Map Test";

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
				<h6 class="index-section-title">Map Testing</h6>
			</div><!-- section title end -->
				<div class="row bg-white"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						
					

						<?php include('includes/map.php'); ?>


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
