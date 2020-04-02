<?php
include('includes/config.php');
  
	 
  $errortype = $_POST['selectbasic'];
$mgs = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$mailto = "errorreport@thebizroot.com";

                              
	require 'PHPMailer-master/PHPMailerAutoload.php';
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
   $mail ->Username = "errorreport@thebizroot.com";
   $mail ->Password = "Bizroot@123";
   $mail ->SetFrom("errorreport@thebizroot.com");
   $mail ->Subject = $errortype;
   $mail ->Body = $mgs;
   $mail ->AddAddress($mailto);
    
	
   if(!$mail->Send())
   {
       echo "Mail Not Sent";
	  
   }
   else
   {
       echo "Mail Sent";
   }
            	 
?>




   






