<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    <?php
    //declaration array varible
    $industry = array();
    $country = array();

    //finding query string value
    if(isset($_REQUEST['industry'])){
    //query string value to array and removing empty index of array
    $industry = array_filter(explode("-",$_REQUEST['industry']));
    }

    if(isset($_REQUEST['country'])){

    $country = array_filter(explode("-",$_REQUEST['country']));
  }?>
		<!--================================listing SECTION==========================================-->
		<section class="aside-layout-section padding-top-60 padding-bottom-40">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-50"><!-- section title -->
				<h6 class="index-section-title">LEADS</h6>



			</div><!-- section title end -->
				<div class="row"><!-- row -->
          <?php include('includes/client-leads-filter.php');?>
					<div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-40">
							
                  <?php
                  $query ='SELECT DISTINCT industrylist.industryName, clientlead.clientName, clientlead.leadName, clientlead.leadDescription, clientlead.offerType, clientlead.clientleadid, country.countryName,clientlead.dateofpost,country.countryFlag, clientleadimage.imagePath FROM clientlead
                            LEFT JOIN clientaddress ON clientlead.clientID = clientaddress.clientID
                            LEFT JOIN industrylist ON industrylist.industryID = clientlead.industryID
                             LEFT JOIN clientleadimage ON clientlead.clientleadid = clientleadimage.clientleadid
                            LEFT JOIN country ON country.countryID = clientaddress.countryID where status=1';
			    
                    if(!empty($industry)){
                      $industrydata =implode("','",$industry);
                      $query  .= " and clientlead.industryID in('$industrydata')";
                    }

                     if(!empty($country)){
                      $countrydata =implode("','",$country);
                      $query  .= " and clientAddress.countryID in('$countrydata')";
                    }

                    $query  .= ' group by clientleadID ';
                  $stmtfetch = $db->prepare($query);


                  $stmtfetch->execute();
                  while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
                        {

								echo '
<div class="entry-wrap shadow-1"><!-- blog entry -->

								<div class="entry-content row">

								<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="entry-figure col-md-2 col-lg-2 col-sm-2 col-xs-12">
									<a href="client-lead-listing.php?lid='.$row[5].'"><img class="business-logo thumbnail  img-responsive image-rounded" style="margin:0% auto;" src="'.$row[9].'" alt="IMG NOT AVAILABLE" ></a>
								</div>
								<div class="col-md-10  col-sm-10 col-xs-12 col-lg-10">
									<div class="entry-title">
										<a href="client-lead-listing.php?lid='.$row[5].'"><h6 class="lead-title col-black">'.$row[2].'</h6></a>
										<span class="label uppercase label-info pull-right">'.$row[4].'</span>

										
									</div>

									<div class="entry-disc">
										<p class="col-black twolines">
											'.$row[3].'
										</p>
									</div>
									<div class=" pull-right">
										<a href="client-lead-listing.php?lid='.$row[5].'">Read More</a>
									</div>


								</div>


                <div class="entry-metas col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<hr >
										<ul>
											<li class="uppercase col-black strong"><img src="'.DIR.$row[8].'" style="display:inline;">&ensp;'.$row[6].'</li>
											<li class="uppercase col-black strong">Industry: '.$row[0].'</li>
											<li class="uppercase col-black strong">Date: '.substr($row[7],0,10).' </li>
											</ul>
										
									</div>
									</div>
									</div><!-- blog entry end -->
									 </div>
										';

                   } ?>


							
					 
					</div><!-- content area end -->


							</section>

							 <input type="button" class="visible-xs pop filter-btn" value="FILTER" id="open-modal"  data-toggle="modal" data-target="#exampleModalLong">
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


	<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->



		<!--================================ FOOTER AREA ==========================================-->

			<?php include('includes/footer.php');?>
     <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/modernizr.custom.js"></script>

    <script>
    $(function(){
$(document).on('click','.item_filter',function(){     
 var industry = multiple_values('industry');
      var country  = multiple_values('country');
      //var type   = multiple_values('type');

      var url ="client-leads.php?industry="+industry+"&country="+country;
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
	<script type="text/javascript" src="js/bis.js"></script>
	<script type="text/javascript" src="js/popup.js"></script>

</body>
</html>
