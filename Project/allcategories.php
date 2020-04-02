<?php

$pagetitle="All Categories";


include('includes/head.php');?>
<body>


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
				try {


    $sql = 'SELECT * FROM industrylist';

    $q = $db->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
			?>
		</div><!-- header end -->

		<!--================================ABOUT SECTION==========================================-->

		<section class="about-section  padding-top-70 padding-bottom-100">
			<style type="text/css">
.cat-title{
	font-weight: 600!important;
	color: black!important;
	text-transform: capitalize!important;
	margin: 5px 5px!important;
	text-align: left!important;
}
.listing-border-bottom{
	margin-bottom: 5px!important;
	background: orange!important;
}

			</style>
			<div class="container" style="height:400px;"><!-- section container -->
				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">All Business Categories</h6>



			</div><!-- section title end -->
				<div class="row category-section-wrap cat-style-3">
					<?php while ($row = $q->fetch()): ?>
					<div class="col-md-4 col-sm-6 col-xs-12 main-wrap"><!-- category column -->


						<div class="cat-wrap shadow-1">

							<a href="http://localhost/home/businesses.php?industry=<?php echo htmlspecialchars($row['industryID']) ?>&country=&type=&subindustry=" ><h5 class="cat-title"><?php echo htmlspecialchars($row['industryName']) ?></h5></a>

						</div>
						<div class="listing-border-bottom bgblue-1"></div>

					</div><!-- category column end -->
<?php endwhile; ?>

				</div>
			</div><!-- section container end -->
		</section>







			<?php include('includes/footer.php');?>
	</div>


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

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBueyERw9S41n4lblw5fVPAc9UqpAiMgvM&amp;sensor=false"></script>
	<script type="text/javascript" src="js/map.js"></script>
	<!-- map with geo locations -->

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
