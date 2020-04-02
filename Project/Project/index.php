<!--================================================PAGE HEAD START=================================================-->
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
<style type="text/css">@import url('https://fonts.googleapis.com/css?family=Montserrat');</style>
<!--===============================================PAGE HEAD END==================================================-->

<body style="overflow:hidden;">





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
					if($_GET['action']=='notf')
					{
						echo "<script type='text/javascript'>alert('Record not found');</script>";
					}
				}

	?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">


<section id="slider-revolution">
			<div class="fullwidthbanner-container">


		<div class="row padding-top-70" style="margin: 0% auto !important; ">
				<div class="col-md-3 col-sm-3 col-lg-3 hidden-xs padding-top-10" style="z-index:4;">
					<?php include('includes/vertical-menu.php'); ?>

				</div>



				<div class="col-md-9 col-sm-9 col-lg-9 hidden-xs padding-top-10" style="">
				<?php
						$a=1;
						$stmtfetch = $db->prepare("SELECT ismap FROM admin WHERE adminID = :menuID");
						$stmtfetch->execute(array(':menuID' => $a));
						$row = $stmtfetch->fetch(PDO::FETCH_ASSOC);
						if($row['ismap']=="map")
						{
							include('includes/map.php');
						}else {
							include('includes/slider.php');
						}
				?>











		</div>
	</div>
</div>
</section>
</div>
</div>
</div>

<div class="container">

<?php include('includes/aboutus.php');?>


<div class="hidden-xs">
		<?php include('includes/featured_businesses.php');?>

		<!--=========================================RECENT BUSINESSES SECTION START==============================-->


		<?php include('includes/recent_businesses.php');?>



		<!--===================================RECENT BUSINESSES SECTION END==============================-->






		<!--=========================================RECENT PRODUCTS SECTION START==============================-->

		<?php include('includes/recent_products.php');?>



</div>







		<!--===================================RECENT PRODUCTS SECTION END==============================-->






		<!--================================CATEGOTY SECTION==========================================-->

		<?php //include('includes/top_categories.php');?>

		<!--================================LOCATION SECTION style1==========================================-->

		<!--================================ PARTNER SECTION ==========================================-->


		<!--================================SOCIAL CAROUSEL SECTION==========================================-->


		<!--==========================================Footer Area Start======================================-->

	<!--==========================================Footer Area End======================================-->
 </div>

  <?php include('includes/footer.php');?>
  	<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/map.js"></script>
	</body>


	<!--Start of Tawk.to Script-->
<!--script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a1fbc09bb0c3f433d4cc229/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<script src='auto-complete.min.js'></script>
<!--End of Tawk.to Script-->

</html>
