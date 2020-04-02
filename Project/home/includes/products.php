
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Listing - Classified Listing HTML Template">
	<meta name="keywords" content="Listing,HTML,CSS,Classified,blog,business,corporate,clean,responsive">
	<meta name="author" content="Muqadass Aleem, Muammad Asif">

	<title>Products</title>

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
}

?>
		<!--================================listing SECTION==========================================-->

		<section class="aside-layout-section padding-top-60 padding-bottom-40">

			<div class="container"><!-- section container -->

			<div class="section-title-wrap margin-bottom-10"><!-- section title -->

				<h6 class="index-section-title">PRODUCTS</h6>



			</div><!-- section title end -->

				<div class="row padding-top-30"><!-- row -->
          <div class="col-md-3 col-sm-4 hidden-xs"><!-- sidebar column -->
						<?php include('includes/product-filter.php');?>
			</div><!-- section container end -->
					
			<div class="col-md-9 col-sm-8 col-lg-8 col-xs-12 main-wrap"><!-- content area column -->
						<div class="blog-section padding-bottom-40">
							<section class="listing-section padding-bottom-40">
			
					<div class="add-listing-wrapper">
						<div class="listing-main gridview tab-content">
							  <div id="latest-listing" class="tab-pane active">


									<div class="listing-wrapper row">

                    <?php
                    $query ='SELECT DISTINCT porductinformation.productID, porductinformation.productName, productimage.imagePath, industrylist.industryName,porductinformation.businessID, businesscontactinformation.businessName FROM porductinformation
                    	LEFT JOIN productimage ON porductinformation.productID = productimage.productID
                    	LEFT JOIN businessindustry ON porductinformation.businessID = businessindustry.businessID
                      LEFT JOIN businessaddress ON porductinformation.businessID = businessaddress.businessID
                    	LEFT JOIN industrylist ON industrylist.industryID = (select industryID from businessindustry where porductinformation.businessID = businessindustry.businessID)
                    	LEFT JOIN businesscontactinformation ON porductinformation.businessID = businesscontactinformation.businessID
                    	where status=1';

                      if(!empty($industry)){
          						  $industrydata =implode("','",$industry);
          						  $query  .= " and businessindustry.industryID in('$industrydata')";
          					  }

          					   if(!empty($country)){
          						  $countrydata =implode("','",$country);
          						  $query  .= " and businessaddress.countryID in('$countrydata')";
          					  }
                      $query  .= ' group by productID ';
                    $stmtfetch = $db->prepare($query);


                    $stmtfetch->execute();
                    while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
                    			{
									 try{
                           $results = $db->prepare("select * from prductwishlist where where productID = :id and businessID =:bid ");
                           $results->bindParam(':id',$row[0],PDO::PARAM_INT);
                          $results->bindParam(':bid',$_SESSION['businessID'],PDO::PARAM_STR);
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
									
									
									
									
									
										echo '<div class="item col-md-3 col-sm-3 col-lg-3 col-xs-6 thumbnail" ><!-- .ITEM -->
											<div class="listing-item clearfix ">
												<div class="figure">
													<a href="product-single-listing.php?pid='.$row[0].'"><img src="'.DIR.$row[2].'" class="small-img-box image-rounded" alt="listing item"></a>
													<div style=" position: absolute;top: 8px;left: 16px;">
														<button class="push" id="'.$row[0].'"><i class="fa fa-heart '.$ac.' fa-2x" ></i></button>
													</div>
												</div>
												<div class="listing-content clearfix">
													
													<div class="feature-title tit">
										<a class="col-black single-line strong left-align" href="product-single-listing.php?pid='.$row[0].'">'.$row[1].'</a>
									</div>
									<div class="feature-title ">
									<a class="col-black single-line strong left-align" href="business-single-listing.php?bid='.$row[4].'">'.$row[5].'</a>
									</div>
									<div class="feature-title ">
									<a class="single-line strong left-align">'.$row[3].'</a>
									</div>
													
												</div>
											</div>
											<div class="listing-border-bottom bgyallow-1"></div>
										</div><!-- /.ITEM -->';
                    }?>
							</div>
								</div>
								<div id="recent-listing" class="tab-pane">
									<div class="listing-wrapper row">

									</div>
								</div>
						</div>
					</div>
				
			</section>



					  </div>
					</div><!-- content area end -->


		</section>
		
		 <input type="button"  class="visible-xs pop" value="FILTER" id="open-modal"  data-toggle="modal" data-target="#exampleModalLong">
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

		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->


		<!--================================ FOOTER AREA ==========================================-->

		<?php include('includes/footer.html');?>

	<!--================================JQuery===========================================-->

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.js"></script><!-- jquery 1.11.2 -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
  <script src="js/jquery.js"></script>

<script>
$(function(){
$(document).on('click','.item_filter',function(){
  var industry = multiple_values('industry');
  var country  = multiple_values('country');
  var type   = multiple_values('type');

  var url ="products.php?industry="+industry+"&country="+country;
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
