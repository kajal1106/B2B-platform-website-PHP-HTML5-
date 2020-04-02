<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Listing - Classified Listing HTML Template">
	<meta name="keywords" content="Listing,HTML,CSS,Classified,blog,business,corporate,clean,responsive">
	<meta name="author" content="Muqadass Aleem, Muammad Asif">

	<title></title>

    <!--================================FAVICON================================-->

	<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
	<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
	<link rel="manifest" href="images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

    <!--================================BOOTSTRAP STYLE SHEETS================================-->

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <!--================================ Main STYLE SHEETs====================================-->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/color/color.css">
	<link rel="stylesheet" type="text/css" href="assets/testimonial/css/style.css" />
	<link rel="stylesheet" type="text/css" href="assets/testimonial/css/elastislide.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<!--================================FONTAWESOME==========================================-->

    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	<!--================================GOOGLE FONTS=========================================-->
	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900'>

	<!--================================SLIDER REVOLUTION =========================================-->

	<link rel="stylesheet" type="text/css" href="assets/revolution_slider/css/revslider.css" media="screen" />




</head>
<body style="overflow:hidden;">

		<!--================================HEADER==========================================-->
		<div class="header">
		<?php

$pagetitle="HOME";

include('includes/config.php');
include('includes/head.php');

if( $user->is_logged_in() ){
	 include('includes/header-logout.php');

}else if($user->is_client_logged_in()) {
	 include('includes/client_header.php');
}else {
	include('includes/header.php');
}
?>
		</div><!-- header end -->




		<!--================================PAGE TITLE==========================================-->
		

		<!--================================listing SECTION==========================================-->
		<section class="aside-layout-section padding-top-60 padding-bottom-40">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-50"><!-- section title -->
				<h6 class="index-section-title">LEADS</h6>



			</div><!-- section title end -->
				<div class="row"><!-- row -->
					<div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-40">
							<div class="entry-wrap shadow-1"><!-- blog entry -->

								<div class="entry-content row">

								<div class="col-md-12 col-lg-12" style="padding-left:20px;">
									<div class="entry-title">
										<h6 class="business-name col-black">Lead Name</h6>
										<span class="label label-info pull-right">Buy/Sell/Business</span>

										<hr>
									</div>

									<div class="entry-disc">
										<p>
											Only two lines of description after that...Only two lines of description after that...Only two lines of description after that...


										</p>
									</div>
									<div class=" pull-right">
										<a href="lead-single-listing.php">Read More</a>
									</div>


								</div>


                <div class="entry-metas col-md-12 col-lg-12">
									<hr>
										<ul>
											<li><i class="fa fa-user green-1"></i>Industry:<a href="#"> Manufacturing</a></li>
											<li><i class="fa fa-user green-1"></i>Country:<a href="#"> India</a></li>
											<!--li><i class="fa fa-user green-1"></i>City:<a href="#"> Nanded</a></li-->
											<li><i class="fa fa-user green-1"></i>Expand Level:<a href="#"> 2015</a></li>
										</ul>
										<hr>
									</div>


								</div>


							</div><!-- blog entry end -->';




					  </div>
					</div><!-- content area end -->

<?php include('includes/leads-filter.php');?>
							</section>


	<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->



		<!--================================ FOOTER AREA ==========================================-->

			<?php include('includes/footer.html');?>

	<!--================================MODAL WINDOWS FOR REGISTER AND LOGIN FORMS ===========================================-->

	<!--================================JQuery===========================================-->

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

	<!--================================BOOTSTRAP===========================================-->

	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!--================================NAVIGATION===========================================-->

	<script type="text/javascript" src="js/menu.js"></script>

	<!--================================SLIDER REVOLUTION===========================================-->

	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider-tool.js"></script>
	<script type="text/javascript" src="assets/revolution_slider/js/revolution-slider.js"></script>

	<!--================================MAP===========================================-->

	<script type="text/javascript" src="js/jquery.mapit.js"></script>
	<script src="js/initializers.js"></script>

	<!--================================OWL CARESOUL=============================================-->

	<script src="js/owl.carousel.js"></script>
    <script src="js/triger.js" type="text/javascript"></script>

	<!--================================FunFacts Counter===========================================-->

	<script src="js/jquery.countTo.js"></script>

	<!--================================jquery cycle2=============================================-->

	<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>

	<!--================================waypoint===========================================-->

	<script type="text/javascript" src="js/jquery.waypoints.min.js"></script><!-- Countdown JS FILE -->

	<!--================================RATINGS===========================================-->

	<script src="js/jquery.raty-fa.js"></script>
	<script src="js/rate.js"></script>

	<!--================================ testimonial ===========================================-->
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">

			<div class="rg-image-wrapper">
				<div class="rg-image"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
						<h5></h5>
						<div class="caption-metas">
							<p class="position"></p>
							<p class="orgnization"></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/jquery.elastislide.js"></script>
	<script type="text/javascript" src="assets/testimonial/js/gallery.js"></script>

	<!--================================custom script===========================================-->

	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
