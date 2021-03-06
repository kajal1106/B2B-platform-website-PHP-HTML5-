	<?php



$pagetitle="Single lead";



include('includes/config.php');

include('includes/head.php');?>

<style>

#adv-custom-pager a > img {
    width: 80%;
    height: 80%;
    border-radius: 50%;
}

#adv-custom-pager a {
    margin-left: 2px;
    }
</style>

<body>



	<div class="theme-wrap clearfix">

		<!--================================responsive log and menu==========================================-->

		<div class="wsmenucontent overlapblackbg"></div>

		<div class="wsmenuexpandermain slideRight">

			<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>

			<a href="#" class="smallogo"><img src="images/logo.png" width="120" alt="" /></a>

		</div>

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







	<div class="theme-wrap clearfix">

		<!--================================responsive log and menu==========================================-->

		

		<!--================================HEADER==========================================-->

		

		<!--================================PAGE TITLE==========================================-->

		


		<!--================================listing SECTION==========================================-->





	<section class="aside-layout-section padding-top-100 padding-bottom-40 ">

			<div class="container"><!-- section container -->

				<div class="row bg-white"><!-- row -->

					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->

            	<?php

                    $stmtfetch = $db->prepare('SELECT * FROM clientlead WHERE clientleadID = :clientleadID');

                    $stmtfetch->execute(array(':clientleadID' => $_GET['lid']));

                    $row = $stmtfetch->fetch(PDO::FETCH_ASSOC);

                ?>



	<h6 class="text-center lead-title padding-top-5 padding-bottom-5"><?php echo $row['leadName']?></h6>
<label class="col-red pull-right" style="font-size:0.8rem;font-weight:bold;" data-toggle="modal" data-target="#error_modal">Report Error</label><br>
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal">
<fieldset>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Problem Type</label>
  <div class="col-md-8">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="business_has_moved_location">Business has moved location</option>
      <option value="website/phone_is_not_working">Website/phone is not working</option>
      <option value="inaccurate_business_information">Inaccurate business information</option>
      <option value="business_no_longer_operates">Business no longer operates</option>
       <option value="report_abuse_about_this_company">Report abuse about this company</option>
      <option value="other">Other</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="message">Message</label>
  <div class="col-md-8">                     
    <textarea class="form-control" id="message" name="message"></textarea>
  </div>
</div>


<div class="form-group">
 <label class="col-md-4 control-label" for="message">Name</label>
  <div class="col-md-8 ">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Email</label>
  <div class="col-md-8">
  <input id="" name="email" type="email" placeholder="Email" class="form-control input-sm" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="message">Mobile No</label>
<div class="col-md-8">
  <input id="" name="mobile" type="number" placeholder="Mobile No" class="form-control input-sm" required="">

  </div>
</div>


</fieldset>
</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
<!--Report Error modal-->
 <div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="row">
				<div class="col-md-4 col-lg-4 col-xs-12" ><!--image gallary-->

								<div class="single-listing-scroller  bgwhite shadow-1 padding-top-10" style="border:2px solid black;">
									<!-- declare a slideshow -->

<center>
									<div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=0 data-cycle-pager="#adv-custom-pager" data-cycle-pager-template="<a href='#'><img class='small' src='{{src}}'></a>">


<?php

                    $stmtfetch1 = $db->prepare('SELECT * FROM clientleadimage WHERE clientleadID = :clientleadID');

                    $stmtfetch1->execute(array(':clientleadID' => $_GET['lid']));

					while($row1 = $stmtfetch1->fetch(PDO::FETCH_ASSOC))

				                    {

                			?>
		<img style="display:inline;"  class="img thumbnail" src="<?php echo $row1['imagePath'] ?>" alt="Image Not Available" >
			
							<?php  } ?>
					</div>
									</center>
									<!-- empty element for pager links -->
									<hr>
									<div id="adv-custom-pager" class="center external"></div>


								</div>
							</div>


										 								
							<div class="col-md-8 col-lg-8 col-xs-12"><!--Product Description-->

                                        <p class="padding-top-30  left-align col-black" ><strong class="strong col-black">Date of Posting : </strong><?php echo substr($row['dateofpost'],0,10);?></p>
										<p class="padding-top-10  left-align col-black" ><strong class="strong col-black">Lead Description : </strong><?php echo $row['leadDescription']?>.</p>
										
										<div class="row padding-top-200 text-center ">


