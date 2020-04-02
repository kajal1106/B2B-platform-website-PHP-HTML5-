
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
<div class=""  >
		


		<div class="row padding-top-70" style="margin: 0% auto !important; ">
				<div class="col-md-2 col-sm-2 col-lg-2 hidden-xs padding-top-10">
					<?php include('includes/menu.php');?>

				</div>



				<div class="col-md-8 col-sm-8 col-lg-8 padding-top-10" style="">
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

<div class="container">

<?php include('includes/aboutus.php');?>



<?php include('includes/featured_businesses.php');?>

		<!--=========================================RECENT BUSINESSES SECTION START==============================-->


		<?php include('includes/recent_businesses.php');?>


		<!--===================================RECENT BUSINESSES SECTION END==============================-->






		<!--=========================================RECENT PRODUCTS SECTION START==============================-->

		<?php include('includes/recent_products.php');?>


				



		<!--===================================RECENT PRODUCTS SECTION END==============================-->






		<!--================================CATEGOTY SECTION==========================================-->

		<?php //include('includes/top_categories.php');?>

		<!--================================LOCATION SECTION style1==========================================-->

		<!--================================ PARTNER SECTION ==========================================-->


		<!--================================SOCIAL CAROUSEL SECTION==========================================-->


		<!--==========================================Footer Area Start======================================-->

	<!--==========================================Footer Area End======================================-->
 </div>

  <?php include('includes/footer.html');?>

	</body>

	<script>
	jQuery(window).scroll(function() {

    if (jQuery(this).scrollTop()>650)
     {
      jQuery('#navbar-search').show();
     }
    else
     {
      jQuery('#navbar-search').hide();
     }
 });
	</script>
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
