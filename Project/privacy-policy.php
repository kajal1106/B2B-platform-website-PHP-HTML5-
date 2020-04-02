


<?php

$pagetitle="Privacy Policy";

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
	
	margin:5px;
	padding:2px;
	white-space: wrap!important;
	color: orange;


}

.pp p{
		font-size:1rem;
	text-align: justify!important;
	color: black;
}



.pp h5{
	margin-bottom: 10px;
	font-size:1rem;
	text-align: left;
	text-transform: capitalize;
	font-weight: bold;

}

.col-red{
	color:red!important;
	font-size:1rem;
}
.bold{
	font-size:1rem;
	font-weight: bold!important;
	color: black!important;
}


</style>

	<section class="aside-layout-section padding-top-70 padding-bottom-40 ">
			<div class="container"><!-- section container -->
				<div class="section-title-wrap margin-bottom-10"><!-- section title -->
				<h6 class="index-section-title">Privacy Policy</h6>
			</div><!-- section title end -->
				<div class="row bg-white pp"><!-- row -->
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-10 col-xs-offset-1  main-wrap"><!-- content area column -->
						

						<h5>This Privacy Policy applies to the Thebizroot.com</h5>
						<p><span class="col-red">Thebizroot.com </span>recognises the importance of maintaining your privacy. We value your 
							privacy and appreciate your trust in us. This Policy describes how we treat user 
							information we collect on https://www.thebizroot.com and other offline sources. This 
							Privacy Policy applies to current and former visitors to our website and to our online
							 customers. By visiting and/or using our website, you agree to this Privacy Policy.
						</p>

						<p>Thebizroot.com is a property of <span class="bold">THEBIZROOT MEGACORP LLP, </span><span class="col-red">an Indian Company 
							registered under the Companies Act.</span></p>
						<h5>Information we collect</h5>
						<p>Contact information. We might collect your <span class="col-red">name, email, mobile number,
						 phone number, street, city, state, pincode,  country and ip address.</span> </p><br>
						 <p><span class="bold">Information you post.</span> We collect information you post 
						 	in a public space on our website or on a third-party social media site belonging 
						 	to Thebizroot.com.</p><br>

						 <p><span class="bold">Other information. </span>. If you use our website, we may 
						 	collect information about your IP address and the browser you're using. We 
						 	might look at what site you came from, duration of time spent on our website, 
						 	pages accessed or what site you visit when you leave us. We might also collect 
						 	the type of mobile device you are using, or the version of the operating system 
						 	your computer or device is running.</p><br>

						 <h5>We collect information in different ways.</h5>

						  <p><span class="bold">We collect information directly from you.</span> We collect 
						  	information directly from you when you register. We also collect information if you 
						  	post a comment on our websites or ask us a question through phone or email.</p><br>

						  <p><span class="bold">We collect information from you passively.</span> We use
						   tracking tools like Google Analytics, Google Webmaster, browser cookies and web
						    beacons for collecting information about your usage of our website.</p><br>

						    <p><span class="bold">We get information about you from third parties. </span> For example, 
						    	if you use an integrated social media feature on our websites. The third-party social media
						    	 site will give us certain information about you. This could include your name and 
						    	 email address.
						    </p><br>
						    
						    <h5>Use of your personal information</h5>

						    <p><span class="bold">We use information to contact you: </span> We might use 
						    	the information you provide to contact you for confirmation of a purchase or
						    	 sell on our website or for other promotional purposes.
						    </p><br>

						      <p><span class="bold">We use information to respond to your requests or questions. </span> We might 
						      	use your information to confirm your registration for an event.
						    </p><br>

						    <p><span class="bold">We use information to improve our products and services.</span> 
						    	We might use your information to customize your experience with us. This could include
						    	 displaying content based upon your preferences.
						    </p><br>

						      <p><span class="bold">We use information to look at site trends and customer interests. </span> 
						    	We may use your information to make our website and products better. We may
						    	 combine information we get from you with information about you we get from 
						    	 third parties.

						    </p><br>

						     <p><span class="bold">We use information for security purposes.</span> 
						    	We may use information to protect our company, our customers, or our 
						    	websites.
						    </p><br>

						    <p><span class="bold">We use information for marketing purposes. </span> 
						    	We might send you information about special promotions or offers.
						    	 We might also tell you about new features or products. These might be
						    	  our own offers or products, or third-party offers or products we think 
						    	  you might find interesting.

						    </p><br>


						     <p><span class="bold">We use information to send you transactional communications. </span> 
						    	We might send you emails or SMS about your account or a ticket purchase.
						    </p><br>

						    <h5>We use information as otherwise permitted by law.</h5>

						    <h5>Sharing of information with third-parties</h5>

						    <p><span class="bold">We will share information with third parties who perform services on our behalf.</span> 
						    	We share information with vendors who help us manage our online registration process 
						    	or transactional message processors. Some vendors may be located outside of India.

						    </p><br>

						     <p><span class="bold">We will share information with our business partners. </span> 
								This includes a third party who provide or sell an products, or who operates 
								a venue where we hold events. Our partners use the information we give them as 
								described in their privacy policies. 
						    </p><br>

						    <p><span class="bold">We may share information if we think we have to in order to comply with the law or to protect ourselves.</span> 
								We will share information to respond to a court order or subpoena. We may 
								also share it if a government agency or investigatory body requests. Or, we 
								might also share information when we are investigating potential fraud. 

						    </p><br>

						     <p><span class="bold">We may share information with any successor to all or part of our business.</span> 
								. For example, if part of our business is sold we may give our customer
								 list as part of that transaction.
						    </p><br>

						      <p><span class="bold">We may share your information for reasons not described in this policy. </span> 
											We will tell you before we do this.

						    </p><br>

						    <h5>Email Opt-Out</h5>
<p><span class="bold">You can opt out of receiving our marketing emails. </span> 
										. To stop receiving our promotional emails, please email 
										unsubscriber@thebizroot.com. It may take about ten days to 
										process your request. Even if you opt out of getting marketing 
										messages, we will still be sending you transactional messages 
										through email and SMS about your purchases. 


						    </p><br>

						    <p><span class="bold">Third party sites. </span> 
										If you click on one of the links to third party websites,
										 you may be taken to websites we do not control. This policy 
										 does not apply to the privacy practices of those websites.
										  Read the privacy policy of other websites carefully. We are 
										  not responsible for these third party sites.
						    </p><br>

						    <p>If you have any questions about this Policy or other 
						   privacy concerns, you can also email us at <span class="col-red">webmaster@thebizroot.com</span> 
						    </p><br>

						      <p><span class="bold">Updates to this policy</span> 
									From time to time we may change our privacy practices. 
									We will notify you of any material changes to this policy as 
									required by law. We will also post an updated copy on our website. 
									Please check our site periodically for updates.

						    </p><br>

						     <p><span class="bold">Jurisdiction</span> 
									If you choose to visit the website, your visit and any dispute over 
									privacy is subject to this Policy and the website's terms of use. In
									 addition to the foregoing, any disputes arising under this Policy\
									  shall be governed by the laws of India. 


						    </p><br>






						 










						


					
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
