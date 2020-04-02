


<?php

$pagetitle="Feedback";

include('includes/config.php');
include('includes/head.php');
include('includes/classes/phpmailer/mailenquiry.php');




?>


<style type="text/css">
.box{
	border:2px solid orange;
	max-height: 220px!important;
	height: 220px;
	margin:5px;
	padding:2px;
	white-space: wrap!important;
	color: orange;

}


.box h5{
	margin-bottom: 10px;
	font-size:1rem;
	text-transform: capitalize;
}



</style>
<body>




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
				<div class="row bg-white" style="height:500px;"><!-- row -->
					<div class="col-md-12 col-sm-12 col-xs-12 main-wrap"><!-- content area column -->
						
					<h6 class="product-section-title col-black padding-top-10"> Feedback / Support</h6>
							


							<div class="row">
								
								<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
								
								<form class="form-horizontal " action="feedback.php" method="post">

		<h6 class="text-center strong col-black">Feedback Form</h6><hr>
<fieldset>

<!-- Form Name -->

<div class="form-group">

  <div class="col-md-8 col-md-offset-2">
  <input id="" name="name" type="text" placeholder="Name" class="form-control input-sm" required="">
	
  </div>
</div>

<!-- Text input-->
<div class="form-group">

  <div class="col-md-8 col-md-offset-2">
  <input id="" name="email" type="email" placeholder="Email" class="form-control input-sm" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">

<div class="col-md-8 col-md-offset-2">
  <input id="" name="mobile" type="number" placeholder="Mobile No" class="form-control input-sm" required="">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">

<div class="col-md-8 col-md-offset-2">
    <textarea class="form-control" id="" placeholder="Message" name="message"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">

  <div class="col-md-8 col-md-offset-2 text-center">
    <button type ="submit" id="" name="submit" class="btn btn-success" style="background-color:orange;border-color: orange;">SEND</button>
  </div>
</div>

</fieldset>
</form>	

<?php
if(isset($_POST['submit'])){
	
			 $name = $_POST['name'];
			 $email = $_POST['email'];
			 $mobile = $_POST['mobile'];
			 $message = $_POST['message'];
			 $mailto = "feedback@thebizroot.com";
			 
			 $subject = "Feedback for TheBizRoot";
			  $body = '<p>Dear Admin,<br>
					A visitor at TheBizroot has registered a feedback<br>
					<center>Visitor In Formation<br></center>
					<center>
					 Name '.$name.' <br>
					 Email '.$email.' <br>
					 Mobile '.$name.' <br>
					 Message '.$message.'<br>
                    </center>
					</p>

                    Kind Regards,<br>
                    TheBizRoot Support';   
  			


                              
	require 'includes/PHPMailer-master/PHPMailerAutoload.php';
    //echo $cu[$i]['newsemail'];
   $mail = new PHPMailer();
   // echo $cu[$i]['mailer'];
   $mail ->IsSmtp();
   
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';
   $mail ->Host = "thebizroot.com";
   $mail ->Port = 25; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "feedback@thebizroot.com";
   $mail ->Password = "Bizroot@123";
   $mail ->SetFrom("feedback@thebizroot.com");
   $mail ->Subject = $subject;
   $mail ->Body =  $body;
   $mail ->AddAddress($mailto);
    
	
  /* if(!$mail->Send())
   {
       echo "Something went wrong please try again after some time.";
	  
   }
   else
   {
       echo "We appreciate your efforts for writing feedback.
			Your feedback is going to be considered for sure.
							Thank You!!
			";
   }*/
   
   $subject1 = "Feedback for TheBizRoot";
   $body1 = '<p>Dear Sir/Madam,<br>
					Thank You for the feedback we highly appreciate your efforts for writing feedback.<br>

					</p>

                    Kind Regards,<br>
                    TheBizRoot Support';   
  			


                              
	$mailtouser = $email;
    $mail ->Username = "feedback@thebizroot.com";
    $mail ->Password = "Bizroot@123";
    $mail ->SetFrom("feedback@thebizroot.com");
    $mail ->Subject = $subject1;
    $mail ->Body =  $body1;
    $mail ->AddAddress($mailtouser);
    if(!$mail->Send())
   {
       echo "Something went wrong please try again after some time.";
	  
   }
   else
   {
       echo "<div class='text-center'> We appreciate your efforts for writing feedback.<br>
			Your feedback is going to be considered for sure.<br>
							Thank You!!</div>
			";
   }        	 
}
			?>
				


							</div>



<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
	<h6 class="text-center strong col-black">Support</h6><hr>
	<div class="box">
		<center><img src="images/customer-support.png">
		<br>
	<p class="strong col-black">We provide 24 X 7 Support.</p>
	<p class="col-black">support@thebizroot.com</p></center>
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
