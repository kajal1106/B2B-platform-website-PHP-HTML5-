


<?php

$pagetitle="Disclaimer";

include('includes/config.php');
include('includes/head.php');




?>
<body>

<style type="text/css">
.tc p{
	text-align: justify;
	color: black;
}

.strong{
	font-weight: bolder;

}

.company-name{
	
	font-weight:bolder;
	color: black;
}
</style>
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
				<div class="row bg-white" style="min-height:500px;"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						
					<h6 class="product-section-title col-black padding-top-10"> TheBizRoot Website Disclaimer</h6>
							


							<div class="row">

								<div class="col-md-10 col-md-offset-1 tc">
								
								
									<p>The information contained in this website is for general information purposes only. The information is provided by <a class="strong col-black" style="display:inline;" href="https://www.thebizroot.com ">www.thebizroot.com</a>, a property of <span class="company-name">THEBIZROOT MEGACORP LLP</span>. While we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, members/clients information, business names and logos, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.</p><br>
									<p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p><br>
									<p>Through this website you are able to link to other websites which are not under the control of <span class="company-name">THEBIZROOT MEGACORP LLP</span>. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</p><br>
									<p>Every effort is made to keep the website up and running smoothly. However, <span class="company-name">THEBIZROOT MEGACORP LLP</span>. takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</p><br>
								</div>



							

							</div>





							</div>









						</div>
					</div>

					


		</section>



		<!--================================SOCIAL CAROUSEL SECTION==========================================-->
		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->
		<?php include('includes/footer.php');?>
		<script type="text/javascript" src="js/removc.js"></script>

</body>
</html>
