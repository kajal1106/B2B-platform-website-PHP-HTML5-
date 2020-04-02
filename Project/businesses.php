<?php

$pagetitle="Buisnesses";


include('includes/head.php');?>
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
		<link rel="stylesheet" href="css/ap-fullscreen-modal.css">

		<!--================================PAGE TITLE==========================================-->
		<?php
//declaration array varible
$industry = array();
$country = array();
$type  = array();
$subindustry = array();
//finding query string value
if(isset($_REQUEST['industry'])){
	//query string value to array and removing empty index of array
	$industry = array_filter(explode("-",$_REQUEST['industry']));
}

if(isset($_REQUEST['country'])){

	$country = array_filter(explode("-",$_REQUEST['country']));
}

if(isset($_REQUEST['type'])){

	$type = array_filter(explode("-",$_REQUEST['type']));
}
if(isset($_REQUEST['subindustry'])){

	$subindustry = array_filter(explode("-",$_REQUEST['subindustry']));
}


?>

		<!--================================listing SECTION==========================================-->

		<section class="aside-layout-section padding-top-60 padding-bottom-40">
			<div class="container"><!-- section container -->

				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">BUSINESSES</h6>



			</div><!-- section title end -->
				<div class="row padding-top-30"><!-- row -->


					<?php include('includes/business-filter.php');?>


					<div class="col-md-9 col-sm-8 col-lg-8  col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-40">


						<?php include('includes/business-listing-panel.php');?>





					  </div>
					</div><!-- content area end -->

		</section>
              <input type="button"  class="visible-xs pop filter-btn" value="FILTER" id="open-modal"  data-toggle="modal" data-target="#exampleModalLong" style="">
				  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Filters</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body mod">
					 
					    

					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
</nav>






	</div>






</div>


</div>
		<!--================================SOCIAL CAROUSEL SECTION==========================================-->

		<!--================================ FOOTER AREA ==========================================-->

		<?php include('includes/footer.php');?>
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
		<script src="js/jquery.easing.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/menu.js"></script>

<script>
$(function(){
	$(document).on('click','.item_filter',function(){
		var industry = multiple_values('industry');
		var country  = multiple_values('country');
		var type   = multiple_values('type');
		var subindustry = multiple_values('subindustry');
		var url ="businesses.php?industry="+industry+"&country="+country+"&type="+type+"&subindustry="+subindustry;
		window.location=url;
	});

});


function multiple_values(inputclass){
	var val = new Array();
	$("."+inputclass+":checked").each(function() {
			val.push($(this).val());
	});
return val.join('-');
}

</script>

</body>
</html>

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
	<script type="text/javascript" src="js/bis.js"></script>

	  <script type="text/javascript" src="js/script.js"></script>
	      <script type="text/javascript" src="js/popup.js"></script>

	<!--================================custom script===========================================-->

	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