<button class="btn btn-orange  margin-left-10" style="color:white;" data-toggle="modal" data-target="#enquiry">View Contact Info</button>

</div>


								</div>
								</div>
							</div>




	


									
								</div>

							</div>

							</div>







																		<!-- Modal -->

<div class="modal fade" id="enquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

      	<?php  

      		if( $user->is_logged_in() || $user->is_client_logged_in()){

				?>

					  <ul>

					        <li>

					        	<label><?php echo $row['clientName'];?></label>

					        </li>

					        <li>

					        	<label><?php echo $row['clientEmail'];?></label>

					        </li>

					        <li>

					        	<label><?php echo $row['clientMobile'];?></label>

					        </li>

					    </ul>



				<?php

				}else {

				?>

					<label>To see Contact Information Please Login.</label>

				<?php

				}



      	?>		

      

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        

      </div>

    </div>

  </div>

</div>

		</section>


			<!-- similar leads -->

		<section class="feature-section margin-top-10 margin-bottom-30">

			<div class="container">
				<hr><!-- section container -->
				<div class="section-title-wrap "><!-- section title -->
					<h5 class="index-section-title">SIMILAR LEADS</h5>

				</div><!-- section title end -->
			</div><!-- section container end -->

			<div class="container"><!-- section container -->
				<div class="feature-wrap">
					<ul class="feature-slider clearfix">
						<?php
						$stmtfetch = $db->prepare('SELECT DISTINCT industrylist.industryName, clientlead.clientName, clientlead.leadName, clientlead.leadDescription, clientlead.offerType, clientlead.clientleadid, country.countryName,clientlead.dateofpost,country.countryFlag, clientleadimage.imagePath FROM clientlead
                            LEFT JOIN clientaddress ON clientlead.clientID = clientaddress.clientID
                            LEFT JOIN industrylist ON industrylist.industryID = clientlead.industryID
                             LEFT JOIN clientleadimage ON clientlead.clientleadid = clientleadimage.clientleadid
                            LEFT JOIN country ON country.countryID = clientaddress.countryID where status=1 and clientlead.clientleadid != :leadID Group By clientlead.clientleadid');
						
						$stmtfetch->execute(array(':leadID' => $_GET['lid']));
						while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
									{

					echo '<li class="item border"><!-- .ITEM -->
							<div class="feature-item ">
								<div class="figure thumbnail margin-bottom-0">
								<a href="client-lead-listing.php?lid='.$row[5].'"><img class="small-img-box " src="'.DIR.$row[9].'" alt="feature item"/></a>
									<!--div class="feature-overlay">
										<div class="feature-overlay-inner rgba-bgyallow-1">
											<div class="overlay-content">
												<ul class="feature-links">
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-heart green-1"></i></a></li>
													<li><a class="bgwhite nohover" href="single-listing.html"><i class="fa fa-shopping-cart blue-1"></i></a></li>
													<li><a class="bgwhite nohover" href="#"><i class="fa fa-share yallow-1"></i></a></li>
												</ul>
											</div>
										</div>
									</div-->
								</div>
								<div class="feature-content clearfix">
									<!--div class="feature-meta-cat">
										<a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
									</div-->

									<div class="feature-title single-line ">
										<a href="client-lead-listing.php?lid='.$row[5].'">'.$row[2].'</a>
									</div>

									<div class="feature-title single-line">
									<a class="col-orange">'.$row[0].'</a>
									</div>

									<div class="feature-location"><!-- location-->
									<img src="'.DIR.$row[8].'" style="display:inline;">&ensp;'.$row[6].'
									</div><!-- location end-->';
									

							echo	'</div>
							</div>
					
						</li><!-- /.ITEM -->';
                         
							}
						?>
					</ul>

				</div>
			</div>

		</section>










		<!--================================SOCIAL CAROUSEL SECTION==========================================-->

		<!--================================SOCIAL CAROUSEL SECTION 2==========================================-->

		<?php include('includes/footer.php');?>



</body>

</html>

